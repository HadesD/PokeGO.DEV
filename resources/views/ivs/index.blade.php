@extends('layouts.indexMaster')
@section('indexMaster.body')
  <link rel="stylesheet" href="{{ Asset('css/ivs.css') }}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{ Asset('css/types.css') }}" media="screen" title="no title" charset="utf-8">
  <div id="pokemon-list" class="">
    <a class="dropdown-button btn" href="#" data-activates="sort_pokemon"><i class="material-icons left">sort</i>Sort</a>
    <ul id="sort_pokemon" class="dropdown-content">
      <li><a href="#!" class="sort" data-sort="pokemonCp"><i class="material-icons left">format_list_numbered</i> CP</a></li>
      <li><a href="#!" class="sort" data-sort="pokemonIvsperfect"><i class="material-icons left">verified_user</i> IVs</a></li>
      <li><a href="#!" class="sort" data-sort="pokemonId"><i class="material-icons left">format_list_numbered</i> ID</a></li>
      <li><a href="#!" class="sort" data-sort="pokemonHeightM">Height</a></li>
      <li><a href="#!" class="sort" data-sort="pokemonWeightKg">Weight</a></li>
    </ul>
    <div class="row list">
      @foreach($pokemonData as $key => $value)
        <?php
          $per = round(($value->getIndividualAttack()+$value->getIndividualDefense()+$value->getIndividualStamina())/45*100, 2);
          $now = time() * 1000;
          $createdTime = $value->getCreationTimeMs();
          $diff = round(($now - $createdTime)/1000);
        ?>
        <div class="col s12 m6 l3">
          <div class="card" style="height: 481px;">
            <div class="card-image {{ ($diff<3600*24) ? 'most_catched' : $diff }}">
              <h6 class="left" style="padding-left: 7px;position: absolute;left: 0;z-index: 1;">
                <div class="pokemonId">
                  #@lang('pokedex.' . $value->getPokemonId() . '.Number')
                </div>
                <div class="pokemonHeightM">
                  {{ round($value->getHeightM(), 3) }}m
                </div>
                <div class="pokemonWeightKg">
                  {{ round($value->getWeightKg(), 3) }}kg
                </div>
                <div class="pokemonWeightKg">
                <?php
                  $types = trans('pokedex.' . $value->getPokemonId() . '.Types');
                ?>
                @foreach($types as $k => $v)
                  <span class="type {{ strtolower(trim($v)) }}">{{ $v }}</span>
                  <br />
                @endforeach
                </div>
              </h6>
              <h5 class="pokemonIvsperfect right {{ $per>=80 ? 'green accent-4' : 'yellow darken-2' }} white-text" style="padding:5px;position: absolute;right: 0;z-index: 1;">{{ $per }}%</h5>
              <div class="card-content" style="height:120px;">
                <img class="responsive-img" src="{{ Asset('images/pokemon/' . $value->getPokemonId() . '.png') }}" style="max-height:120px;width: auto;margin: 0 auto;" />
                <div class="right" style="position: absolute;right: 10px;bottom: 0px;text-align:center;">
                  @if($value->getFromFort())
                    <img class="responsive-img" src="{{ Asset('images/items/Egg.png') }}" style="height:45px;width:auto;margin:0 auto;" />
                    <?php
                      if (is_numeric(trans('pokedex.' . $value->getPokemonId() . '.prev_evolution.0.num'))) {
                        $first_evol = intval($first_evol);
                      } else {
                        $first_evol = trans('pokedex.' . $value->getPokemonId() . '.id');
                      }
                    ?>
                    {{-- <span style="margin-top:-2px;">@lang('pokedex.' . $first_evol . '.egg')</span> --}}
                  @endif
                  <img class="responsive-img" src="{{ Asset('images/items/Item_000' . $value->getPokeball() . '.png') }}" style="height:35px;width:auto;margin:0 auto;" />
                </div>
              </div>
              <h5 class="card-title black-text">
                @if($value->getNickname())
                  {{ $value->getNickname() }}
                @else
                  @lang('pokedex.' . $value->getPokemonId() . '.Name')
                @endif
              </h5>
              <h5 class="black-text center-align" style="margin-top:5px;position:relative;">
                @if($value->getFavorite())
                  <div class="left" style="position: absolute;">
                    <img class="responsive-img" src="{{ Asset('images/etc/star.png') }}" style="height:30px;width:auto;margin-left:5px;" />
                  </div>
                @endif
                <small class="grey-text">CP</small><span class="pokemonCp">{{ $value->getCp() }}</span>/@lang('pokedex.' . $value->getPokemonId() . '.MaxCP')
              </h5>
            </div>
            <ul class="collapsible z-depth-0" data-collapsible="accordion">
              <li>
                <div class="collapsible-header active"><i class="material-icons">place</i>Individuals</div>
                <div class="collapsible-body">
                  <div class="collection">
                    <div class="collection-item">
                      <div class="progress" style="margin-bottom:5px;">
                        <div class="determinate red" style="width: {{ $value->getIndividualAttack()/15*100 }}%"></div>
                      </div>
                      <div class="small red-text">Attack<span class="new badge red" data-badge-caption="/15">{{ $value->getIndividualAttack() }}</span></div>
                    </div>
                    <div class="collection-item">
                      <div class="progress" style="margin-bottom:5px;">
                        <div class="determinate blue" style="width: {{ $value->getIndividualDefense()/15*100 }}%"></div>
                      </div>
                      <div class="small blue-text">Defense<span class="new badge blue" data-badge-caption="/15">{{ $value->getIndividualDefense() }}</span></div>
                    </div>
                    <div class="collection-item">
                      <div class="progress" style="margin-bottom:5px;">
                        <div class="determinate green" style="width: {{ $value->getIndividualStamina()/15*100 }}%"></div>
                      </div>
                      <div class="small green-text">Stamina<span class="new badge green" data-badge-caption="/15">{{ $value->getIndividualStamina() }}</span></div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">filter_drama</i>Moves</div>
                <div class="collapsible-body">
                  <div class="collection">
                    <div class="collection-item">
                      {{-- <div class="progress" style="margin-bottom:5px;">
                      <div class="determinate red" style="width: {{ $value->getIndividualAttack()/15*100 }}%"></div>
                    </div> --}}
                    <div class="small red-text">{{ trim(ucwords(preg_replace('/\_|\"/', ' ', trans('moves.' . $value->getMove1() . '.VfxName')))) }}
                      <span class="new badge red" data-badge-caption="">
                        @if(is_numeric(trans('moves.' . $value->getMove1() . '.Power')))
                          {{ trans('moves.' . $value->getMove1() . '.Power') }}
                        @else
                          0
                        @endif
                      </span>
                    </div>
                    <span class="type {{ strtolower(trans('moves.' . $value->getMove1() . '.Type')) }}">{{ ucfirst(strtolower(trans('moves.' . $value->getMove1() . '.Type'))) }}</span>
                  </div>
                  <div class="collection-item">
                    <?php
                      $moveEnergy = trans('moves.' . $value->getMove2() . '.EnergyDelta') * -1;
                    ?>
                    <div class="row" style="margin-bottom:0;">
                      @for($i=0; $i < round(100/$moveEnergy); $i++)
                        <div class="col s{{ round(12/round(100/$moveEnergy)) }}">
                          <div class="progress" style="margin-bottom:5px;">
                            <div class="determinate blue" style="width: 100%"></div>
                          </div>
                        </div>
                      @endfor
                    </div>
                  <div class="small blue-text">{{ trim(ucwords(preg_replace('/\_|\"/', ' ', trans('moves.' . $value->getMove2() . '.VfxName')))) }}
                    <span class="new badge blue" data-badge-caption="">
                      @if(is_numeric(trans('moves.' . $value->getMove2() . '.Power')))
                        {{ trans('moves.' . $value->getMove2() . '.Power') }}
                      @else
                        0
                      @endif
                    </span>
                  </div>
                  <span class="type {{ strtolower(trans('moves.' . $value->getMove2() . '.Type')) }}">{{ ucfirst(strtolower(trans('moves.' . $value->getMove2() . '.Type'))) }}</span>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body">
              <div class="card-action">
                {{ print_r($value) }}
              </div></div>
            </li>
          </ul>
        </div>
      </div>
    @endforeach
  </div>
</div>
<script type="text/javascript" src="{{ Asset('js/list.min.js') }}"></script>
<script type="text/javascript">
var options = {
  valueNames: [ 'pokemonCp', 'pokemonIvsperfect', 'pokemonHeightM', 'pokemonWeightKg', 'pokemonId' ]
};

var pokemonList = new List('pokemon-list', options);
pokemonList.sort('pokemonIvsperfect', { order: "desc" });
</script>
@endsection

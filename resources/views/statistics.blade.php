@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>

<section class="statistics section">
   <div class="container" >
   <h3>Statistics</h3>
 
    @if(Session::get('locale') == "nl")
      <p> Deze pagina is onder constructie. Binnenkort leest u hier de vragen aan de orde gesteld waar u ongetwijfeld graag antwoord op wilt:</p>

      <div style="text-align: left;">
      <ol>
      <li>Welke Nederlandse gemeenten kennen gerelateerd aan het aantal inwoners een hoog aantal misdrijven, en welke gemeenten een relatief laag aantal? </li>
      <li>Welke trend is er in het aantal misdrijven per gemeente te zien over een tijdsverloop van 5-10 recente jaren? In welke gemeenten is de trend relatief sterk, in welke gemeenten is deze zwak?</li>
      <li>Wanneer bepaalde gemeenten een relatief hoog aantal misdrijven kennen, geldt dit dan voor criminaliteit in het algemeen of voor bepaalde delict typen in het bijzonder?</li>
      <li>Is er een verschuiving in de tijd te zien in het aandeel van bepaalde delict typen? Zijn er bepaalde delict typen waarvan het aandeel na verloop van jaren toeneemt, en zijn er bepaalde delict typen waarvan het aandeel na verloop van jaren juist afneemt?</li>
      </ol> </div>
    @endif

    @if (Session::get('locale') == "en")
      <p> This page is under construction. Soon you will read here the questions that you undoubtedly want to be answered:</p>

      <div style="text-align: left;">
      <ol>
      <li>Which Dutch municipalities have a high number of crimes related to the number of inhabitants, and which municipalities have a relatively low number?</li>
      <li>What trend is there to see in the number of crimes per municipality over a period of time of 5-10 recent years? In which municipalities the trend is relatively strong, in which municipalities weak?</li>
      <li>When certain municipalities have a relatively high number of crimes, does this apply to crime in general or to particular offense types in particular?</li>
      <li>Is there a shift in the proportion of certain offense types over time? Are there certain types of offense, the proportion of which increases over the years, and are there certain types of offenses that have declined over the years?</li>
      </ol> </div>
    @endif

  </div>
</section>

@endsection

@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>

<section class="introsection">
   <div class="container">
   <h1>{{ucfirst(__('nav.statistics'))}}</h1>
  </div>
</section>


<section class="statistics section">
   <div class="container" >
 
    @if(Session::get('locale') == "nl")
    <div style="text-align: left;">
      <p> Een landelijk dagblad (AD) publiceert jaarlijks van alle Nederlandse gemeenten de statistiek van de criminaliteit. Dit betreft het aantal aangiften bij de politie van 10 veel voorkomende delict typen: woninginbraak, inbraak schuur, autokraak, autodiefstal, zakkenrollen, bedreiging, mishandeling, straatroof, overvallen en vernieling. Door vergelijking met gegevens die voor de 25 grootste steden uit andere bronnen bekend zijn kan worden vastgesteld, dat de genoemde 10 delict typen ongeveer 40% van de totale criminaliteit uitmaken. De gegevens van het AD kunnen dus als een redelijke graadmeter voor de totale criminaliteit worden beschouwd.</p>

      <p>Wat zijn nu de belangrijkste uitkomsten van de analyse van de gegevens over het jaar 2016? Allereerst vallen de verschillen in criminaliteitsniveau per grootte klasse op. </p>

      <ul>
      <li>In steden van 100.000 tot 150.000 inwoners (grootte klasse 1 en 2, dit zijn 13 steden) is het gemiddelde 2,2 delicten per 100 inwoners.</li>
      <li>In steden van 150.000 tot 170.000 inwoners (grootte klasse 3, dit zijn 7 steden) is het gemiddelde 2,47 delicten per 100 inwoners</li>
      <li>In steden van 170.000 tot 250.000 inwoners (grootte klasse 4, dit zijn 6 steden) is het gemiddelde 2,99 delicten per 100 inwoners</li>
      <li>In de vier grote steden (grootte klasse 5) is het gemiddelde 3,87 delicten per 100 inwoners.</li>
      </ul> 

      <p>Om de gedachten te bepalen: in de vier grote steden werden in 2016 in totaal 90.000 misdrijven aangegeven in de betreffende categorieën. Dat is bijna drie keer zo veel als in de 13 steden van grootte klasse 1 en 2 samen. Daarnaast vallen de verschillen in criminaliteitsniveau per regio op. Referentie daarbij is het gemiddelde voor geheel Nederland: 3,04 delicten per 100 inwoners.</p>

      <ul>
      <li>In de regio West (14 steden, gelegen in de provincies Noord-Holland, Zuid-Holland, Flevoland en Utrecht) is het gemiddelde 3,22 delicten per 100 inwoners.</li>
      <li>In de regio Oost en Noord (10 steden, gelegen in de provincies Groningen, Overijssel en Gelderland) is het gemiddelde 2,39 delicten per 100 inwoners.</li>
      <li>In de regio Zuid (6 steden, gelegen in de provincies Noord-Brabant en Limburg) is het gemiddelde 3,26 delicten per 100 inwoners.</li>
      </ul> 

      <p>Dat het criminaliteitsniveau in de regio Zuid het hoogste is, is opmerkelijk. In deze regio liggen geen grote steden: die liggen alle vier in de regio West. De steden in de regio Zuid hebben een gemiddelde van 2,71 tot 4,12 delicten per 100 inwoners.</p>

      <p>Binnenkort is er op deze pagina meer te lezen over criminaliteits statistieken. Er zullen gegevens worden gepubliceerd over de criminaliteit in de 30 grootste Nederlandse steden in de jaren 2015 tot en met 2018. Daarmee komen er antwoorden op vragen zoals:</p>

      <ul>
      <li>Welke trend is er in het aantal misdrijven per gemeente te zien over een tijdsverloop van 4 jaar? In welke gemeenten is de trend relatief sterk, in welke gemeenten is deze zwak?</li>
      <li>Wanneer bepaalde gemeenten een relatief hoog aantal misdrijven kennen, geldt dit dan voor criminaliteit in het algemeen of voor bepaalde delict typen in het bijzonder?</li>
      <li>Is er een verschuiving in de tijd te zien in het aandeel van bepaalde delict typen? Zijn er bepaalde delict typen waarvan het aandeel na verloop van jaren toeneemt, en zijn er bepaalde delict typen waarvan het aandeel na verloop van jaren juist afneemt?</li>
      </ul> 

    </div>
    @endif

    @if (Session::get('locale') == "en")
    <div style="text-align: left;">
      <p>A national newspaper (AD) publishes crime statistics for all Dutch municipalities every year. This concerns the number of reports to the police of 10 common types of crime: burglary, burglary, car crack, car theft, pickpocketing, threats, assault, street robbery, robberies and vandalism. By comparing with data that are known for the 25 largest cities from other sources, it can be established that the aforementioned 10 types of crime make up around 40% of total crime. The data from the AD can therefore be considered as a reasonable indicator of total crime.</p>

      <p>What are the most important results of the analysis of the data for 2016? First of all, the differences in crime level per size class are striking.</p>

      <ul>
      <li>In cities of 100,000 to 150,000 inhabitants (size class 1 and 2, these are 13 cities), the average is 2.2 offenses per 100 inhabitants.</li>
      <li>In cities of 150,000 to 170,000 inhabitants (size class 3, these are 7 cities), the average is 2.47 offenses per 100 inhabitants</li>
      <li>In cities of 170,000 to 250,000 inhabitants (size 4, this is 6 cities), the average is 2.99 offenses per 100 inhabitants</li>
      <li>In the four major cities (Amsterdam, Rotterdam, The Hague and Utrecht, size class 5), the average is 3.87 offenses per 100 inhabitants.</li>
      </ul> 

      <p>To give you some more idea: in 2016, a total of 90,000 offenses were reported in the four major cities in the relevant categories. That is almost three times as much as in the 13 cities of size 1 and 2 together. In addition, the differences in crime level per region are striking. The reference for this is the average for the whole of the Netherlands: 3.04 offenses per 100 inhabitants. </p>

      <ul>
      <li>In the West region (14 cities, located in the provinces of Noord-Holland, Zuid-Holland, Flevoland and Utrecht) the average is 3.22 offenses per 100 inhabitants.</li>
      <li>In the East and North region (10 cities, located in the provinces of Groningen, Overijssel and Gelderland) the average is 2.39 offenses per 100 inhabitants.</li>
      <li>In the South region (6 cities, located in the provinces of Noord-Brabant and Limburg) the average is 3.26 offenses per 100 inhabitants.</li>
      </ul> 

      <p>It is remarkable that the level of crime is highest in the South region. There are no major cities in this region: all four major Dutch cities are located in the West region. The cities in the South region have an average of 2.71 to 4.12 offenses per 100 inhabitants.</p>

      <p>Soon more can be read about crime statistics on this page. Data will be published on crime in the 30 largest Dutch cities in the years 2015 to 2018. This will provide answers to questions such as: </p>

      <ul>
      <li>What trend is there to see in the number of crimes per municipality over a period of time of 4 years? In which municipalities the trend is relatively strong, in which municipalities weak?</li>
      <li>When certain municipalities have a relatively high number of crimes, does this apply to crime in general or to particular offense types in particular?</li>
      <li>Is there a shift in the proportion of certain offense types over time? Are there certain types of offense, the proportion of which increases over the years, and are there certain types of offenses that have declined over the years?</li>
      </ul> 

    </div>
    @endif

  </div>
</section>

@endsection


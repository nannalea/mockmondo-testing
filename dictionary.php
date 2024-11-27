<?php
$languages_allowed = ['en', 'dk'];
$lang = $_GET['lang'] ?? 'en';
if (!in_array($lang, $languages_allowed)) {
    $lang = 'en';
}
$dictionary = [
    // Nav
    'en_signin' => 'Sign in',
    'dk_signin' => 'Log ind',
    'en_signout' => 'Sign out',
    'dk_signout' => 'Log ud',
    'en_flights' => 'Flights',
    'dk_flights' => 'Fly',
    'en_stays' => 'Stays',
    'dk_stays' => 'Overnatning',
    'en_car_rental' => 'Car rental',
    'dk_car_rental' => 'Bil',
    'en_ferries' => 'Ferries',
    'dk_ferries' => 'Færger',
    'en_things_to_do' => 'Things to do',
    'dk_things_to_do' => 'Oplevelser',

    // index main
    'en_welcome' => 'Welcome! Find and compare cheap flights',
    'dk_welcome' => 'Velkommen! Find en fleksibel flybillet til din næste rejse.',
    'en_from' => 'From?',
    'dk_from' => 'Fra?',
    'en_to' => 'To?',
    'dk_to' => 'Til?',
    'en_search' => 'Search',
    'dk_search' => 'Søg',

    // info box 
    'en_info_header' => 'Here’s why travelers choose mockmondo',
    'dk_info_header' => 'Derfor vælger rejsende mockmondo',
    // info 1
    'en_info_title_1' => 'Best travel deals',
    'dk_info_title_1' => 'De bedste rejsetilbud',
    'en_info_content_1' => 'Find the best deals available from 900+ travel sites.',
    'dk_info_content_1' => 'Find de bedste tilbud på mere end 900 forskellige rejsesites.',
    // info 2
    'en_info_title_2' => 'Book with flexibility',
    'dk_info_title_2' => 'Bestil med fleksibilitet',
    'en_info_content_2' => "Easily find flights with no change fees.",
    'dk_info_content_2' => 'Find de bedste tilbud på mere end 900 forskellige rejsesites.',
    // info 3
    'en_info_title_3' => 'Rejs med mindre CO₂',
    'dk_info_title_3' => 'Chose less CO₂',
    'en_info_content_3' => "See the environmental impact of the travel options.",
    'dk_info_content_3' => 'Se rejsemulighedernes miljømæssige påvirkning.',
    // info 4
    'en_info_title_4' => 'Recommended by experts',
    'dk_info_title_4' => 'Anbefales af eksperter',
    'en_info_content_4' => "The mockmondo app is Editor's Choice in the App Store.",
    'dk_info_content_4' => "mockmondo-appen er Editor' s Choice i App Store.",

    // Card
    'en_card_title' => 'Fantastic September destinations',
    'dk_card_title' => 'Fantastiske september-destinationer',
    'en_card_content' => "Didn't get to go on vacation over the summer? September is actually a wonderful time to take an impromptu trip with still good weather but fewer tourists and lower prices",
    'dk_card_content' => 'Nåede du ikke at komme på ferie over sommeren? September er faktisk en vidunderlig tid at tage en improviseret tur med stadig godt vejr, men færre turister og lavere priser',
    'en_card_btn' => 'Read the article',
    'dk_card_btn' => 'Læs articlen',


    // Carousel 
    'en_carousel_title' => 'Destinations you can travel to now',
    'dk_carousel_title' => 'Destinationer du kan rejse til nu',
    'en_carousel_content' => 'Popular destinations that are open to most visitors from Denmark',
    'dk_carousel_content' => 'Populære destinationer, som er åbne for de fleste besøgende fra Danmark',
    'en_carousel_btn' => 'Show all',
    'dk_carousel_btn' => 'Vis alle',
    //  Carousel 1
    'en_carousel_title_1' => 'Portugal',
    'dk_carousel_title_1' => 'Portugal',
    'en_carousel_content_all' => 'Vaccinated travelers can visit. Masks are not required',
    'dk_carousel_content_all' => ' Vaccinerede rejsende kan komme på besøg. Mundbind er ikke påkrævet.',
    //  Carousel 2
    'en_carousel_title_2' => 'Berlin',
    'dk_carousel_title_2' => 'Berlin',
    //  Carousel 3
    'en_carousel_title_3' => 'Schweiz',
    'dk_carousel_title_3' => 'Switzerland',
    //  Carousel 4
    'en_carousel_title_4' => 'Istanbul',
    'dk_carousel_title_4' => 'Istanbul',
    //  Carousel 5
    'en_carousel_title_5' => 'France',
    'dk_carousel_title_5' => 'Frankrig',
    //  Carousel 6
    'en_carousel_title_6' => 'Barcelona',
    'dk_carousel_title_6' => 'Barcelona',

    // index page - popular cities
    'dk_popular_header'=>'Populære byer',
    'en_popular_header'=>'Popular cities',
    'dk_popular_text'=>'De mest søgte byer på Momondo',
    'en_popular_text'=>'The most visited cities on Momondo',
    'dk_popular_card_header'=>'Fly til',
    'en_popular_card_header'=>'Fly to'

];

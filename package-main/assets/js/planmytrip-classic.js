var continents = new Array(
    {val:'asia', text:'Asia'},
    {val:'africa', text:'Africa'},
    {val:'north_america', text:'North America'},
    {val:'south_america', text:'South America'},
    {val:'europe', text:'Europe'}, 
    {val:'antarctica', text:'Antarctica'}, 
    {val:'australia', text:'Australia'},
    {val:'south_pacific', text:'South Pacific'}
);

var continentDecisions = new Array(
    new Array('east',3,'north_america','africa','asia'),
    new Array('east',3,'north_america','europe','asia'),
    new Array('east',3,'north_america','europe','africa'),
    new Array('east',3,'south_america','africa','asia'),
    new Array('east',3,'south_america','europe','asia'),
    new Array('east',3,'south_america','europe','africa'),
    new Array('east',4,'north_america','africa','europe','asia'),
    new Array('east',4,'north_america','europe','africa','asia'),
    new Array('east',4,'north_america','south_america','europe','africa'),
    new Array('east',4,'north_america','south_america','europe','asia'),
    new Array('east',4,'south_america','africa','europe','asia'),
    new Array('east',4,'south_america','europe','africa','asia'),
    new Array('east',4,'south_america','north_america','europe','africa'),
    new Array('east',4,'south_america','north_america','europe','asia'),
    new Array('east',4,'south_pacific','north_america','europe','africa'),
    new Array('east',4,'south_pacific','north_america','europe','asia'),
    new Array('east',4,'south_pacific','south_america','europe','asia'),
    new Array('east',4,'south_pacific','south_america','africa','asia'),
    new Array('east',5,'north_america','south_america','europe','africa','asia'),
    new Array('east',5,'north_america','south_america','africa','europe','asia'),
    new Array('east',5,'south_america','north_america','europe','africa','asia'),
    new Array('east',5,'south_america','north_america','africa','europe','asia'),
    new Array('east',5,'south_pacific','north_america','south_america','europe','africa'),
    new Array('east',5,'south_pacific','north_america','south_america','europe','asia'),
    new Array('east',5,'south_pacific','north_america','europe','africa','asia'),
    new Array('east',5,'south_pacific','north_america','africa','europe','asia'),
    new Array('east',5,'south_pacific','south_america','north_america','europe','africa'),
    new Array('east',5,'south_pacific','south_america','north_america','europe','asia'),
    new Array('east',5,'south_pacific','south_america','europe','africa','asia'),
    new Array('east',5,'south_pacific','south_america','africa','europe','asia'),
    new Array('west',3,'africa','europe','north_america'),
    new Array('west',3,'africa','europe','south_america'),
    new Array('west',3,'africa','south_america','north_america'),
    new Array('west',3,'africa','south_america','south_pacific'),
    new Array('west',3,'asia','africa','north_america'),
    new Array('west',3,'asia','africa','south_america'),
    new Array('west',3,'asia','europe','north_america'),
    new Array('west',3,'asia','europe','south_america'),
    new Array('west',4,'africa','europe','north_america','south_america'),
    new Array('west',4,'africa','europe','south_america','north_america'),
    new Array('west',4,'africa','north_america','south_america','south_pacific'),
    new Array('west',4,'africa','south_america','north_america','south_pacific'),
    new Array('west',4,'asia','africa','north_america','south_america'),
    new Array('west',4,'asia','africa','south_america','north_america'),
    new Array('west',4,'asia','africa','europe','north_america'),
    new Array('west',4,'asia','africa','europe','south_america'),
    new Array('west',4,'asia','europe','africa','south_america'),
    new Array('west',4,'asia','europe','africa','north_america'),
    new Array('west',4,'asia','europe','south_america','north_america'),
    new Array('west',4,'asia','europe','north_america','south_america'),
    new Array('west',4,'asia','europe','north_america','south_pacific'),
    new Array('west',4,'south_pacific','north_america','europe','asia'),
    new Array('west',5,'africa','europe','north_america','south_america','south_pacific'),
    new Array('west',5,'africa','europe','south_america','north_america','south_pacific'),
    new Array('west',5,'asia','africa','europe','north_america','south_america'),
    new Array('west',5,'asia','africa','europe','south_america','north_america'),
    new Array('west',5,'asia','europe','north_america','south_america','south_pacific'),
    new Array('west',5,'asia','europe','south_america','north_america','south_pacific')
);

var cities = new Array(
    
    {continent: 'asia',country: 'Singapore',capital: 'Singapore',largerCities: '',},
    {continent: 'asia',country: 'Thailand',capital: 'Bangkok',largerCities: 'Chiang Mai, Chiang Rai, Hat Yai, Hua Hin, Koh Lanta, Koh Samet, Koh Samui, Krabi, Lampang, Phuket, Songkhla.',},
    {continent: 'asia',country: 'Hong Kong',capital: 'Kowloon',largerCities: 'Hong Kong Island, Macau, Shenzen',},
    {continent: 'asia',country: 'Japan',capital: 'Tokyo',largerCities: 'Fukuoka, Hakodate, Hirara, Hiroshima, Kitakyushu, Kobe, Komatsu, Kyushu, Nagasaki, Nagata, Nagoya, Nakatane, Osaka, Sapporo, Sendai, Shimonoseki, Yokohama',},
    {continent: 'asia',country: 'China',capital: 'Beijing',largerCities: 'Shanghai, Tianjin, Guangzhou, Shenzhen, Dongguan, Taipei, Chengdu, Hong Kong, Nanjing, Wuhan, Shenyang, Hangzhou, Chongqing , Macau',},
    {continent: 'asia',country: 'India',capital: 'Delhi',largerCities: 'Ahmadabad, Bangalore, Kolkata, Chennai, Delhi, Hyderabad, Mumbai, Goa, Jaipur, Agra, Thiruvananthapuram',},

    {continent: 'asia',country: 'SPACER',capital: '',largerCities: '',},

    {continent: 'asia',country: 'Afghanistan',capital: 'Kabul',largerCities: '',},
    {continent: 'asia',country: 'Bangladesh',capital: 'Dhaka',largerCities: '',},
    {continent: 'asia',country: 'Bhutan',capital: 'Thimphu',largerCities: '',},
    {continent: 'asia',country: 'Brunei',capital: 'Bandar Seri Begawan',largerCities: '',},
    {continent: 'asia',country: 'Burma',capital: 'Naypyidaw (Pyinmana)',largerCities: 'Yangon, Mandalay',},
    {continent: 'asia',country: 'Cambodia',capital: 'Phnom Penh',largerCities: 'Siem Reap',},
    {continent: 'asia',country: 'East Timor',capital: 'Dili',largerCities: '',},
    {continent: 'asia',country: 'Indonesia',capital: 'Jakarta',largerCities: 'Bali (Denpasar), Banda Aceh, Bandung, Bintan, Medan, Semarang',},
    {continent: 'asia',country: 'Korea, North',capital: 'Pyongyang',largerCities: '',},
    {continent: 'asia',country: 'Korea, South',capital: 'Seoul',largerCities: 'Daegu, Gwanju, Jinju, Pusan, Yeosu',},
    {continent: 'asia',country: 'Laos',capital: 'Vientiane',largerCities: '',},
    {continent: 'asia',country: 'Malaysia',capital: 'Kuala Lumpur',largerCities: 'Ipoh, Johur Bharu, Kota Baharu, Kota Kinabalu, Kuala Terengganu, Kuantan, Kuching, Langkawi, Marudi, Miri, Mukah, Penang, Sandakan',},
    {continent: 'asia',country: 'Maldives',capital: 'Malé',largerCities: '',},
    {continent: 'asia',country: 'Micronesia, Federated States of',capital: 'Palikir',largerCities: 'Weno',},
    {continent: 'asia',country: 'Mongolia',capital: 'Ulan Bator',largerCities: '',},
    {continent: 'asia',country: 'Nepal',capital: 'Kathmandu',largerCities: '',},
    {continent: 'asia',country: 'Pakistan',capital: 'Islamabad',largerCities: 'Karachi, Lahore, Faisalabad, Rawalpindi, Gujranwala, Multan, Hyderabad, Peshawar, Quetta',},
    {continent: 'asia',country: 'Palau',capital: 'Ngerulmud',largerCities: 'Koror, Meyuns, Airai',},
    {continent: 'asia',country: 'Papua New Guinea',capital: 'Port Moresby',largerCities: '',},
    {continent: 'asia',country: 'Philippines',capital: 'Manila',largerCities: 'Quezon City, Cebu, Davao, Surigao, Caticlan',},
    {continent: 'asia',country: 'Sri Lanka',capital: 'Sri Jayawardenepura Kotte',largerCities: 'Colombo',},
    {continent: 'asia',country: 'Vietnam',capital: 'Hanoi',largerCities: 'Ho Chi Minh City, Da Nang, Hoi An, Nha Trang. Sa Pa, Da Lat.',},
    {continent: 'asia',country: 'Republic of China (Taiwan)',capital: 'Taipei',largerCities: 'Kaohsiung, Taichung',},
    {continent: 'asia',country: 'Guam',capital: 'Hagåtña',largerCities: 'Tamuning, Mangilao, Yigo',},
    {continent: 'asia',country: 'United Arab Emirates',capital: 'Abu Dhabi',largerCities: 'Dubai',},

    {continent: 'africa',country: 'South Africa',capital: 'Johannesburg',largerCities: 'Pretoria, Durban, Cape Town, Port Elizabeth, East London, Pilanesberg',},	
    {continent: 'africa',country: 'Kenya',capital: 'Nairobi',largerCities: '',},
    {continent: 'africa',country: 'Tanzania',capital: 'Dodoma',largerCities: 'Dar es Salaam, Mwanza, Zanzibar',},
    {continent: 'africa',country: 'Zimbabwe',capital: 'Harare',largerCities: 'Victoria Falls',},

    {continent: 'africa',country: 'SPACER',capital: '',largerCities: '',},

    {continent: 'africa',country: 'Algeria',capital: 'Algiers',largerCities: '',},
    {continent: 'africa',country: 'Angola',capital: 'Luanda',largerCities: '',},
    {continent: 'africa',country: 'Bahrain',capital: 'Manama',largerCities: '',},
    {continent: 'africa',country: 'Benin',capital: 'Porto-Novo',largerCities: 'Cotonou',},
    {continent: 'africa',country: 'Botswana',capital: 'Gaborone',largerCities: '',},
    {continent: 'africa',country: 'Burkina Faso',capital: 'Ouagadougou',largerCities: '',},
    {continent: 'africa',country: 'Burundi',capital: 'Bujumbura',largerCities: '',},
    {continent: 'africa',country: 'Cameroon',capital: 'Yaoundé',largerCities: 'Douala',},
    {continent: 'africa',country: 'Cape Verde',capital: 'Praia',largerCities: '',},
    {continent: 'africa',country: 'Central African Republic',capital: 'Bangui',largerCities: '',},
    {continent: 'africa',country: 'Chad',capital: 'N\'Djamena',largerCities: '',},
    {continent: 'africa',country: 'Comoros',capital: 'Moroni',largerCities: '',},
    {continent: 'africa',country: 'Congo, Democratic Republic of the',capital: 'Kinshasa',largerCities: '',},
    {continent: 'africa',country: 'Congo, Republic of the',capital: 'Brazzaville',largerCities: '',},
    {continent: 'africa',country: 'Djibouti',capital: 'Djibouti',largerCities: '',},
    {continent: 'africa',country: 'Egypt',capital: 'Cairo',largerCities: 'Alexandria, Aswan, Hurghada',},
    {continent: 'africa',country: 'Equatorial Guinea',capital: 'Malabo',largerCities: '',},
    {continent: 'africa',country: 'Eritrea',capital: 'Asmara',largerCities: '',},
    {continent: 'africa',country: 'Ethiopia',capital: 'Addis Ababa',largerCities: '',},
    {continent: 'africa',country: 'Gabon',capital: 'Libreville',largerCities: '',},
    {continent: 'africa',country: 'Gambia, The',capital: 'Banjul',largerCities: 'Serekunda',},
    {continent: 'africa',country: 'Ghana',capital: 'Accra',largerCities: '',},
    {continent: 'africa',country: 'Guinea',capital: 'Conakry',largerCities: '',},
    {continent: 'africa',country: 'Guinea-Bissau',capital: 'Bissau',largerCities: '',},
    {continent: 'africa',country: 'Iran',capital: 'Tehran',largerCities: '',},
    {continent: 'africa',country: 'Iraq',capital: 'Baghdad',largerCities: '',},
    {continent: 'africa',country: 'Israel',capital: 'Jerusalem',largerCities: 'Tel Aviv',},
    {continent: 'africa',country: 'Cote D\'Ivoire',capital: 'Yamoussoukro',largerCities: 'Abidjan',},
    {continent: 'africa',country: 'Jordan',capital: 'Amman',largerCities: '',},
    {continent: 'africa',country: 'Kuwait',capital: 'Kuwait City',largerCities: '',},
    {continent: 'africa',country: 'Lebanon',capital: 'Beirut',largerCities: '',},
    {continent: 'africa',country: 'Lesotho',capital: 'Maseru',largerCities: '',},
    {continent: 'africa',country: 'Liberia',capital: 'Monrovia',largerCities: '',},
    {continent: 'africa',country: 'Libya',capital: 'Tripoli',largerCities: '',},
    {continent: 'africa',country: 'Madagascar',capital: 'Antananarivo',largerCities: '',},
    {continent: 'africa',country: 'Malawi',capital: 'Lilongwe',largerCities: '',},
    {continent: 'africa',country: 'Mali',capital: 'Bamako',largerCities: '',},
    {continent: 'africa',country: 'Mauritania',capital: 'Nouakchott',largerCities: '',},
    {continent: 'africa',country: 'Mauritius',capital: 'Port Louis',largerCities: '',},
    {continent: 'africa',country: 'Morocco',capital: 'Rabat',largerCities: 'Casablanca',},
    {continent: 'africa',country: 'Mozambique',capital: 'Maputo',largerCities: '',},
    {continent: 'africa',country: 'Namibia',capital: 'Windhoek',largerCities: '',},
    {continent: 'africa',country: 'Niger',capital: 'Niamey',largerCities: '',},
    {continent: 'africa',country: 'Nigeria',capital: 'Abuja',largerCities: 'Lagos',},
    {continent: 'africa',country: 'Oman',capital: 'Muscat',largerCities: '',},
    {continent: 'africa',country: 'Qatar',capital: 'Doha',largerCities: '',},
    {continent: 'africa',country: 'Rwanda',capital: 'Kigali',largerCities: '',},
    {continent: 'africa',country: 'São Tomé and Príncipe',capital: 'São Tomé',largerCities: '',},
    {continent: 'africa',country: 'Saudi Arabia',capital: 'Riyadh',largerCities: '',},
    {continent: 'africa',country: 'Senegal',capital: 'Dakar',largerCities: '',},
    {continent: 'africa',country: 'Seychelles',capital: 'Victoria',largerCities: '',},
    {continent: 'africa',country: 'Sierra Leone',capital: 'Freetown',largerCities: '',},
    {continent: 'africa',country: 'Somalia',capital: 'Mogadishu',largerCities: '',},
    {continent: 'africa',country: 'South Sudan',capital: 'Juba',largerCities: '',},
    {continent: 'africa',country: 'Sudan',capital: 'Khartoum',largerCities: 'Omdurman',},
    {continent: 'africa',country: 'Swaziland',capital: 'Mbabane',largerCities: 'Manzini',},
    {continent: 'africa',country: 'Syria',capital: 'Damascus',largerCities: 'Aleppo',},
    {continent: 'africa',country: 'Togo',capital: 'Lomé',largerCities: '',},
    {continent: 'africa',country: 'Tunisia',capital: 'Tunis',largerCities: '',},
    {continent: 'africa',country: 'Uganda',capital: 'Kampala',largerCities: 'Entebbe',},
    {continent: 'africa',country: 'United Arab Emirates',capital: 'Abu Dhabi',largerCities: 'Dubai',},
    {continent: 'africa',country: 'Yemen',capital: 'Sana\'a',largerCities: '',},
    {continent: 'africa',country: 'Zambia',capital: 'Lusaka',largerCities: '',},

    {continent: 'europe',country: 'France',capital: 'Paris',largerCities: 'Bordeaux, Boulogne, Bourges, Brest, Calais, Corsica, Lyon, Marseille, Montpellier, Nantes, Nice, Paris, Reims, Strasbourg, Toulouse',},
    {continent: 'europe',country: 'Germany',capital: 'Berlin',largerCities: 'Bremen, Cologne, Dresden, Dusseldorf, Frankfurt, Hamburg, Leipzig, Munich, Rostock, Stuttgart',},
    {continent: 'europe',country: 'Italy',capital: 'Rome',largerCities: 'Bari, Bologna, Florence, Genoa, Milan, Naples, Palermo, Pisa, Sardinia, Sicily, Turin, Venice',},
    {continent: 'europe',country: 'Spain',capital: 'Madrid',largerCities: 'Alicante, Barcelona, Bilbao, Canary Islands, Cordoba, Gibralta, Grenada, Ibiza, La Coruna, Malaga, Mallorca, Seville, Valencia, Vigo',},
    {continent: 'europe',country: 'Switzerland',capital: 'Bern',largerCities: 'Zurich, Geneva, Basel, Lausanne',},
    {continent: 'europe',country: 'United Kingdom',capital: 'London',largerCities: 'Birmingham, Bristol, Leeds, Liverpool, London, Manchester, Newcastle, Norwich, Sheffield, Southampton, Cardiff, Edinburgh, Glasgow, Aberdeen',},

    {continent: 'europe',country: 'SPACER',capital: '',largerCities: '',},

    {continent: 'europe',country: 'Albania',capital: 'Tirana',largerCities: '',},
    {continent: 'europe',country: 'Algeria',capital: 'Algiers',largerCities: '',},
    {continent: 'europe',country: 'Andorra',capital: 'Andorra la Vella',largerCities: '',},
    {continent: 'europe',country: 'Armenia',capital: 'Yerevan',largerCities: '',},
    {continent: 'europe',country: 'Austria',capital: 'Vienna',largerCities: 'Graz, Klagenfurt, Salzburg, Innsbruck',},
    {continent: 'europe',country: 'Azerbaijan',capital: 'Baku',largerCities: '',},
    {continent: 'europe',country: 'Bahrain',capital: 'Manama',largerCities: '',},
    {continent: 'europe',country: 'Belarus',capital: 'Minsk',largerCities: '',},
    {continent: 'europe',country: 'Belgium',capital: 'Brussels',largerCities: 'Antwerp, Bruges, Ghent, Lieges',},
    {continent: 'europe',country: 'Bosnia and Herzegovina',capital: 'Sarajevo',largerCities: '',},
    {continent: 'europe',country: 'Bulgaria',capital: 'Sofia',largerCities: 'Vidin, Varna',},
    {continent: 'europe',country: 'Croatia',capital: 'Zagreb',largerCities: 'Split, Dubrovnik, Pula, Zadar',},
    {continent: 'europe',country: 'Cyprus',capital: 'Larnaca',largerCities: '',},
    {continent: 'europe',country: 'Czech Republic',capital: 'Prague',largerCities: 'Brno, Karlovy, Prerov, Zlin',},
    {continent: 'europe',country: 'Denmark',capital: 'Copenhagen',largerCities: 'Aalborg, Arhus, Billund, Copenhagen, Odense',},
    {continent: 'europe',country: 'Egypt',capital: 'Cairo',largerCities: 'Alexandria, Aswan, Hurghada',},
    {continent: 'europe',country: 'Estonia',capital: 'Tallinn',largerCities: '',},
    {continent: 'europe',country: 'Finland',capital: 'Helsinki',largerCities: 'Ivalo, Joensuu, Kajaani, Rovaniemi, Oulu, Tampere, Vaasa, Turku, Ivalo',},
    {continent: 'europe',country: 'Georgia',capital: 'Tbilisi',largerCities: '',},
    {continent: 'europe',country: 'Greece',capital: 'Athens',largerCities: 'Alexandroupolis, Crete – Heraklion, Ioannina, Kavala, Mykonos, Rhodes, Santorini, Thessaloniki',},
    {continent: 'europe',country: 'Hungary',capital: 'Budapest',largerCities: '',},
    {continent: 'europe',country: 'Iceland',capital: 'Reykjavík',largerCities: '',},
    {continent: 'europe',country: 'Iran',capital: 'Tehran',largerCities: '',},
    {continent: 'europe',country: 'Iraq',capital: 'Baghdad',largerCities: '',},
    {continent: 'europe',country: 'Ireland, Republic of',capital: 'Dublin',largerCities: 'Cork, Dublin, Galway, Kilarney, Shannon',},
    {continent: 'europe',country: 'Israel',capital: 'Tel Aviv',largerCities: '',},
    {continent: 'europe',country: 'Jordan',capital: 'Amman',largerCities: '',},
    {continent: 'europe',country: 'Kazakhstan',capital: 'Astana',largerCities: 'Almaty, Shymkent',},
    {continent: 'europe',country: 'Kuwait',capital: 'Kuwait City',largerCities: '',},
    {continent: 'europe',country: 'Kyrgyzstan',capital: 'Bishkek',largerCities: '',},
    {continent: 'europe',country: 'Latvia',capital: 'Riga',largerCities: '',},
    {continent: 'europe',country: 'Lebanon',capital: 'Beirut',largerCities: '',},
    {continent: 'europe',country: 'Libya',capital: 'Tripoli',largerCities: '',},
    {continent: 'europe',country: 'Liechtenstein',capital: 'Vaduz',largerCities: 'Schaan',},
    {continent: 'europe',country: 'Lithuania',capital: 'Vilnius',largerCities: '',},
    {continent: 'europe',country: 'Luxembourg',capital: 'Luxembourg',largerCities: '',},
    {continent: 'europe',country: 'Macedonia, Republic of',capital: 'Skopje',largerCities: '',},
    {continent: 'europe',country: 'Malta',capital: 'Valletta',largerCities: '',},
    {continent: 'europe',country: 'Moldova',capital: 'Chișinău',largerCities: '',},
    {continent: 'europe',country: 'Monaco',capital: 'Monaco',largerCities: '',},
    {continent: 'europe',country: 'Montenegro',capital: 'Podgorica',largerCities: '',},
    {continent: 'europe',country: 'Morocco',capital: 'Rabat',largerCities: 'Casablanca, Marrakech',},
    {continent: 'europe',country: 'Netherlands',capital: 'Amsterdam',largerCities: 'Eindhoven, Rotterdam, The Hague',},
    {continent: 'europe',country: 'Norway',capital: 'Oslo',largerCities: 'Allesund, Bergen, Bodo, Evenes, Hammerfest, Kirkenes, Kristiansand, Longyearbyen, Molde, Stavanger, Tromso, Trondheim',},
    {continent: 'europe',country: 'Oman',capital: 'Muscat',largerCities: '',},
    {continent: 'europe',country: 'Poland',capital: 'Warsaw',largerCities: 'Gdansk, Krakow, Poznan, Szczecin, Katowice, Wroclaw',},
    {continent: 'europe',country: 'Portugal',capital: 'Lisbon',largerCities: 'Faro, Porto, Vila Real',},
    {continent: 'europe',country: 'Qatar',capital: 'Doha',largerCities: '',},
    {continent: 'europe',country: 'Romania',capital: 'Bucharest',largerCities: '',},
    {continent: 'europe',country: 'Russia',capital: 'Moscow',largerCities: 'St Petersburg, Nizhzy Novgorod, Samara, Krasnodar',},
    {continent: 'europe',country: 'San Marino',capital: 'San Marino',largerCities: '',},
    {continent: 'europe',country: 'Saudi Arabia',capital: 'Riyadh',largerCities: '',},
    {continent: 'europe',country: 'Serbia',capital: 'Belgrade',largerCities: '',},
    {continent: 'europe',country: 'Slovakia',capital: 'Bratislava',largerCities: '',},
    {continent: 'europe',country: 'Slovenia',capital: 'Ljubljana',largerCities: '',},
    {continent: 'europe',country: 'Sweden',capital: 'Stockholm',largerCities: 'Gothenberg, Malmo, Linoping, Ostersund',},
    {continent: 'europe',country: 'Syria',capital: 'Damascus',largerCities: '',},
    {continent: 'europe',country: 'Tajikistan',capital: 'Dushanbe',largerCities: '',},
    {continent: 'europe',country: 'Tunisia',capital: 'Tunis',largerCities: '',},
    {continent: 'europe',country: 'Turkey',capital: 'Ankara',largerCities: 'Antalya, Istanbul, Izmir',},
    {continent: 'europe',country: 'Turkmenistan',capital: 'Ashgabat',largerCities: '',},
    {continent: 'europe',country: 'Ukraine',capital: 'Kiev',largerCities: 'Odessa',},
    {continent: 'europe',country: 'United Arab Emirates',capital: 'Abu Dhabi',largerCities: 'Dubai',},
    {continent: 'europe',country: 'Uzbekistan',capital: 'Tashkent',largerCities: '',},
    {continent: 'europe',country: 'Yemen',capital: 'Sana\'a',largerCities: '',},
    {continent: 'europe',country: 'Kosovo, Republic of',capital: 'Pristina',largerCities: '',},
    {continent: 'europe',country: 'Northern Cyprus',capital: 'Nicosia',largerCities: '',},
    {continent: 'europe',country: 'Gibraltar',capital: 'Gibraltar',largerCities: '',},
    {continent: 'europe',country: 'Guernsey',capital: 'St Peter Port',largerCities: '',},
    {continent: 'europe',country: 'Jersey',capital: 'Saint Helier',largerCities: '',},
    {continent: 'europe',country: 'Man, Isle of',capital: 'Douglas',largerCities: '',},
    {continent: 'europe',country: 'Svalbard',capital: 'Longyearbyen',largerCities: '',},

    {continent: 'north_america',country: 'Canada',capital: 'Vancouver',largerCities: 'Toronto, Montreal, Calgary, Charlotte Town, Dawson, Edmondson, Edmonton, Fredericton, Halifax, Kelowna, Lethbridge, London, Moncton, Prince Albert, Prince George, Prince Rupert, Quebec, Regina, Resolute, Saint John, Saskatoon, St Johns, Sydney, Thunder Bay, Victoria, Whitehorse, Winnipeg, Yellowknife, Ottawa',},
    {continent: 'north_america',country: 'United States',capital: 'Washington, D.C.',largerCities: 'New York City, Los Angeles, Chicago, Houston, Philadelphia, Phoenix, San Antonio, San Diego, Dallas, San Francisco, Fort Worth, Charlotte, Detroit, Memphis, Boston, Seattle, Denver, SPACER, Aberdeen (MD), Aberdeen (SD), Abilene (TX), Albany (NY), Albuquerque (NM), Alexandria (LA), Alexandria (VA), Allentown (PA), Altoona (PA), Aspen (CO), Anchorage (AK), Annapolis (MD), Anniston (AL), Atlanta (GA), Atlantic City (NJ), Augusta (ME), Austin (TX), Bakersfield (CA), Baltimore (MD), Barrow (AK), Baton Rouge (LA), Bethel (AK), Billings (MT), Biloxi (MS), Birmingham (AL), Bismarck (ND), Boston (MA), Boulder (CO), Bridgeport (CT), Bristol (TN), Buffalo (NY), Burbank (CA), Burlington (VT), Butte (MT), Cambridge (MD), Camden (NJ), Canton (OH), Cape Girardeau (MO), Carlsbad (NM), Carson City (NV), Casper (WY), Cedar Rapids (IA), Charleston (SC), Charleston (WV), Charlotte (NC), Charlottesville (VA), Chicago (IL), Cincinnati (OH), Cleveland (OH), Colorado Springs (CO), Columbia (SC), Columbus (MS), Columbus (OH), Concord (NH), Corpus Christi (TX), Corvallis (OR), Dallas Fort Worth (TX), Dallas North (TX), Danbury (CT), Davenport (IA), Dayton (OH), Daytona Beach (FL), Denver (CO), Des Moines (IA), Detroit (MI), Dickinson (ND), Dodge City (KS), Duluth (MN), Durango (CO), Durham (NC), Eagle (Vail) (CO), El Dorado (AR), El Paso (TX), Elko (NV), Elmira (NY), Eugene (OR), Fairbanks (AK), Fargo (ND), Farmington (NM), Fayetteville (AR), Fayetteville (NC), Flagstaff (AZ), Flint (MI), Florence (SC), Frankfort (KY), Fresno (CA), Ft Collins (CO), Ft Dodge (IA), Ft Lauderdale (FL), Ft Myers (FL), Ft Smith (AR), Ft Wayne (IN), Grand Forks (ND), Grand Junction (CO), Grand Rapids (MI), Great Falls (MT), Green Bay (WI), Greensboro (NC), Greenville (MS), Greenville (SC), Greenwich (CT), Gulfport (MS), Harrisburg (PA), Hartford (CT), Hastings (NE), Havre (MT), Helena (MT), Hilo (HI), Honolulu (HI), Hoolehua (HI), Houston (TX), Huntington (WV), Huntsville (AL), Indianapolis (IN), Jackson (MS), Jackson (TN), Jackson Hole (WY), Jacksonville (FL), Jamestown (ND), Jamestown (NY), Jefferson City (MO), Jersey City/Newark (NJ), Johnson City (TN), Jonesboro (AR), Juneau (AK), Kansas City (KS), Kansas City (MO), Kauai (HI), Knoxville (TN), Kodiak (AK), Kona (HI), Laconia (NH), Lafayette (IN), Lafayette (LA), Lake Charles (LA), Lanai (HI), Lansing (MI), Laramie (WY), Las Cruces (NM), Las Vegas (NV), Lawton (OK), Lewiston (ME), Lexington (KY), Lincoln (NE), Little Rock (AR), Logan (UT), Los Angeles (CA), Louisville (KY), Lowell (MA), Madison (WI), Manchester (NH), Mason City (IA), Maui (HI), Medford (OR), Melbourne (FL), Memphis (TN), Merced (CA), Meriden (CT), Meridian (MS), Miami (FL), Milwaukee (WI), Minneapolis (MN), Minot (ND), Missoula (MT), Mitchell (SD), Mobile (AL), Modesto (CA), Monroe (LA), Monterey (CA), Montgomery (AL), Montpellier (VT), Morgantown (WV), Muncie (IN), Myrtle Beach (SC), Nashville (TN), New Haven (CT), New London (CT), New Orleans (LA), New York City (NY), Newark/Jersey City (NJ), Newport (RI), Newport News (VA), Nome (AK), Norfolk (NE), Norfolk (VA), North Platte (NE), Oklahoma (OK), Olympia (WA), Omaha (NE), Orlando (FL), Oshkosh (WI), Palm Springs (CA), Panama City (FL), Parkersburg (WV), Pensacola (FL), Philadelphia (PA), Phoenix (AZ), Pittsburgh (PA), Pittsfield (MA), Port Angeles (WA), Portland (ME), Portland (OR), Prescott (AZ), Providence (RI), Provo (UT), Pueblo (CO), Raleigh (NC), Rapid City (SD), Reading (PA), Redding (CA), Reno (NV), Richmond (VA), Roanoke (VA), Rochester (MN), Rochester (NY), Sacramento (CA), Salem (OR). Salina (KS), Salisbury (MD), Salt Lake City (UT), San Antonio (TX), San Diego (CA), San Francisco (CA), San Jose (CA), Santa Barbara (CA), Santa Rosa (CA), Santé Fe (NM), Sarasota (FL), Saul Ste Marie (MI), Scottsbluff (NE), Scranton (PA), Seattle (Tacoma) (WA), Sheridan (WY), Shreveport (LA), Sioux City (IA), Sioux Falls (SD), South Bend (IN), Spartanburg (SC), Spokane (WA), Springfield (MA), Springfield (MO), St Charles Columbus (MO), St Louis (MO), St Paul (MN), St Pete (FL), Stamford (CT), Syracuse (NY), Tallahassee (FL), Tampa (FL), Toledo (OH), Trenton (NJ), Tucson (AZ, Tulsa (OK), Virginia Beach (VA), Waco (TX), Walla Walla (WA), Washington, D.C - Any airport (DC), Washington, D.C – Baltimore Greenbelt (MD), Washington, D.C – Baltimore Intl (MD), Washington, D.C – Dulles (VA), Washington, D.C – Ronald Regan (VA), West Palm Beach (FL), Wheeling (WV), Wichita (KS), Wichita Falls (TX), Wilmington (DE), Wilmington (NC), Winston Salem (NC).',},

    {continent: 'north_america',country: 'SPACER',capital: '',largerCities: '',},

    {continent: 'north_america',country: 'Bahamas',capital: 'Nassau',largerCities: '',},
    {continent: 'north_america',country: 'Barbados',capital: 'Bridgetown',largerCities: '',},
    {continent: 'north_america',country: 'Belize',capital: 'Belmopan',largerCities: 'Belize City, San Ignacio',},
    {continent: 'north_america',country: 'Costa Rica',capital: 'San José',largerCities: '',},
    {continent: 'north_america',country: 'Cuba',capital: 'Havana',largerCities: '',},
    {continent: 'north_america',country: 'Dominica',capital: 'Roseau',largerCities: '',},
    {continent: 'north_america',country: 'Dominican Republic',capital: 'Santo Domingo',largerCities: '',},
    {continent: 'north_america',country: 'El Salvador',capital: 'San Salvador',largerCities: '',},
    {continent: 'north_america',country: 'Grenada',capital: 'St. George\'s',largerCities: '',},
    {continent: 'north_america',country: 'Guatemala',capital: 'Guatemala City',largerCities: '',},
    {continent: 'north_america',country: 'Haiti',capital: 'Port-au-Prince',largerCities: '',},
    {continent: 'north_america',country: 'Honduras',capital: 'Tegucigalpa',largerCities: '',},
    {continent: 'north_america',country: 'Jamaica',capital: 'Kingston',largerCities: 'Montego Bay, Port Antonio',},
    {continent: 'north_america',country: 'Mexico',capital: 'Mexico City',largerCities: 'Acapulco, Cancun, Cozumel, Durango, Guadalajara, Los Cabos, Merida, Mexico City, Puerto Escondido, Puerto Vallarta, Tijuana',},
    {continent: 'north_america',country: 'Nicaragua',capital: 'Managua',largerCities: '',},
    {continent: 'north_america',country: 'Panama',capital: 'Panama City',largerCities: '',},
    {continent: 'north_america',country: 'Saint Kitts and Nevis',capital: 'Basseterre',largerCities: '',},
    {continent: 'north_america',country: 'Saint Lucia',capital: 'Castries',largerCities: '',},
    {continent: 'north_america',country: 'Saint Vincent and the Grenadines',capital: 'Kingstown',largerCities: '',},
    {continent: 'north_america',country: 'Trinidad and Tobago',capital: 'Port of Spain',largerCities: 'Chaguanas, San Fernando, San Juan',},
    {continent: 'north_america',country: 'Anguilla',capital: 'The Valley',largerCities: '',},
    {continent: 'north_america',country: 'Aruba',capital: 'Oranjestad',largerCities: '',},
    {continent: 'north_america',country: 'Bermuda',capital: 'Hamilton',largerCities: '',},
    {continent: 'north_america',country: 'British Virgin Islands',capital: 'Road Town',largerCities: '',},
    {continent: 'north_america',country: 'Cayman Islands',capital: 'George Town',largerCities: '',},
    {continent: 'north_america',country: 'Montserrat',capital: 'Plymouth',largerCities: 'Brades',},
    {continent: 'north_america',country: 'Saint Helena, Ascension and Tristan da Cunha',capital: 'Jamestown',largerCities: 'Half Tree Hollow, Saint Paul\'s',},
    {continent: 'north_america',country: 'Saint-Pierre and Miquelon',capital: 'Saint-Pierre',largerCities: '',},
    {continent: 'north_america',country: 'Turks and Caicos Islands',capital: 'Cockburn Town',largerCities: '',},
    {continent: 'north_america',country: 'U.S. Virgin Islands',capital: 'Charlotte Amalie',largerCities: '',},

    {continent: 'south_america',country: 'Argentina',capital: 'Buenos Aires',largerCities: 'Bariloche, Cordoba, Corrientes, El Calafate, Formosa, Iguazu, La Plata, Mendoza, Salta, Ushuaia, Viedma',},
    {continent: 'south_america',country: 'Brazil',capital: 'Sao Paulo',largerCities: 'Rio de Janeiro, Belem, Belo Horizonte, Brasília, Fortaleza, Porto Alegre, Recife, Salvador, Manaus, Natal',},
    {continent: 'south_america',country: 'Chile',capital: 'Santiago',largerCities: 'Concepcion, Copiapo, Coquimbo, Easter Island, Iquique, Puerto Aisen, Puerto Montt, Punta Arenas, Valparaiso',},
    {continent: 'south_america',country: 'Peru',capital: 'Lima',largerCities: 'Arequipa, Cuzco, Iquitos',},

    {continent: 'south_america',country: 'SPACER',capital: '',largerCities: '',},

    {continent: 'south_america',country: 'Bolivia',capital: 'Sucre',largerCities: 'Santa Cruz, El Alto, La Paz',},
    {continent: 'south_america',country: 'Colombia',capital: 'Bogotá',largerCities: 'Cali, Cartagena, Cucuta, Leticia, Medellin, Neiva, Pasto, Popayan, Puerto Carreno, Santa Maria',},
    {continent: 'south_america',country: 'Ecuador',capital: 'Quito',largerCities: 'Mbato, Azogues, Cuenca, Esmeralda, Guayaquil, Loja, Tulcan',},
    {continent: 'south_america',country: 'Guyana',capital: 'Georgetown',largerCities: '',},
    {continent: 'south_america',country: 'Paraguay',capital: 'Asunción',largerCities: 'Concepcion',},
    {continent: 'south_america',country: 'Suriname',capital: 'Paramaribo',largerCities: '',},
    {continent: 'south_america',country: 'Uruguay',capital: 'Montevideo',largerCities: '',},
    {continent: 'south_america',country: 'Venezuela',capital: 'Caracas',largerCities: '',},
    {continent: 'south_america',country: 'French Guyana',capital: 'Cayenne',largerCities: '',},

    {continent: 'south_pacific',country: 'New Zealand',capital: 'Wellington',largerCities: 'Auckland, Blenheim, Christchurch, Dunedin, Invercargill, Manukau, Napier, New Plymouth, Queenstown, Rotorua, Taupo, Tauranga, Wanganui',},

    {continent: 'south_pacific',country: 'SPACER',capital: '',largerCities: '',},

    {continent: 'south_pacific',country: 'Fiji',capital: 'Suva',largerCities: 'Nadi',},
    {continent: 'south_pacific',country: 'Kiribati',capital: 'South Tarawa',largerCities: '',},
    {continent: 'south_pacific',country: 'Marshall Islands',capital: 'Majuro',largerCities: '',},
    {continent: 'south_pacific',country: 'Nauru',capital: 'Yaren District',largerCities: 'Denigomodu, Meneng, Aiwo',},
    {continent: 'south_pacific',country: 'Papua New Guinea',capital: 'Port Moresby',largerCities: '',},
    {continent: 'south_pacific',country: 'Samoa',capital: 'Apia',largerCities: '',},
    {continent: 'south_pacific',country: 'Solomon Islands',capital: 'Honiara',largerCities: '',},
    {continent: 'south_pacific',country: 'Tonga',capital: 'Nuku\'alofa',largerCities: '',},
    {continent: 'south_pacific',country: 'Tuvalu',capital: 'Funafuti',largerCities: '',},
    {continent: 'south_pacific',country: 'Vanuatu',capital: 'Port Vila',largerCities: '',},
    {continent: 'south_pacific',country: 'American Samoa',capital: 'Pago Pago',largerCities: 'Tafuna, Nu\'uuli, Leone, Ili\'ili, Aua',},
    {continent: 'south_pacific',country: 'Christmas Island',capital: 'The Settlement',largerCities: '',},
    {continent: 'south_pacific',country: 'Cocos (Keeling) Islands',capital: 'West Island',largerCities: '',},
    {continent: 'south_pacific',country: 'Cook Islands',capital: 'Avarua',largerCities: 'Rarotonga, Aitutaki',},
    {continent: 'south_pacific',country: 'Faroe Islands',capital: 'Tórshavn',largerCities: '',},
    {continent: 'south_pacific',country: 'French Polynesia [Tahiti]',capital: 'Papeete',largerCities: '',},
    {continent: 'south_pacific',country: 'Guam',capital: 'Hagåtña',largerCities: 'Tamuning, Mangilao, Yigo',},
    {continent: 'south_pacific',country: 'New Caledonia',capital: 'Noumea',largerCities: '',},
    {continent: 'south_pacific',country: 'Niue',capital: 'Alofi',largerCities: '',},
    {continent: 'south_pacific',country: 'Norfolk Island',capital: 'Kingston',largerCities: 'Burnt Pine',},
    {continent: 'south_pacific',country: 'Northern Mariana Islands',capital: 'Saipan',largerCities: '',},
    {continent: 'south_pacific',country: 'Pitcairn Island',capital: 'Adamstown',largerCities: '',},
    {continent: 'south_pacific',country: 'Tokelau',capital: 'Nukunonu',largerCities: '',},
    {continent: 'south_pacific',country: 'Wallis and Futuna',capital: 'Matâ\'Utu',largerCities: '',}

);

function bindEastWestButtons(){
    $('#west, #east').click(function(e){
        if(state.direction.direction == '' || state.direction.direction != e.target.id){
            state.continentFirst.continentFirst = '';
            state.continentSecond.continentSecond = '';
            state.continentThird.continentThird = '';
            state.continentFourth.continentFourth = '';
            state.continentFifth.continentFifth = '';
        }
        state.direction.direction = e.target.id;
        if(state.direction.direction == '')
            return false;
        process(e);
        return false;
    });
    $('button > #west, button > #east').parent().click(function(e){
        if(state.direction.direction == '' || state.direction.direction != $(e.target).children('a').attr('id')){
            state.continentFirst.continentFirst = '';
            state.continentSecond.continentSecond = '';
            state.continentThird.continentThird = '';
            state.continentFourth.continentFourth = '';
            state.continentFifth.continentFifth = '';
        }
        state.direction.direction = $(e.target).children('a').attr('id');
        if(state.direction.direction == '')
            return false;
        process(e);
        return false;
    });

}

$(document).ready(function(){
    window.bookingDirectory = $('input[id="bookingdirectory"]').val();
    loadStepScreen('direction');
    bindEastWestButtons();
    
    $('div.prev-next > p > a').click(function(e){
        if(process(e)){
            return true;
        } else {
            return false;
        }
    });         
});

var stepScreens = {

    direction: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'directionform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: '',
        navButtonNext: '',
    },

    continentNumber: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'continentNumberform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Next',
    },

    continentDetailsFirst: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'continentSelectform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Next',
        continentOptions: new Array(),
    },

    continentDetailsSecond: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'continentSelectform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Next',
        continentOptions: new Array(),
    },

    continentDetailsThird: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'continentSelectform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Next',
        continentOptions: new Array(),
    },

    continentDetailsFourth: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'continentSelectform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Next',
        continentOptions: new Array(),
    },

    continentDetailsFifth: {
        //background: '/wp-content/themes/rat/img/bg-step1.jpg',
        heading: 'Step1 - Build my trip',
        form: 'continentSelectform',
        step: 'step1',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Next',
        continentOptions: new Array(),
    },

    itinerary: {
        //background: '/wp-content/themes/rat/img/bg-step2.jpg',
        heading: 'Step2 - Design my Itinerary',
        form: 'itineraryform',
        step: 'step2',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Proceed to Step 3',
    },

    preview: {
        //background: '/wp-content/themes/rat/img/bg-step3.jpg',
        heading: 'Step3 - Details and Preview',
        form: 'previewform',
        step: 'step3',
        helpButton: true,
        navButtonPrev: 'Previous Question',
        navButtonNext: 'Finish',
    },

};

var state = {
    direction: {
        direction: '',
    },
    continentNumber:{
        continentNumber: '',
    },
    continentFirst:{
        continentFirst: '',
    },
    continentSecond:{
        continentSecond: '',
    },
    continentThird:{
        continentThird: '',
    },
    continentFourth:{
        continentFourth: '',
    },
    continentFifth:{
        continentFifth: '',
    },
    itinerary: {
        cityLeaving: '',
        dateLeaving: '',
        travelClass: '',
        extraCitiesNo1: 0,
        extraCities1: {},
        extraCitiesNo2: 0,
        extraCities2: {},
        extraCitiesNo3: 0,
        extraCities3: {},
        extraCitiesNo4: 0,
        extraCities4: {},
        extraCitiesNo5: 0,
        extraCities5: {},
    },
    preview: {
        adultNo: '',
        childrenNo: '',
        firstName: '',
        lastName: '',
        phone: '',
        comments: '',
        accountEmail: '',
        accountPassword: '',
        accountConfirm: '',
    },
};

var currentScreen = '';

function updateState(stateStep){
    for (var fieldToUpdate in state[stateStep]) {
        if (state[stateStep].hasOwnProperty(fieldToUpdate)) {
            if(state[stateStep][fieldToUpdate] != ''){
                $('#buildtripform').find('.'+fieldToUpdate).val(state[stateStep][fieldToUpdate]);
            }
        }
    }
    if(stateStep == 'continentDetailsFirst' || stateStep == 'continentDetailsSecond' || stateStep == 'continentDetailsThird' || stateStep == 'continentDetailsFourth' || stateStep == 'continentDetailsFifth'){
        if(stateStep == 'continentDetailsFirst')
            valCheck = state.continentFirst.continentFirst;
        if(stateStep == 'continentDetailsSecond')
            valCheck = state.continentSecond.continentSecond;
        if(stateStep == 'continentDetailsThird')
            valCheck = state.continentThird.continentThird;
        if(stateStep == 'continentDetailsFourth')
            valCheck = state.continentFourth.continentFourth;
        if(stateStep == 'continentDetailsFifth')
            valCheck = state.continentFifth.continentFifth;
        $('input[type="radio"][value="'+valCheck+'"]').prop('checked',true);
    }
    if(stateStep == 'itinerary'){
        for(var i=1; i<=state.continentNumber.continentNumber; i++){
            for(var j=0; j<=state.itinerary['extraCitiesNo'+i]; j++){
                cityNo = j+1;
                if(state.itinerary['extraCities'+i]['country'+cityNo] != '' && state.itinerary['extraCities'+i].hasOwnProperty('country'+cityNo)){
                    $('select.country'+i+'-'+cityNo).val(state.itinerary['extraCities'+i]['country'+cityNo]);
                    if(i == 1)
                        s = 'continentFirst';
                    if(i == 2)
                        s = 'continentSecond';
                    if(i == 3)
                        s = 'continentThird';
                    if(i == 4)
                        s = 'continentFourth';
                    if(i == 5)
                        s = 'continentFifth';
                    populateCityDropdown(state[s][s], state.itinerary['extraCities'+i]['country'+cityNo], i+'-'+cityNo);
                    $('select.city'+i+'-'+cityNo).val(state.itinerary['extraCities'+i]['city'+cityNo]);
                }
                //if(state.itinerary['extraCities'+i]['city'+cityNo] != '' && state.itinerary['extraCities'+i].hasOwnProperty('city'+cityNo))
                    //$('select.country'+i+'-'+cityNo+' > option:contains("'+state.itinerary['extraCities'+i]['city'+cityNo]+'")').prop('selected',true);
                if(state.itinerary['extraCities'+i]['asiatransit'+cityNo] != 0 && state.itinerary['extraCities'+i].hasOwnProperty('asiatransit'+cityNo))
                    $('input[type="checkbox"][id="asiatransit'+i+'-'+cityNo+'"]').prop('checked',true);
                if(state.itinerary['extraCities'+i]['makeOwnArrangement'+cityNo] != 0 && state.itinerary['extraCities'+i].hasOwnProperty('makeOwnArrangement'+cityNo))
                    $('input[type="checkbox"].makeOwnArrangement'+i+'-'+cityNo).prop('checked',true);
                if(state.itinerary['extraCities'+i]['stayAmount'+cityNo] != '' && state.itinerary['extraCities'+i].hasOwnProperty('stayAmount'+cityNo))
                    $('select.stayAmount'+i+'-'+cityNo+' > option[value="'+state.itinerary['extraCities'+i]['stayAmount'+cityNo]+'"]').prop('selected',true);
                if(state.itinerary['extraCities'+i]['stayUnit'+cityNo] != '' && state.itinerary['extraCities'+i].hasOwnProperty('stayUnit'+cityNo)){
                    $('input[type="radio"][name="stayUnit'+i+'-'+cityNo+'"][id^="'+state.itinerary['extraCities'+i]['stayUnit'+cityNo]+'"]').prop('checked',true);
                }
            }
        }
    }
    if(stateStep == 'preview'){
        if(state.preview.adultNo != '')
            $('#adultno > option:contains("'+state.preview.adultNo+'")').prop('selected',true);
        if(state.preview.childrenNo != '')
            $('#childrenno > option:contains("'+state.preview.childrenNo+'")').prop('selected',true);
        if(state.preview.firstName != '')
            $('#firstname').val(state.preview.firstName);
        if(state.preview.lastName != '')
            $('#lastname').val(state.preview.lastName);
        if(state.preview.phone != '')
            $('#phone').val(state.preview.phone);
        if(state.preview.comments != '')
            $('#comments').val(state.preview.comments);
        if(state.preview.accountEmail != '')
            $('#accountemail').val(state.preview.accountEmail);
        if(state.preview.accountPassword != '')
            $('#accountpassword').val(state.preview.accountPassword);
        if(state.preview.accountConfirm != '')
            $('#accountconfirm').val(state.preview.accountConfirm);
    }
}

function populatePreviouslyAnswered(stepScreenToLoad){
    if(stepScreenToLoad == 'direction')
        return;
    $('div.answers').css('display','inherit');
    $('.answers > h3').html('What you selected');
    $('.answers > ul').append('<li>Direction: '+toTitleCase(state.direction.direction)+'</li>');
    if(stepScreenToLoad == 'continentNumber')
        return;
    $('.answers > ul').append('<li>Continents: '+state.continentNumber.continentNumber+'</li>');
    if(stepScreenToLoad == 'continentDetailsFirst')
        return;
    $('.answers > ul').append('<li>First: '+getContinentText(state.continentFirst.continentFirst)+'</li>');
    if(stepScreenToLoad == 'continentDetailsSecond')
        return;
    $('.answers > ul').append('<li>Second: '+getContinentText(state.continentSecond.continentSecond)+'</li>');
    if(stepScreenToLoad == 'continentDetailsThird')
        return;
    $('.answers > ul').append('<li>Third: '+getContinentText(state.continentThird.continentThird)+'</li>');
    if(stepScreenToLoad == 'continentDetailsFourth')
        return;
    if(state.continentNumber.continentNumber > 3){
        $('.answers > ul').append('<li>Fourth: '+getContinentText(state.continentFourth.continentFourth)+'</li>');
    }
    if(stepScreenToLoad == 'continentDetailsFifth')
        return;
    if(state.continentNumber.continentNumber > 4){
        $('.answers > ul').append('<li>Fifth: '+getContinentText(state.continentFifth.continentFifth)+'</li>');
    }
    if(stepScreenToLoad == 'itinerary')
        return;
    if(stepScreenToLoad == 'preview')
        $('div.answers').css('display','none');
}

function getContinentText(valueSearch){
    for(var i=0; i<continents.length; i++){
        if(continents[i].val == valueSearch){
            return continents[i].text;
        }
    }
    return null;
}

function toTitleCase(str){
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function populateCityDropdown(continent, country, suffixNo){
    $('select.city'+suffixNo).html('');
    for(var i=0; i<cities.length; i++){
        countryName = cities[i].country;
        capitalName = cities[i].capital;
        largerCities = cities[i].largerCities.split(', ').join(',');
        largerCities = largerCities.split(' ,').join(',').split(',');
        if(countryName != country || cities[i].continent != continent)
            continue;
        $('select.city'+suffixNo).append('<option>'+capitalName+'</option>');
        for(var j=0; j<largerCities.length; j++){
            if(largerCities[j] != '' && largerCities[j] != 'SPACER' && largerCities[j] != ' SPACER'){
                $('select.city'+suffixNo).append('<option>'+largerCities[j]+'</option>');
            } else if(largerCities[j] == 'SPACER' || largerCities[j] == ' SPACER'){
                $('select.city'+suffixNo).append('<option style="border-bottom: 1px dotted #000;" disabled="disabled">--------------------</option>');
            }
        }
    }
}

function countryOnChange(continent, selectClass){
    populateCityDropdown(continent, $('select.'+selectClass+' option:selected').html(), selectClass.replace('country',''));
}

function addDestination(aElement){
    $(aElement).parent().parent().parent().children( ".plus-minus" ).addClass( "be-show" );
    $(aElement).parent().parent().parent().children( ".plus-minus" ).removeClass( "be-hide" );
    $(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    $(aElement).parent().parent().parent().children('div.extraCities').append('<div class="clm2 group'+$(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val()+'" style="padding-bottom:40px;"></div>');
    asiaTransitHTML = '';
    if($(aElement).parent().parent().parent().children('section.asiatransit').length != 0){
        asiaTransitHTML = $(aElement).parent().parent().parent().children('section.asiatransit').html();
        asiaTransitHTML = '<div class="styled-form-elements" style="margin-bottom:10px;margin-top:15px;">'+asiaTransitHTML+'</div>';
    }
    citiesHTML = $(aElement).parent().parent().parent().children('div.clm2').html();
    detailsHTML = $(aElement).parent().parent().parent().children('section.number').html();
    addedGroupDiv = $(aElement).parent().parent().parent().children('div.extraCities').children('div.group'+$(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val());
    addedGroupDiv.append(asiaTransitHTML+'<div style="padding-bottom:20px;">'+citiesHTML+'</div>'+'<div class="number">'+detailsHTML+'</div>');
    newCountrySelect = addedGroupDiv.find('select[name="country"]');
    newCountrySelect.change(function(){
        countryOnChange($(this).prop('id'),$(this).prop('class'));
    });
    //newCountrySelect.children('option:contains("'+$(aElement).parent().parent().parent().children('div.clm2').find('select[class^="country"] > option:selected').html()+'")').prop('selected',true);
    newCountrySelect.children('option:contains("'+$(aElement).parent().parent().parent().children('div.clm2').find('select[class^="country"] > option:selected').html()+'")').each(function(){
        if($(this).html() == $(aElement).parent().parent().parent().children('div.clm2').find('select[class^="country"] > option:selected').html())
            $(this).prop('selected',true);
    });
    oldCountryClass = newCountrySelect.prop('class');
    newCountryClass = oldCountryClass.substr(0,oldCountryClass.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newCountrySelect.prop('class',newCountryClass);
    newCitySelect = addedGroupDiv.find('select[name="city"]');
    oldCityClass = newCitySelect.prop('class');
    newCityClass = oldCityClass.substr(0,oldCityClass.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newCitySelect.prop('class',newCityClass);
    newStayAmountSelect = addedGroupDiv.find('select[name="stayAmount"]');
    oldStayAmountClass = newStayAmountSelect.prop('class');
    newStayAmountClass = oldStayAmountClass.substr(0,oldStayAmountClass.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newStayAmountSelect.prop('class',newStayAmountClass);
    newDayInput = addedGroupDiv.find('input[type="radio"][id^="days"]');
    oldDayID = newDayInput.prop('id');
    newDayID = oldDayID.substr(0,oldDayID.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newDayName = 'stayUnit'+newDayID.substr(newDayID.indexOf('-')-1);
    newDayInput.prop('id',newDayID);
    newDayInput.prop('name',newDayName);
    addedGroupDiv.find('label[for^="days"]').prop('for',newDayID);
    newWeekInput = addedGroupDiv.find('input[type="radio"][id^="weeks"]');
    oldWeekID = newWeekInput.prop('id');
    newWeekID = oldWeekID.substr(0,oldWeekID.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newWeekName = 'stayUnit'+newWeekID.substr(newWeekID.indexOf('-')-1);
    newWeekInput.prop('id',newWeekID);
    newWeekInput.prop('name',newWeekName);
    addedGroupDiv.find('label[for^="weeks"]').prop('for',newWeekID);
    newMonthInput = addedGroupDiv.find('input[type="radio"][id^="months"]');
    oldMonthID = newMonthInput.prop('id');
    newMonthID = oldMonthID.substr(0,oldMonthID.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newMonthName = 'stayUnit'+newMonthID.substr(newMonthID.indexOf('-')-1);
    newMonthInput.prop('id',newMonthID);
    newMonthInput.prop('name',newMonthName);
    addedGroupDiv.find('label[for^="months"]').prop('for',newMonthID);
    makeOwnArrangementInput = addedGroupDiv.find('input[type="checkbox"][class^="makeOwnArrangement"]');
    oldMakeOwnArrangementID = makeOwnArrangementInput.prop('id');
    newMakeOwnArrangementID = oldMakeOwnArrangementID.substr(0,oldMakeOwnArrangementID.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
    newMakeOwnArrangementClass = 'makeOwnArrangement'+newMakeOwnArrangementID.substr(newMakeOwnArrangementID.indexOf('-')-1);
    newMakeOwnArrangementName = 'checkbox'+newMakeOwnArrangementID.substr(newMakeOwnArrangementID.indexOf('-')-1);
    makeOwnArrangementInput.prop('id',newMakeOwnArrangementID);
    makeOwnArrangementInput.prop('class',newMakeOwnArrangementClass);
    makeOwnArrangementInput.prop('name',newMakeOwnArrangementName);
    addedGroupDiv.find('label[for^="checkbox"]').prop('for',newMakeOwnArrangementID);
    newAsiaTransitInput = addedGroupDiv.find('input[type="checkbox"][id^="asiatransit"]');
    if(newAsiaTransitInput.length != 0){
        oldAsiaTransitID = newAsiaTransitInput.prop('id');
        newAsiaTransitID = oldAsiaTransitID.substr(0,oldAsiaTransitID.indexOf('-')+1)+(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val())+1);
        newAsiaTransitInput.prop('id',newAsiaTransitID);
        addedGroupDiv.find('label[for^="asiatransit"]').prop('for',newAsiaTransitID);
    }
    
    return false;
}

function removeDestination(aElement){
    if(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val()) == 0){
        return false;  
    }
    if(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val()) == 1){
        $(aElement).parent().parent().parent().children( ".plus-minus" ).addClass( "be-hide" );
        $(aElement).parent().parent().parent().children( ".plus-minus" ).removeClass( "be-show" );
    }
    $(aElement).parent().parent().parent().children('div.extraCities').children('div.group'+$(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val()).remove();
    $(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val(Number($(aElement).parent().parent().parent().children('input[class^="extraCitiesNo"]').val()) - 1);
    return false;
}

function loadStepScreen(stepScreenToLoad){

    currentScreen = stepScreenToLoad;

    //$('body').attr('style', 'background:url('+stepScreens[stepScreenToLoad].background+') fixed !important;');

    $('#buildtripheading').html(stepScreens[stepScreenToLoad].heading);

    $('ul.steps > li > span').removeClass('on');
    $('ul.steps > li > span[id="'+stepScreens[stepScreenToLoad].step+'"]').addClass('on');

    $('#buildtripform').html("");
    $('.'+stepScreens[stepScreenToLoad].form).clone().appendTo('#buildtripform');
    $('#buildtripform > div').css('display','inherit');
    if(state.continentNumber.continentNumber != ''){
        var inContinentDetails = true;
        var html_to_append = {};
        if(stepScreenToLoad == 'continentDetailsFirst'){
            for(var i=0; i<continentDecisions.length; i++){
                dir = continentDecisions[i][0];
                no = continentDecisions[i][1];
                if(dir == state.direction.direction && no == state.continentNumber.continentNumber){
                    html_to_append[continentDecisions[i][2]] = '<div class="be-continent '+continentDecisions[i][2]+'"><section><input type="radio" name="continentChoice" value="'+continentDecisions[i][2]+'" /><span>'+getContinentText(continentDecisions[i][2])+'</span></section></div>';
                }
            }
        } else if(stepScreenToLoad == 'continentDetailsSecond'){
            for(var i=0; i<continentDecisions.length; i++){
                dir = continentDecisions[i][0];
                no = continentDecisions[i][1];
                if(dir == state.direction.direction && no == state.continentNumber.continentNumber && state.continentFirst.continentFirst == continentDecisions[i][2]){
                    html_to_append[continentDecisions[i][3]] = '<div class="be-continent '+continentDecisions[i][3]+'"><section><input type="radio" name="continentChoice" value="'+continentDecisions[i][3]+'" /><span>'+getContinentText(continentDecisions[i][3])+'</span></section></div>';
                }
            }
        } else if(stepScreenToLoad == 'continentDetailsThird'){
            for(var i=0; i<continentDecisions.length; i++){
                dir = continentDecisions[i][0];
                no = continentDecisions[i][1];
                if(dir == state.direction.direction && no == state.continentNumber.continentNumber && state.continentFirst.continentFirst == continentDecisions[i][2] && state.continentSecond.continentSecond == continentDecisions[i][3]){
                    html_to_append[continentDecisions[i][4]] = '<div class="be-continent '+continentDecisions[i][4]+'"><section><input type="radio" name="continentChoice" value="'+continentDecisions[i][4]+'" /><span>'+getContinentText(continentDecisions[i][4])+'</span></section></div>';
                }
            }
        } else if(stepScreenToLoad == 'continentDetailsFourth'){
            for(var i=0; i<continentDecisions.length; i++){
                dir = continentDecisions[i][0];
                no = continentDecisions[i][1];
                if(dir == state.direction.direction && no == state.continentNumber.continentNumber && state.continentFirst.continentFirst == continentDecisions[i][2] && state.continentSecond.continentSecond == continentDecisions[i][3] && state.continentThird.continentThird == continentDecisions[i][4]){
                    html_to_append[continentDecisions[i][5]] = '<div class="be-continent '+continentDecisions[i][5]+'"><section><input type="radio" name="continentChoice" value="'+continentDecisions[i][5]+'" /><span>'+getContinentText(continentDecisions[i][5])+'</span></section></div>';
                }
            }
        } else if(stepScreenToLoad == 'continentDetailsFifth'){
            for(var i=0; i<continentDecisions.length; i++){
                dir = continentDecisions[i][0];
                no = continentDecisions[i][1];
                if(dir == state.direction.direction && no == state.continentNumber.continentNumber && state.continentFirst.continentFirst == continentDecisions[i][2] && state.continentSecond.continentSecond == continentDecisions[i][3] && state.continentThird.continentThird == continentDecisions[i][4] && state.continentFourth.continentFourth == continentDecisions[i][5]){
                    html_to_append[continentDecisions[i][6]] = '<div class="be-continent '+continentDecisions[i][6]+'"><section><input type="radio" name="continentChoice" value="'+continentDecisions[i][6]+'" /><span>'+getContinentText(continentDecisions[i][6])+'</span></section></div>';
                }
            }
        } else {
            inContinentDetails = false;
        }
        if(inContinentDetails){
            $('#buildtripform > div > section').remove();
            for(var prop in html_to_append){
                if(html_to_append.hasOwnProperty(prop)){
                    $('#buildtripform > div').append(html_to_append[prop]);
                }
            }
        }
    }
    if(state.continentNumber.continentNumber != '' && stepScreenToLoad == 'itinerary'){
        for(var i=0; i<state.continentNumber.continentNumber; i++){
            $('div[id="main"] > div.itineraryContinentDetailform').clone().appendTo('#buildtripform > div.itineraryform');
            $('#buildtripform').find('div.itineraryContinentDetailform').addClass('continent'+(i+1));
            $('#buildtripform').find('div.continent'+(i+1)).removeClass('itineraryContinentDetailform');
            $('#buildtripform').find('div.continent'+(i+1)).css('display','inherit');
            if(i == 0)
                continentName = 'continentFirst';
            if(i == 1)
                continentName = 'continentSecond';
            if(i == 2)
                continentName = 'continentThird';
            if(i == 3)
                continentName = 'continentFourth';
            if(i == 4)
                continentName = 'continentFifth';
            $('#buildtripform').find('div.continent'+(i+1)+' > p.question').html('Where would you like to go in <h3>'+getContinentText(state[continentName][continentName])+' Cities</h3>, and how long would you like to stay?');
            if(state[continentName][continentName] == 'asia'){
                $('#buildtripform').find('div.continent'+(i+1)+' > section.asiatransit > input[type="checkbox"]').prop('id',$('#buildtripform').find('div.continent'+(i+1)+' > section.asiatransit > input[type="checkbox"]').prop('id')+(i+1)+'-1');
                $('#buildtripform').find('div.continent'+(i+1)+' > section.asiatransit > label').prop('for',$('#buildtripform').find('div.continent'+(i+1)+' > section.asiatransit > label').prop('for')+(i+1)+'-1');
            } else {
                $('#buildtripform').find('div.continent'+(i+1)+' > section.asiatransit').remove();
            }
            $('#buildtripform').find('div.continent'+(i+1)+' > section > span > input[type="checkbox"]').addClass('makeOwnArrangement'+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > section > span > input[type="checkbox"]').parent().css({'position': 'relative', 'top': '30px'});
            $('#buildtripform').find('div.continent'+(i+1)+' > section > span > input[type="checkbox"]').prop('id',$('#buildtripform').find('div.continent'+(i+1)+' > section > span > input[type="checkbox"]').prop('id')+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > section > span.checkbox > label').prop('for',$('#buildtripform').find('div.continent'+(i+1)+' > section > span.checkbox > label').prop('for')+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select[name="country"]').addClass('country'+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.country'+(i+1)+'-1').html('');
            $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.country'+(i+1)+'-1').prop('id',state[continentName][continentName]);
            $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.country'+(i+1)+'-1').change(function(){
                countryOnChange($(this).prop('id'),$(this).prop('class'));
            });
            $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select[name="city"]').addClass('city'+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.city'+(i+1)+'-1').html('');
            var firstLoop = true;
            for(var j=0; j<cities.length; j++){
                if(cities[j].continent == state[continentName][continentName]){
                    if(cities[j].country == 'SPACER'){
                        $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.country'+(i+1)+'-1').append('<option style="border-bottom: 1px dotted #000;" disabled="disabled">--------------------</option>');
                    } else {
                        $('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.country'+(i+1)+'-1').append('<option>'+cities[j].country+'</option>');
                    }
                    if(firstLoop){
                        populateCityDropdown(state[continentName][continentName],$('#buildtripform').find('div.continent'+(i+1)+' > div.clm2 > div.box > div.styled-select > select.country'+(i+1)+'-1 > option:selected').text(),(i+1)+'-1');
                        firstLoop = false;
                    }
                }
            }
            $('#buildtripform').find('div.continent'+(i+1)+' > section.number > div > select[name="stayAmount"]').addClass('stayAmount'+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > section.number > span > input[name="stayUnit"]').each(function(){$(this).prop('id',$(this).prop('id')+(i+1)+'-1');$(this).prop('name',$(this).prop('name')+(i+1)+'-1');});
            $('#buildtripform').find('div.continent'+(i+1)+' > section.number > span > label').not('[for^="checkbox"]').each(function(){$(this).prop('for',$(this).prop('for')+(i+1)+'-1');});
            $('#buildtripform').find('div.continent'+(i+1)+' > section.number > span > input[name="stayUnit"]').addClass('stayUnit'+(i+1)+'-1');
            $('#buildtripform').find('div.continent'+(i+1)+' > section.plus-minus > p > a[name="addDestination"]').click(function(){
                addDestination($(this)[0]);
                return false;
            });
            $('#buildtripform').find('div.continent'+(i+1)+' > section.plus-minus > p > a[name="removeDestination"]').click(function(){
                removeDestination($(this)[0]);
                return false;
            });
            $('#buildtripform').find('div.continent'+(i+1)+' > input.extraCitiesNo').addClass('extraCitiesNo'+(i+1));
            $('#buildtripform').find('div.continent'+(i+1)+' > input.extraCitiesNo').removeClass('extraCitiesNo');
            for(var j=0; j<state.itinerary['extraCitiesNo'+(i+1)]; j++){
                addDestination($('#buildtripform').find('div.continent'+(i+1)+' > section.plus-minus > p > a[name="addDestination"]')[0]);
            }
        }
    }
    if(stepScreenToLoad == 'preview'){
        $('#buildtripform').find('.result').html('');
        $('#buildtripform').find('.result').html('<dt>Depart from '+state.itinerary.cityLeaving+', Australia</dt><dd>'+state.itinerary.dateLeaving+'</dd><dt>Travel Class</dt><dd>'+state.itinerary.travelClass+'</dd>');
        for(var i=1; i<=state.continentNumber.continentNumber; i++){
            if(i==1)
                $('#buildtripform').find('.result').append('<dt>'+getContinentText(state.continentFirst.continentFirst)+'</dt>');
            if(i==2)
                $('#buildtripform').find('.result').append('<dt>'+getContinentText(state.continentSecond.continentSecond)+'</dt>');
            if(i==3)
                $('#buildtripform').find('.result').append('<dt>'+getContinentText(state.continentThird.continentThird)+'</dt>');
            if(i==4)
                $('#buildtripform').find('.result').append('<dt>'+getContinentText(state.continentFourth.continentFourth)+'</dt>');
            if(i==5)
                $('#buildtripform').find('.result').append('<dt>'+getContinentText(state.continentFifth.continentFifth)+'</dt>');
            for(var j=0; j<=state.itinerary['extraCitiesNo'+i]; j++){
                cityNo = j+1;
                citiesHTML = '<dd>';
                citiesHTML = citiesHTML + state.itinerary['extraCities'+i]['country'+cityNo];
                citiesHTML = citiesHTML + ' - ' + state.itinerary['extraCities'+i]['city'+cityNo];
                if(state.itinerary['extraCities'+i]['asiatransit'+cityNo] == 1){
                    citiesHTML = '<dd>In transit';
                } else {
                    citiesHTML = citiesHTML + ', Staying for '+ state.itinerary['extraCities'+i]['stayAmount'+cityNo] + ' ' + toTitleCase(state.itinerary['extraCities'+i]['stayUnit'+cityNo]);
                }
                if(state.itinerary['extraCities'+i]['makeOwnArrangement'+cityNo]){
                    citiesHTML = citiesHTML + ', making own arrangements to next destination';
                }
                citiesHTML = citiesHTML + '</dd>';
                $('#buildtripform').find('.result').append(citiesHTML);
            }
        }
    }

    $('#helpbutton').css('visibility','hidden');
    if(stepScreens[stepScreenToLoad].helpButton)
        $('#helpbutton').css('visibility','visible');

    $('.answers > h3').html('');
    $('.answers > ul').html('');
    $('div.answers').css('display','none');
    populatePreviouslyAnswered(stepScreenToLoad);

    $('div.prev-next').css('display','none');
    if(stepScreens[stepScreenToLoad].navButtonPrev != ''){
        $('div.prev-next').css('display','inherit');
        $('div.prev-next > p.prev > a').html('<i class="fa fa-long-arrow-left"></i> '+stepScreens[stepScreenToLoad].navButtonPrev);
    }
    if(stepScreens[stepScreenToLoad].navButtonNext != ''){
        $('div.prev-next').css('display','inherit');
        $('div.prev-next > p.next > a').html(stepScreens[stepScreenToLoad].navButtonNext+' <i class="fa fa-long-arrow-right"></i>');
    }

    updateState(stepScreenToLoad);

    $('#buildtripform').find('#datepicker').datepicker({
        dateFormat: 'dd/mm/yy'
    });

}

function process(event){
    if(currentScreen == 'direction'){
        loadStepScreen('continentNumber');
        return false;
    } else if(currentScreen == 'continentNumber'){
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('direction');
            bindEastWestButtons();
            return false;
        }
        if(state.continentNumber.continentNumber == '' || state.continentNumber.continentNumber != $('#buildtripform > div > section > select.continentNumber').val()){
            state.continentFirst.continentFirst = '';
            state.continentSecond.continentSecond = '';
            state.continentThird.continentThird = '';
            state.continentFourth.continentFourth = '';
            state.continentFifth.continentFifth = '';
        }
        state.continentNumber.continentNumber = $('#buildtripform > div > section > select.continentNumber').val();
        loadStepScreen('continentDetailsFirst');
        return false;
    } else if(currentScreen == 'continentDetailsFirst'){
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('continentNumber');
            return false;
        }
        if($('input[name="continentChoice"]:checked').length == 0){
            alertUser('Please choose a continent.');
            return false;
        }
        if(state.continentFirst.continentFirst == '' || state.continentFirst.continentFirst != $('input[name="continentChoice"]:checked').val()){
            state.continentSecond.continentSecond = '';
            state.continentThird.continentThird = '';
            state.continentFourth.continentFourth = '';
            state.continentFifth.continentFifth = '';
        }
        state.continentFirst.continentFirst = $('input[name="continentChoice"]:checked').val();
        loadStepScreen('continentDetailsSecond');
        return false;
    } else if(currentScreen == 'continentDetailsSecond'){
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('continentDetailsFirst');
            return false;
        }
        if($('input[name="continentChoice"]:checked').length == 0){
            alertUser('Please choose a continent.');
            return false;
        }
        if(state.continentSecond.continentSecond == '' || state.continentSecond.continentSecond != $('input[name="continentChoice"]:checked').val()){
            state.continentThird.continentThird = '';
            state.continentFourth.continentFourth = '';
            state.continentFifth.continentFifth = '';
        }
        state.continentSecond.continentSecond = $('input[name="continentChoice"]:checked').val();
        loadStepScreen('continentDetailsThird');
        return false;
    } else if(currentScreen == 'continentDetailsThird'){
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('continentDetailsSecond');
            return false;
        }
        if($('input[name="continentChoice"]:checked').length == 0){
            alertUser('Please choose a continent.');
            return false;
        }
        if(state.continentThird.continentThird == '' || state.continentThird.continentThird != $('input[name="continentChoice"]:checked').val()){
            state.continentFourth.continentFourth = '';
            state.continentFifth.continentFifth = '';
        }
        state.continentThird.continentThird = $('input[name="continentChoice"]:checked').val();
        if(state.continentNumber.continentNumber > 3){
            loadStepScreen('continentDetailsFourth');
            return false;
        }
        loadStepScreen('itinerary');
        return true;
    } else if(currentScreen == 'continentDetailsFourth'){
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('continentDetailsThird');
            return false;
        }
        if($('input[name="continentChoice"]:checked').length == 0){
            alertUser('Please choose a continent.');
            return false;
        }
        if(state.continentFourth.continentFourth == '' || state.continentFourth.continentFourth != $('input[name="continentChoice"]:checked').val()){
            state.continentFifth.continentFifth = '';
        }
        state.continentFourth.continentFourth = $('input[name="continentChoice"]:checked').val();
        if(state.continentNumber.continentNumber > 4){
            loadStepScreen('continentDetailsFifth');
            return false;
        }
        loadStepScreen('itinerary');
        return true;
    } else if(currentScreen == 'continentDetailsFifth'){
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('continentDetailsFourth');
            return false;
        }
        if($('input[name="continentChoice"]:checked').length == 0){
            alertUser('Please choose a continent.');
            return false;
        }
        state.continentFifth.continentFifth = $('input[name="continentChoice"]:checked').val();
        loadStepScreen('itinerary');
        return true;
    } else if(currentScreen == 'itinerary'){
        if($(event.target).parent().hasClass('prev')){
            if(state.continentNumber.continentNumber > 4){
                loadStepScreen('continentDetailsFifth');
                return false;
            } else if(state.continentNumber.continentNumber > 3){
                loadStepScreen('continentDetailsFourth');
                return false;
            }
            loadStepScreen('continentDetailsThird');
            return false;
        }
        if($('.dateLeaving').val() == ''){
            alertUser('Please fill in the date you will be leaving Australia.');
            return false;
        }
        if(!dateValid($('.dateLeaving').val().substr(6,4)+'/'+$('.dateLeaving').val().substr(3,2)+'/'+$('.dateLeaving').val().substr(0,2))){
            alertUser('The date you are leaving Australia must be between tomorrow and 18 months away.');
            return false;
        }
        state.itinerary.cityLeaving = $('.cityLeaving').val();
        state.itinerary.dateLeaving = $('.dateLeaving').val();
        state.itinerary.travelClass = $('.travelClass').val();
        for(var i=0; i<state.continentNumber.continentNumber; i++){
            state.itinerary['extraCitiesNo'+(i+1)] = Number($('input.extraCitiesNo'+(i+1)).val());
            for(var j=0; j<=Number($('input.extraCitiesNo'+(i+1)).val()); j++){
                extraCityNo = j+1;
                if(!$('#asiatransit'+(i+1)+'-'+extraCityNo).prop('checked') && $('input[type="radio"][name="stayUnit'+(i+1)+'-'+extraCityNo+'"]:checked').length == 0){
                    alertUser('Please fill out the length of your stay in '+$('.country'+(i+1)+'-'+extraCityNo).val()+' - '+$('.city'+(i+1)+'-'+extraCityNo).val());
                    return false;
                }
                if($('.makeOwnArrangement'+(i+1)+'-'+extraCityNo).prop('checked')){
                    state.itinerary['extraCities'+(i+1)]['makeOwnArrangement'+extraCityNo] = 1;
                } else {
                    state.itinerary['extraCities'+(i+1)]['makeOwnArrangement'+extraCityNo] = 0;
                }
                if($('#asiatransit'+(i+1)+'-'+extraCityNo).prop('checked')){
                    state.itinerary['extraCities'+(i+1)]['asiatransit'+extraCityNo] = 1;
                } else {
                    state.itinerary['extraCities'+(i+1)]['asiatransit'+extraCityNo] = 0;
                }
                state.itinerary['extraCities'+(i+1)]['country'+extraCityNo] = $('.country'+(i+1)+'-'+extraCityNo).val();
                state.itinerary['extraCities'+(i+1)]['city'+extraCityNo] = $('.city'+(i+1)+'-'+extraCityNo).val();
                state.itinerary['extraCities'+(i+1)]['stayAmount'+extraCityNo] = $('.stayAmount'+(i+1)+'-'+extraCityNo).val();
                if($('input[name="stayUnit'+(i+1)+'-'+extraCityNo+'"][id^="days"]').prop('checked')){
                    state.itinerary['extraCities'+(i+1)]['stayUnit'+extraCityNo] = 'days';
                }
                if($('input[name="stayUnit'+(i+1)+'-'+extraCityNo+'"][id^="weeks"]').prop('checked')){
                    state.itinerary['extraCities'+(i+1)]['stayUnit'+extraCityNo] = 'weeks';
                }
                if($('input[name="stayUnit'+(i+1)+'-'+extraCityNo+'"][id^="months"]').prop('checked')){
                    state.itinerary['extraCities'+(i+1)]['stayUnit'+extraCityNo] = 'months';
                    if($('.stayAmount'+(i+1)+'-'+extraCityNo).val() > 12){
                        alertUser('You cannot stay for more than 12 months in '+$('.country'+(i+1)+'-'+extraCityNo).val()+' - '+$('.city'+(i+1)+'-'+extraCityNo).val());
                        return false;
                    }
                }
            }
        }
        loadStepScreen('preview');
        return true;
    } else if(currentScreen == 'preview'){
        state.preview.adultNo = $('#adultno > option:selected').html();
        state.preview.childrenNo = $('#childrenno > option:selected').html();
        state.preview.firstName = $('#firstname').val();
        state.preview.lastName = $('#lastname').val();
        state.preview.phone = $('#phone').val();
        state.preview.comments = $('#comments').val();
        state.preview.accountEmail = $('#accountemail').val();
        state.preview.accountPassword = $('#accountpassword').val();
        state.preview.accountConfirm = $('#accountconfirm').val();
        if($(event.target).parent().hasClass('prev')){
            loadStepScreen('itinerary');
            return true;
        }
        alertMessage = '';
        if(state.preview.phone == ''){
            alertMessage = alertMessage + 'Phone number must be filled in.<br>';
        }
        if(!(/\d{8,}/.test(state.preview.phone.replace(/\s+/g,'').replace(/[-]/g,'').replace(/[(]/g,'').replace(/[)]/g,'')))){
            alertMessage = alertMessage + 'Please enter a valid phone number.<br>';
        }
        if(!validateEmail(state.preview.accountEmail)){
            alertMessage = alertMessage + 'Please enter a valid email address for Your Account.<br>';
        }
        if(!(state.preview.accountPassword.length > 3)){
            alertMessage = alertMessage + 'Password must be longer than 3 characters.<br>';
        }
        if(state.preview.accountPassword != state.preview.accountConfirm){
            alertMessage = alertMessage + 'Password and Confirmation do not match.<br>';
        }
        if(alertMessage != ''){
            alertUser(alertMessage);
            return false;
        }
        $('div.prev-next > p.next > a').off();
        $('div.prev-next > p.next > a').click(function(e){
            e.preventDefault();
            return false;
        });
        $('div.prev-next > p.next > a').html('SUBMITTING...');
        $.ajax({
            method: "POST",
            url: "/"+bookingDirectory+"/processmytrip.php",
            data: { state: state }
        })
        .done(function( msg ) {
            if(msg.substr(msg.length-7,7) == 'success'){
                //fbq('track', 'Lead');
                /*ga('send', {
                    hitType: 'event',
                    eventCategory: 'RAT',
                    eventAction: 'plan-my-trip-submitted',
                    eventLabel: msg
                });*/
                window.location.assign('/inquiry-submitted/');
            } else {
                alertUser( msg );
                $('div.prev-next > p.next > a').off();
                $('div.prev-next > p.next > a').html('FINISH');
                $('div.prev-next > p.next > a').click(function(e){
                    if(process(e)){
                        return true;
                    } else {
                        return false;
                    }
                });
            }
        }).fail(function(){
            $('div.prev-next > p.next > a').off();
            $('div.prev-next > p.next > a').html('FINISH');
            $('div.prev-next > p.next > a').click(function(e){
                if(process(e)){
                    return true;
                } else {
                    return false;
                }
            });
        });
        return false;
    }
    return true;
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function dateValid(dateString){
    var dateIsValid = false;
    $.ajax({
        method: "POST",
        url: "/"+bookingDirectory+"/validatedate.php",
        data: { date: dateString },
        async: false
    })
    .done(function( msg ) {
        if(msg == 'success'){
            dateIsValid = true;
        }
    });
    return dateIsValid;
}

function alertUser(alertMsg){
    $('#dialog > p').html(alertMsg);
    $('#dialog').dialog({
        open: function( event, ui ) {
            $('[aria-describedby="dialog"] .ui-dialog-titlebar-close').removeAttr('title');
        },
    });
}

//window.onbeforeunload = function() {
    //return 'You have unsaved changes.';
//}

jQuery( document ).ready(function($) {
    if(($('input[class^="extraCitiesNo"]').val()) == 1){
        $( ".btn.be-minus" ).addClass( "myClass" );
    }else{
        $( ".btn.be-minus" ).removeClass( "myClass" );
    }
});
-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Paź 2014, 18:15
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cd`
--

CREATE TABLE IF NOT EXISTS `cd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=184 ;

--
-- Zrzut danych tabeli `cd`
--

INSERT INTO `cd` (`id`, `artist`, `title`) VALUES
(6, 'Hexes', 'TomAndAndy'),
(11, 'Blues Brothers', 'Rohide'),
(12, 'Status Quo', 'In The Army'),
(13, 'Blues Brothers', 'Sometimes it''s Hard to be a Women'),
(15, 'Various Manx', 'Księżycowa Piosenka'),
(30, 'Reanimation Squad', 'Resque Me!'),
(32, 'Request Test Menu', 'Test'),
(33, 'David Bowie', 'The Next Day (Deluxe Version)'),
(34, 'Bastille', 'Bad Blood'),
(35, 'Bruno Mars', 'Unorthodox Jukebox'),
(36, 'Emeli Sandé', 'Our Version of Events (Special Edition)'),
(37, 'Bon Jovi', 'What About Now (Deluxe Version)'),
(38, 'Justin Timberlake', 'The 20/20 Experience (Deluxe Version)'),
(39, 'Bastille', 'Bad Blood (The Extended Cut)'),
(40, 'P!nk', 'The Truth About Love'),
(41, 'Sound City - Real to Reel', 'Sound City - Real to Reel'),
(42, 'Jake Bugg', 'Jake Bugg'),
(43, 'Various Artists', 'The Trevor Nelson Collection'),
(44, 'David Bowie', 'The Next Day'),
(45, 'Mumford & Sons', 'Babel'),
(46, 'The Lumineers', 'The Lumineers'),
(47, 'Various Artists', 'Get Ur Freak On - R&B Anthems'),
(48, 'The 1975', 'Music For Cars EP'),
(49, 'Various Artists', 'Saturday Night Club Classics - Ministry of Sound'),
(50, 'Hurts', 'Exile (Deluxe)'),
(51, 'Various Artists', 'Mixmag - The Greatest Dance Tracks of All Time'),
(52, 'Ben Howard', 'Every Kingdom'),
(53, 'Stereophonics', 'Graffiti On the Train'),
(54, 'The Script', '#3'),
(55, 'Stornoway', 'Tales from Terra Firma'),
(56, 'David Bowie', 'Hunky Dory (Remastered)'),
(57, 'Worship Central', 'Let It Be Known (Live)'),
(58, 'Ellie Goulding', 'Halcyon'),
(59, 'Various Artists', 'Dermot O''Leary Presents the Saturday Sessions 2013'),
(60, 'Stereophonics', 'Graffiti On the Train (Deluxe Version)'),
(61, 'Dido', 'Girl Who Got Away (Deluxe)'),
(62, 'Hurts', 'Exile'),
(63, 'Bruno Mars', 'Doo-Wops & Hooligans'),
(64, 'Calvin Harris', '18 Months'),
(65, 'Olly Murs', 'Right Place Right Time'),
(66, 'Alt-J (?)', 'An Awesome Wave'),
(67, 'One Direction', 'Take Me Home'),
(68, 'Various Artists', 'Pop Stars'),
(69, 'Various Artists', 'Now That''s What I Call Music! 83'),
(70, 'John Grant', 'Pale Green Ghosts'),
(71, 'Paloma Faith', 'Fall to Grace'),
(72, 'Laura Mvula', 'Sing To the Moon (Deluxe)'),
(73, 'Duke Dumont', 'Need U (100%) [feat. A*M*E] - EP'),
(74, 'Watsky', 'Cardboard Castles'),
(75, 'Blondie', 'Blondie: Greatest Hits'),
(76, 'Foals', 'Holy Fire'),
(77, 'Maroon 5', 'Overexposed'),
(78, 'Bastille', 'Pompeii (Remixes) - EP'),
(79, 'Imagine Dragons', 'Hear Me - EP'),
(80, 'Various Artists', '100 Hits: 80s Classics'),
(81, 'Various Artists', 'Les Misérables (Highlights From the Motion Picture Soundtrack)'),
(82, 'Mumford & Sons', 'Sigh No More'),
(83, 'Frank Ocean', 'Channel ORANGE'),
(84, 'Bon Jovi', 'What About Now'),
(85, 'Various Artists', 'BRIT Awards 2013'),
(86, 'Taylor Swift', 'Red'),
(87, 'Fleetwood Mac', 'Fleetwood Mac: Greatest Hits'),
(88, 'David Guetta', 'Nothing But the Beat Ultimate'),
(89, 'Various Artists', 'Clubbers Guide 2013 (Mixed By Danny Howard) - Ministry of Sound'),
(90, 'David Bowie', 'Best of Bowie'),
(91, 'Laura Mvula', 'Sing To the Moon'),
(92, 'ADELE', '21'),
(93, 'Of Monsters and Men', 'My Head Is an Animal'),
(94, 'Rihanna', 'Unapologetic'),
(95, 'Various Artists', 'BBC Radio 1''s Live Lounge - 2012'),
(96, 'Avicii & Nicky Romero', 'I Could Be the One (Avicii vs. Nicky Romero)'),
(97, 'The Streets', 'A Grand Don''t Come for Free'),
(98, 'Tim McGraw', 'Two Lanes of Freedom'),
(99, 'Foo Fighters', 'Foo Fighters: Greatest Hits'),
(100, 'Various Artists', 'Now That''s What I Call Running!'),
(101, 'Swedish House Mafia', 'Until Now'),
(102, 'The xx', 'Coexist'),
(103, 'Five', 'Five: Greatest Hits'),
(104, 'Jimi Hendrix', 'People, Hell & Angels'),
(105, 'Biffy Clyro', 'Opposites (Deluxe)'),
(106, 'The Smiths', 'The Sound of the Smiths'),
(107, 'The Saturdays', 'What About Us - EP'),
(108, 'Fleetwood Mac', 'Rumours'),
(109, 'Various Artists', 'The Big Reunion'),
(110, 'Various Artists', 'Anthems 90s - Ministry of Sound'),
(111, 'The Vaccines', 'Come of Age'),
(112, 'Nicole Scherzinger', 'Boomerang (Remixes) - EP'),
(113, 'Bob Marley', 'Legend (Bonus Track Version)'),
(114, 'Josh Groban', 'All That Echoes'),
(115, 'Blue', 'Best of Blue'),
(116, 'Ed Sheeran', '+'),
(117, 'Olly Murs', 'In Case You Didn''t Know (Deluxe Edition)'),
(118, 'Macklemore & Ryan Lewis', 'The Heist (Deluxe Edition)'),
(119, 'Various Artists', 'Defected Presents Most Rated Miami 2013'),
(120, 'Gorgon City', 'Real EP'),
(121, 'Mumford & Sons', 'Babel (Deluxe Version)'),
(122, 'Various Artists', 'The Music of Nashville: Season 1, Vol. 1 (Original Soundtrack)'),
(123, 'Various Artists', 'The Twilight Saga: Breaking Dawn, Pt. 2 (Original Motion Picture Soundtrack)'),
(124, 'Various Artists', 'Mum - The Ultimate Mothers Day Collection'),
(125, 'One Direction', 'Up All Night'),
(126, 'Bon Jovi', 'Bon Jovi Greatest Hits'),
(127, 'Agnetha Fältskog', 'A'),
(128, 'Fun.', 'Some Nights'),
(129, 'Justin Bieber', 'Believe Acoustic'),
(130, 'Atoms for Peace', 'Amok'),
(131, 'Justin Timberlake', 'Justified'),
(132, 'Passenger', 'All the Little Lights'),
(133, 'Kodaline', 'The High Hopes EP'),
(134, 'Lana Del Rey', 'Born to Die'),
(135, 'JAY Z & Kanye West', 'Watch the Throne (Deluxe Version)'),
(136, 'Biffy Clyro', 'Opposites'),
(137, 'Various Artists', 'Return of the 90s'),
(138, 'Gabrielle Aplin', 'Please Don''t Say You Love Me - EP'),
(139, 'Various Artists', '100 Hits - Driving Rock'),
(140, 'Jimi Hendrix', 'Experience Hendrix - The Best of Jimi Hendrix'),
(141, 'Various Artists', 'The Workout Mix 2013'),
(142, 'The 1975', 'Sex'),
(143, 'Chase Status', 'No More Idols'),
(144, 'Rihanna', 'Unapologetic (Deluxe Version)'),
(145, 'The Killers', 'Battle Born'),
(146, 'Olly Murs', 'Right Place Right Time (Deluxe Edition)'),
(147, 'A$AP Rocky', 'LONG.LIVE.A$AP (Deluxe Version)'),
(148, 'Various Artists', 'Cooking Songs'),
(149, 'Haim', 'Forever - EP'),
(150, 'Lianne La Havas', 'Is Your Love Big Enough?'),
(151, 'Michael Bublé', 'To Be Loved'),
(152, 'Daughter', 'If You Leave'),
(153, 'The xx', 'xx'),
(154, 'Eminem', 'Curtain Call'),
(155, 'Kendrick Lamar', 'good kid, m.A.A.d city (Deluxe)'),
(156, 'Disclosure', 'The Face - EP'),
(157, 'Palma Violets', '180'),
(158, 'Cody Simpson', 'Paradise'),
(159, 'Ed Sheeran', '+ (Deluxe Version)'),
(160, 'Michael Bublé', 'Crazy Love (Hollywood Edition)'),
(161, 'Bon Jovi', 'Bon Jovi Greatest Hits - The Ultimate Collection'),
(162, 'Rita Ora', 'Ora'),
(163, 'g33k', 'Spabby'),
(164, 'Various Artists', 'Annie Mac Presents 2012'),
(165, 'David Bowie', 'The Platinum Collection'),
(166, 'Bridgit Mendler', 'Ready or Not (Remixes) - EP'),
(167, 'Dido', 'Girl Who Got Away'),
(168, 'Various Artists', 'Now That''s What I Call Disney'),
(169, 'The 1975', 'Facedown - EP'),
(170, 'Kodaline', 'The Kodaline - EP'),
(171, 'Various Artists', '100 Hits: Super 70s'),
(172, 'Fred V & Grafix', 'Goggles - EP'),
(173, 'Biffy Clyro', 'Only Revolutions (Deluxe Version)'),
(174, 'Train', 'California 37'),
(175, 'Ben Howard', 'Every Kingdom (Deluxe Edition)'),
(176, 'Various Artists', 'Motown Anthems'),
(177, 'Courteeners', 'ANNA'),
(178, 'Johnny Marr', 'The Messenger'),
(179, 'Rodriguez', 'Searching for Sugar Man'),
(180, 'Jessie Ware', 'Devotion'),
(181, 'Bruno Mars', 'Unorthodox Jukebox'),
(182, 'Various Artists', 'Call the Midwife (Music From the TV Series)'),
(183, 'Clanad', 'The last of The Mohicans');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gady`
--

CREATE TABLE IF NOT EXISTS `gady` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `img` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `gady`
--

INSERT INTO `gady` (`id`, `name`, `img`, `quantity`, `opis`) VALUES
(1, 'Trimorphodon', 'trimorfodon.jpg', 34500, 'Trimorphodon – rodzaj gadów z podrzędu węży, rodziny zdradnicowatych, który występuje na terenie Ameryki Północnej oraz Ameryki Środkowej.'),
(2, 'Żabuti Leśny', 'zabuti.jpg', 5600, 'Żabuti leśny, żółw brazylijski (Geochelone denticulata) – gatunek gada z podrzędu żółwi skrytoszyjnych z rodziny żółwi lądowych.'),
(3, 'Mamba Czarna', 'mamba.jpg', 1000, 'Mamba czarna (Dendroaspis polylepis) – gatunek jadowitego węża z rodziny zdradnicowatych zamieszkujący Sahel, środkową i południową Afrykę. Na północy zasięg jej występowania sięga po Dakar.\r\nZanotowano przypadki zabicia przez mambę dużych zwierząt afrykańskich, przez których skórę mogą się przebić stosunkowo krótkie zęby jadowe – np. żyraf, atakowanych zarówno z ziemi, jak i z gałęzi drzew. Zdarzają się też przypadki zabijania pasącego się lub pędzonego bydła. Jad mamby jest przedmiotem badań biologów, ze względu na możliwe zastosowania medyczne.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `humans`
--

CREATE TABLE IF NOT EXISTS `humans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `level` int(4) NOT NULL DEFAULT '2',
  `registration_date` datetime NOT NULL,
  `ip` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `humans`
--

INSERT INTO `humans` (`id`, `login`, `password`, `email`, `level`, `registration_date`, `ip`) VALUES
(1, 'admin', 'KoPziKryrGfH2', 'admin@admin.pl', 0, '2014-10-18 00:31:47', '::1'),
(2, 'Kornelia', 'KonvyO0JESGUo', 'corny@online.de', 2, '2014-10-18 00:42:41', '::1'),
(3, 'Klaudia', 'KoUUjaJhETlqc', 'klaudia_suska@wp.pl', 2, '2014-10-18 00:43:53', '::1'),
(4, 'neferek', 'KojyV59q9eo7.', 'husky@miska.dom', 2, '2014-10-18 00:45:05', '::1'),
(5, 'rnestk', 'KoPziKryrGfH2', 'kredyty_suwalki@wp.pl', 2, '2014-10-18 00:46:14', '::1'),
(6, 'julia291204', 'Ko1wgN/zQVUe.', 'julia@interia.pl', 2, '2014-10-18 21:07:05', '::1'),
(7, 'Kleopatra', 'KoLdFRzLuoqO.', 'kleo@egipt.eg', 2, '2014-10-19 14:31:22', '::1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ptaki`
--

CREATE TABLE IF NOT EXISTS `ptaki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `img` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `ptaki`
--

INSERT INTO `ptaki` (`id`, `name`, `img`, `quantity`, `opis`) VALUES
(1, 'Bocian', 'bocian.jpg', 11000, 'Występowanie: Gatunek Ciconia ciconia ciconia - Europa Środkowa, północno-zachodnia Afryka, Azja Mniejsza. Zimuje w Afryce Równikowej i Wschodniej, a także w Indiach.\r\nGatunek Ciconia ciconia asiatica - Azja Środkowa. Zimuje w Indiach i Iranie.\r\nCechy charakterystyczne: Ubarwienie upierzenia białe, końce skrzydeł i ogona czarne. Nogi długie i czerwone, dziób długi i czerwony, ostro zakończony. W locie postawa wyprostowana, wykorzystuje ciepłe prądy oraz powierzchnię skrzydeł, porusza się głównie lotem szybowcowym. \r\n'),
(2, 'Dzięcioł', 'dzieciol.jpg', 1800, 'Występowanie: Lasy na całym świecie, poza Nową Gwineą, Australią, Madagaskarem.\r\nCechy charakterystyczne: Ubarwienie różnokolorowe, spód biały, \r\ngrzbiet biało czarny, końce piór czarne, głowa stosunkowo średnich rozmiarów, \r\ndziób prosty, bardzo mocny. Posiada sterówki ostro zakończone, pomocne przy opieraniu o drzewo. \r\nPazury są ostre, umożliwiają dobre mocowanie na korze drzew. '),
(3, 'Jaskółka', 'jaskolka.jpg', 2400, 'Występowanie: Zamieszkuje cały świat poza najwyższymi szerokościami geograficznymi\r\n \r\nCechy charakterystyczne: jest to rodzina ptaków z rzędu wróblowych, dziób krótki, paszcza szeroka, długie i ostro zakończone skrzydło, zdolne są do chodzenia po ziemi, nie występuje dymorfizm płciowy, ich wysokość lotu zależy od wilgotności powietrza\r\nOdżywianie: chwytają owady w locie\r\nTryb życia: gatunki północne wędrowne, południowo osiadły.\r\nLęgi: gniazda na skałach, budynkach lub w norach, w skład materiału na gniazdo zawsze wchodzi ślina ptaka, zwykle jeden do dwóch lęgów w roku, w zniesieniu 4 do 6 jaj');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ssaki`
--

CREATE TABLE IF NOT EXISTS `ssaki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `img` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `ssaki`
--

INSERT INTO `ssaki` (`id`, `name`, `img`, `quantity`, `opis`) VALUES
(3, 'Niedźwiedź brunatny', 'niedzwiedz.jpg', 650, 'Ubarwienie niedźwiedzi zależy od miejsc występowania - od czarnego, poprzez rudawy do jasnobrązowego. \r\n    Cechą charakterystyczną w budowie ciała jest wałek tłuszczowy umiejscowiony na karku. K\r\n    ończyny niedźwiedzia zakończone są długimi, ostrymi, zaokrąglonymi pazurami.\r\nTryb życia: Niedźwiedź brunatny preferuje samotny tryb życia, \r\nwędruje w pojedynkę w okresie od wiosny do jesieni, \r\na następnie zapadają w zimowy sen w norach wykapanych przez siebie w ziemi lub w jaskiniach, \r\nw czasie którego spalają zgromadzony tłuszcz. W tym okresie wszystkie procesy życiowe zostają \r\nspowolnione wraz ze spadkiem temperatury ciała do 4 st.c. Niedźwiedź brunatny żyje średnio do 35 lat'),
(4, 'Lis', 'lis.jpg', 14000, 'Odżywianie: Małe ssaki, ptaki, ptactwo domowe, padlina, bezkręgowce, rośliny leśne, orzechy.\r\nTryb życia: Zwierzęta stadne, trzymają się hierarchii w stadzie. Dominuje samica, a także samiec, \r\nposiadają kilka podrzędnych samic, należących do młodszych pokoleń. Podporządkowane samice pomagają \r\nnajstarszej w opiece nad najmłodszymi osobnikami. Lisy podchodzą pod siedliska ludzi w celu poszukiwania \r\npożywienia wśród odpadów lub ptactwa domowego.\r\nRozmnażanie: Ciążą trwa przez okres ok. 50-55 dni. W jednym miocie na świat przychodzi 1-10 szczeniąt.\r\nZagrożenia: Lisy mogą być niebezpieczne z powodu możliwości roznoszenia wścieklizny,\r\nktórą mogą zarażać inne zwierzęta oraz ludzi. '),
(5, 'Świstak', 'swistak.jpg', 8500, 'Ubarwienie żółto-brązowe do czerwono-szarego, Głowa na górze zawsze czarna. \r\n    Kończyny i podbródek żółtawe. Głowa niewielka, zwężająca się ku nosowi, kończyny masywne,\r\n    na dole cienkie, zakończone palcami.\r\nTryb życia: Świstaki są zwierzętami stadnymi. Mają dobrze wykształcone systemy ostrzegania \r\nsię przed niebezpieczeństwem. Kiedy stado żeruje, jeden z osobników stoi na czatach i w razie \r\nzagrożenia alarmuje świstem resztę stada, które natychmiast chowa się do swoich kryjówek. \r\nZerowanie odbywa się tylko za dnia i przy dobrej pogodzie, najbardziej intensywne jest w okresie \r\njesiennym, kiedy to gromadzone są zapasy tłuszczu na zimę. Przesypiają okres jesienno zimowy, \r\ntrwający od września do kwietnia, w specjalnie przygotowanych norach, zabezpieczonych przed wejściem intruzów.\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

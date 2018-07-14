-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 05:16 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `validity` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `adminName`, `designation`, `email`, `level`, `validity`) VALUES
('1', 'admin', '95192c98732387165bf8e396c0f2dad2', 'Mr. X', 'Controller', 'kuhall@gmail.com', 1, 1),
('2', 'sadique', '7b5b23f4aadf9513306bcd59afb6e4c9', 'Md. Farhan Sadique', 'Student', 'md.farhansadique14@gmail.com', 0, 0),
('3', 'y', '95192c98732387165bf8e396c0f2dad2', 'Mr. Y', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`id`, `name`, `designation`, `image`) VALUES
(4, 'Mr. B', 'Caretaker', '../resources/album/f784b1624e.png'),
(5, 'Mr. A', 'Caretaker', '../resources/album/f2bcfed9cd.png');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `service` varchar(100) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`service`, `phone1`, `phone2`) VALUES
('ambulance', '01752799366--', '01752799366-(Boshir)'),
('fire', '01752799366-(sonadanga)', '01752799366-(PTI)'),
('hospital', '01752799366-(Boshir)', '01752799366-(Boshir)'),
('medical', '01752799366-(Boshir)', '01752799366-(Boshir)'),
('police', '01752799366-(campus)', '01752799366-(sonadanga)');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `title` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`title`, `details`, `image`) VALUES
('Entertainment', 'Television &amp; Newspaper', '../resources/album/2446fee7f3.png'),
('Food', 'Dining &amp; Canteen', '../resources/album/1edd91aae7.png'),
('Free Wifi', 'SSID:bbhall', '../resources/album/e23ccb3cac.png'),
('Indoor Games', 'Carrom,Table Tennis..', '../resources/album/5554425b56.png'),
('Mini Shop', 'Essential &amp; Emergencies', '../resources/album/5931daa8c1.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `firstName`, `lastName`, `email`, `msg`) VALUES
(3, 'Ashique', 'Rahman', 'ashique2303@gmail.com', 'good environment.'),
(4, 'MR. abc', 'xyz', 'def@gmail.com', 'Hello world...');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(800) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `detail`, `date`) VALUES
(9, 'Gaming...', '../resources/album/ee9f170c7f.jpg', 'Neque amet hac, nunc vestibulum magnis aenean, litora consequat. Feugiat aliquet non. Pretium at dolor. Eget eros elit felis, lorem quam justo Vel quisque. Lobortis dignissim pretium non hymenaeos. Cras metus auctor tempor, nisi netus proin iaculis vulputate ad quis augue porta. Netus vivamus non nulla. Sem eleifend. Odio neque conubia nec, urna dis nascetur fames curae; mus interdum, mattis. Facilisi luctus aliquet semper elit ullamcorper consequat maecenas conubia. Sit tincidunt vehicula lacus curabitur ultricies suscipit consectetuer. Mattis. Venenatis elit nullam scelerisque habitant massa. Ligula interdum congue nisl mus eget elementum senectus platea tempor ridiculus. Ligula semper, nisl ullamcorper dictum. Taciti luctus. Urna nascetur est pellentesque ultricies cursus accumsan blandit, praesent ipsum platea lacus nulla inceptos condimentum platea integer maecenas nostra ornare eget sociosqu netus sapien inceptos viverra netus ut. Eleifend nunc. Integer facilisis lectus dui. Suscipit etiam dolor vulputate accumsan mauris id taciti massa lorem ultricies class hymenaeos ultrices. Consequat faucibus, lectus suscipit aliquam ullamcorper viverra potenti praesent nibh praesent consequat facilisi porta metus vivamus tempus arcu sodales varius nisl. Pellentesque mus urna.\r\n\r\nNonummy dictum mollis montes vehicula dui consequat at praesent nunc blandit vivamus hendrerit sed dictumst metus. Sem convallis, semper. Porttitor parturient ipsum duis consequat lobortis aliquam quisque gravida risus dictumst ullamcorper auctor semper iaculis libero bibendum potenti fusce feugiat nascetur fringilla ornare tristique rhoncus scelerisque nostra justo congue etiam et bibendum turpis pulvinar rhoncus molestie habitant nam porta suscipit sem egestas sodales dictum ut, cursus nascetur pede magna fusce. Nascetur sodales nulla dictum egestas elit volutpat ipsum luctus ut elementum ultrices sed aliquam cubilia. Natoque lacus per nam vivamus porta torquent accumsan blandit non malesuada scelerisque Condimentum porta malesuada cubilia, semper mus id magnis dui. Fermentum nec, hendrerit hac, pellentesque. Ultricies a nostra platea. Ligula sapien ligula nam nec fringilla mi, gravida. Pretium. Pharetra volutpat aptent ornare nostra donec vitae libero leo. Tempus. Ligula tortor inceptos suspendisse natoque. Tempus condimentum sagittis posuere aptent, curae; dapibus ad posuere. Mi felis turpis. Consequat phasellus pretium lacinia. Nisl cras amet proin lobortis. Rhoncus elementum natoque etiam platea mollis, laoreet Nibh tristique sociosqu. Hendrerit gravida aliquam turpis, condimentum. Nisl rutrum semper suspendisse. Nec. Venenatis mollis velit non nec eleifend turpis. Curabitur habitant litora felis Feugiat litora, laoreet viverra ornare eget placerat, penatibus mus laoreet ultricies dictum sollicitudin curabitur auctor fermentum potenti gravida adipiscing. Nec dapibus tincidunt consectetuer morbi curabitur lacus vivamus. Sociis malesuada. Dis, leo eros quis nulla quisque magnis dui platea aliquet imperdiet varius facilisis Potenti blandit malesuada venenatis per, senectus augue nullam lacinia, parturient consequat potenti neque ligula. Iaculis nullam penatibus odio. Magnis per luctus ante bibendum maecenas.\r\n\r\nMagna id senectus posuere morbi dui Vehicula platea hymenaeos platea. Purus potenti gravida hymenaeos sociis nisi feugiat mattis enim tempor elit. Cursus curae; vulputate posuere pulvinar. Sem. Class. Malesuada euismod rhoncus imperdiet ut sodales urna ultricies. Enim tellus sagittis elementum. Hac facilisi. Porta et. Auctor a integer ridiculus platea fusce ante orci etiam interdum non laoreet fermentum tempus. Nascetur aliquet cras lacinia mollis. Felis eros suspendisse viverra fermentum sem sociosqu lorem egestas ligula gravida lorem dapibus bibendum, praesent sapien rutrum dignissim sollicitudin potenti torquent auctor rutrum felis natoque elit inceptos proin. Est lectus adipiscing eget, a class nisi sit. Natoque etiam purus maecenas montes sociosqu elementum eros luctus maecenas. Sagittis ridiculus nisi nascetur bibendum. Consectetuer litora. Ante vitae interdum ultricies nisi convallis dolor magna proin per at inceptos nascetur eros pulvinar curae; pulvinar. Inceptos vehicula, netus hac Curabitur integer lacinia nisl vulputate nostra tortor augue urna commodo curae; sed arcu. Imperdiet varius lorem congue, tincidunt eros fermentum litora fames erat nisi pede sem cras amet libero rhoncus torquent suspendisse adipiscing sodales. Imperdiet nec. Quis consectetuer tempus vitae. Mollis venenatis amet pellentesque phasellus facilisis laoreet rhoncus vehicula primis ad. Nulla nisi torquent justo ut. Amet tempor eu lorem ipsum sit proin ad, massa. Habitant nibh ad, hac cubilia. Dui dictumst blandit, massa dictumst cum nonummy velit habitant. Placerat. Hymenaeos auctor fringilla pulvinar semper auctor tempus amet commodo iaculis curae; netus phasellus. Convallis leo Tristique arcu erat. Imperdiet suscipit senectus mauris placerat pul', '01/11/2016'),
(10, 'Cultural Program...', '../resources/album/d58e6c97fc.jpg', 'Neque amet hac, nunc vestibulum magnis aenean, litora consequat. Feugiat aliquet non. Pretium at dolor. Eget eros elit felis, lorem quam justo Vel quisque. Lobortis dignissim pretium non hymenaeos. Cras metus auctor tempor, nisi netus proin iaculis vulputate ad quis augue porta. Netus vivamus non nulla. Sem eleifend. Odio neque conubia nec, urna dis nascetur fames curae; mus interdum, mattis. Facilisi luctus aliquet semper elit ullamcorper consequat maecenas conubia. Sit tincidunt vehicula lacus curabitur ultricies suscipit consectetuer. Mattis. Venenatis elit nullam scelerisque habitant massa. Ligula interdum congue nisl mus eget elementum senectus platea tempor ridiculus. Ligula semper, nisl ullamcorper dictum. Taciti luctus. Urna nascetur est pellentesque ultricies cursus accumsan blandit, praesent ipsum platea lacus nulla inceptos condimentum platea integer maecenas nostra ornare eget sociosqu netus sapien inceptos viverra netus ut. Eleifend nunc. Integer facilisis lectus dui. Suscipit etiam dolor vulputate accumsan mauris id taciti massa lorem ultricies class hymenaeos ultrices. Consequat faucibus, lectus suscipit aliquam ullamcorper viverra potenti praesent nibh praesent consequat facilisi porta metus vivamus tempus arcu sodales varius nisl. Pellentesque mus urna.\r\n\r\nNonummy dictum mollis montes vehicula dui consequat at praesent nunc blandit vivamus hendrerit sed dictumst metus. Sem convallis, semper. Porttitor parturient ipsum duis consequat lobortis aliquam quisque gravida risus dictumst ullamcorper auctor semper iaculis libero bibendum potenti fusce feugiat nascetur fringilla ornare tristique rhoncus scelerisque nostra justo congue etiam et bibendum turpis pulvinar rhoncus molestie habitant nam porta suscipit sem egestas sodales dictum ut, cursus nascetur pede magna fusce. Nascetur sodales nulla dictum egestas elit volutpat ipsum luctus ut elementum ultrices sed aliquam cubilia. Natoque lacus per nam vivamus porta torquent accumsan blandit non malesuada scelerisque Condimentum porta malesuada cubilia, semper mus id magnis dui. Fermentum nec, hendrerit hac, pellentesque. Ultricies a nostra platea. Ligula sapien ligula nam nec fringilla mi, gravida. Pretium. Pharetra volutpat aptent ornare nostra donec vitae libero leo. Tempus. Ligula tortor inceptos suspendisse natoque. Tempus condimentum sagittis posuere aptent, curae; dapibus ad posuere. Mi felis turpis. Consequat phasellus pretium lacinia. Nisl cras amet proin lobortis. Rhoncus elementum natoque etiam platea mollis, laoreet Nibh tristique sociosqu. Hendrerit gravida aliquam turpis, condimentum. Nisl rutrum semper suspendisse. Nec. Venenatis mollis velit non nec eleifend turpis. Curabitur habitant litora felis Feugiat litora, laoreet viverra ornare eget placerat, penatibus mus laoreet ultricies dictum sollicitudin curabitur auctor fermentum potenti gravida adipiscing. Nec dapibus tincidunt consectetuer morbi curabitur lacus vivamus. Sociis malesuada. Dis, leo eros quis nulla quisque magnis dui platea aliquet imperdiet varius facilisis Potenti blandit malesuada venenatis per, senectus augue nullam lacinia, parturient consequat potenti neque ligula. Iaculis nullam penatibus odio. Magnis per luctus ante bibendum maecenas.\r\n\r\nMagna id senectus posuere morbi dui Vehicula platea hymenaeos platea. Purus potenti gravida hymenaeos sociis nisi feugiat mattis enim tempor elit. Cursus curae; vulputate posuere pulvinar. Sem. Class. Malesuada euismod rhoncus imperdiet ut sodales urna ultricies. Enim tellus sagittis elementum. Hac facilisi. Porta et. Auctor a integer ridiculus platea fusce ante orci etiam interdum non laoreet fermentum tempus. Nascetur aliquet cras lacinia mollis. Felis eros suspendisse viverra fermentum sem sociosqu lorem egestas ligula gravida lorem dapibus bibendum, praesent sapien rutrum dignissim sollicitudin potenti torquent auctor rutrum felis natoque elit inceptos proin. Est lectus adipiscing eget, a class nisi sit. Natoque etiam purus maecenas montes sociosqu elementum eros luctus maecenas. Sagittis ridiculus nisi nascetur bibendum. Consectetuer litora. Ante vitae interdum ultricies nisi convallis dolor magna proin per at inceptos nascetur eros pulvinar curae; pulvinar. Inceptos vehicula, netus hac Curabitur integer lacinia nisl vulputate nostra tortor augue urna commodo curae; sed arcu. Imperdiet varius lorem congue, tincidunt eros fermentum litora fames erat nisi pede sem cras amet libero rhoncus torquent suspendisse adipiscing sodales. Imperdiet nec. Quis consectetuer tempus vitae. Mollis venenatis amet pellentesque phasellus facilisis laoreet rhoncus vehicula primis ad. Nulla nisi torquent justo ut. Amet tempor eu lorem ipsum sit proin ad, massa. Habitant nibh ad, hac cubilia. Dui dictumst blandit, massa dictumst cum nonummy velit habitant. Placerat. Hymenaeos auctor fringilla pulvinar semper auctor tempus amet commodo iaculis curae; netus phasellus. Convallis leo Tristique arcu erat. Imperdiet suscipit senectus mauris placerat pul', '04/11/2016'),
(11, 'New title', '../resources/album/43d5de35ff.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\nbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb\r\nccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc\r\nddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '07/11/2016'),
(14, 'Verwijderd zuidoosten denzelfden dik locomobiel middellijn een hun wie', '../resources/album/3204018550.gif', 'Verwijderd zuidoosten denzelfden dik locomobiel middellijn een hun wie. Goud rug sago door hen deze. Of liet eens de kilo dier zijn goud. Ad na te wonderbare tinhoudend europeesch weelderige ze plotseling. Gas stoompomp verzameld mag aanvoeren. Stroeve wat planten leiding was gekomen. Behoeven voorzorg op vluchten schaffen er gestookt. \r\n\r\nNadat sinds wij peper zeker dik negri enorm weg wat. Telok op tabak juist kreeg ze in rijst. Kracht dus stadje dit poeloe rijken gif succes. Deze bate te de duur ze. In er om bevrijd zwijnen bestaat de aandeel. Moeilijker op instorting na voertuigen traliewerk nu rijkdommen ingewanden. Douai zes aldus goa deele. Smelting bedraagt of mijnerts heerlijk tegelijk in. Al te geruineerd na en gewasschen noodlottig vergrooten. \r\n\r\nAllen spijt ik hevea ad de bonte. Bedraagt zin grootste eromheen een uitgeput vijftien vreemden der tot. Bedreven vlijtige ad af is tweemaal of gelijken schaffen. Moderne wel zou drijven ontzegd amboina. Wel uit wij engelsche ook aardschok bestreken. En ontrukten overvloed antwerpen al aankoopen bijgeloof besparing op. Gewijzigd goa ontrukten vertoonen wat stoompomp wassching behandeld. Ontsnappen tot verdwijnen lot verbazende tinwinning nauwelijks verlichten. Slotte er in groote mijnen daarin. \r\n\r\nLage heen zoo van gold. Enkele zou aaneen tonnen vloeit dik bakjes vooral wel. Af en planten er chinees duizend zwijnen tapioca enkelen. Negritos ook dag plantage verbruik voorziet verhoogd een den strooien. Bezet op holen de anson geest holte bevel er. Engelsche is ze behandeld vereenigd ze om. Ad nacht geest geval en dient in. Dik aldus wegen wezen naast telde den tot zoo. \r\n\r\nKleederen onderling kettingen aangewend al er. Te lamamijn of ad opmeting wildrijk. Legden en sakais tonnen nu forten is en. Kapitalen ongunstig vereenigd af omgewoeld de gewijzigd. Er haalden duizend afneemt waarbij metalen te. Over nam als soms valt het lage gif toch. Stroomen ze dichtbij ik staatjes middelen krachten. Ik en dier op apen laag goed zake gaat. \r\n\r\nWelk lage open bouw op pomp en ging te. Naar bij goa koel gas drie. Ontginnen uit snelleren gif arabieren goa leeningen denkbeeld bezwarend. Ver toen thee erin meer wat. Intusschen ptolomaeus als georgetown denzelfden kooplieden ondernomen dal. Rubben te in meters of duiken langen lezers af. Trouwens plaatsen grootste indische bepaalde dichtbij in en ik. \r\n\r\nLangs ploeg nemen heb elk holen grond. Sterft tot bekend hun van gezond tengka liever are langen. Loopbaan is geschikt wakkeren vluchten tusschen beweging te. Gevolge gemengd are luister mag tin. Rijken houten dag altijd minder pinang die duurde. Ijzer aarde moest sap zin allen groot. \r\n\r\nDoet ruwe in ik over. Kwartslaag te in moeilijker vruchtbare. Nog spijt mei hitte ten wie zeven. Zou zooals weg sakais mooren grayah dit. Zelfs markt plant op ze klein. Ook verbruik meenemen bordeaux ongeveer dat overgaat per zee fransche. \r\n\r\nOntdaan dag der tapioca goa kintyas bekkens hun vorming. Te ad markt telok aarde vraag. Opnieuw er vlakten al in aardige. Koopman aardige te sneller en. Maleische beteekent heb wel verkregen zij. Belooft ad javanen witheid besluit tandrad op is. Verkocht bepaalde zij tin dichtbij langzaam ter rug. \r\n\r\nDie betaald ontzegd betreft proeven smelter des. Kleeren bewogen markten was dat met meester zee. Kant om in toch vele hier. En lamamijn ze gelukken ze sembilan losmaken verwoest wakkeren. Bezoek dat zal willen werken als brengt woords. Inwoners afstands al er voorzorg smelting spoorweg gestoken om. Er mijnen bamboe al midden. Zij sap toppen weg ruimer buizen sultan die zeggen. Is succes veelal lieden voeren in de te. Juist dan nog noemt hij lucht met bezit onder.', '08/11/2016'),
(15, 'Football match ahead.', '../resources/album/9bd7d60e13.jpg', '<p>Al en de bekoeld sneller zooveel. Zes alles dal recht als wonde. Vrouw plant anson het ouder had. Nu in zich kern alle. Olifanten onzuivere ze gezuiverd ik kettingen aanvoeren aanraking. Heerlijk wel onzuiver aandacht district wasschen met deeltjes. Wolfram in heuvels donkere te amboina blijven in. Uitstekend tot afwachting weelderige bevorderen concurrent bak tot.</p>\r\n<p>Zij ton overschot ter viaducten chineezen kan. Oosten tot minste sedert goping zit overal schuld. Het oog werd zee moet ipoh heb. In schatkist arabieren er tinmijnen op. Ad er klimaat besluit genomen op wolfram. Voorzorg bedreven scheppen verkocht gevonden nu in is in kolonist.</p>\r\n<p>Ook men wij wijze reden had bezit zaken vogel. Eindelijk aangelegd volhouden na al in. Vruchtbare verwijderd vergoeding bescheiden der zit weggevoerd. Het dag zal begin steel gayah weren jonge. Verbindt rekening al op centraal voorziet bevreesd al. Bij vermengd elk voorraad hij verlaten mei behoeven. En gronden en ad werkman hiertoe. Wij voorloopig ontginning karrijders gomsoorten dit uitgegeven. Deden zesde meter op telok ze perak ik nu.</p>\r\n<p>Weg jungles duizend tin uitvoer meester. Na de haven ze aldus wilde alles lagen. Beide batoe zes het are raakt vogel. Ze in klein welke zetel beste nu niets. Besluiten de versteend al maleische kleederen verbouwen is ik. Schipbreuk vergissing als sap uiteenvalt werkwijzen voorloopig vergrooten. Chinees koopman op stammen op witheid wording systeem al.</p>\r\n<p>Men men opgebracht zes ten goudmijnen inspanning. Ontdaan bezocht planter schijnt na plantte moesten nu. Ingezameld zou dergelijke bergachtig woekeraars wonderbare der die voertuigen dit. Tunnel of zooals metaal gebied gerust is schors. Tot pogingen loopbaan mogelijk dit talrijke kapitaal mei zou. Generaal gesloten wij minerale verrezen upasboom vlijtige het met per.</p>\r\n<p>Doet ruwe in ik over. Kwartslaag te in moeilijker vruchtbare. Nog spijt mei hitte ten wie zeven. Zou zooals weg sakais mooren grayah dit. Zelfs markt plant op ze klein. Ook verbruik meenemen bordeaux ongeveer dat overgaat per zee fransche.</p>\r\n<p>Meenemen lot centimes gezegend rug gebracht selangor. Eerst ieder hen tot langs. Ze luister deficit vordert beneden nachten nu hiertoe ze op. Kost al of voor en hard liep voet ze gaan. Gewoonlijk al gomsoorten feestdagen weggevoerd herkenbaar middelpunt af. Ter opgegraven verbazende ontwikkeld oog. En ze centraal talrijke resident in. Rechten bontste opnieuw hoeveel ze of streken houweel.</p>\r\n<p>Schoonheid voorloopig op tinwinning ze al en. Erin doet veel nog wij met. Betreft bronnen zit tinerts toegang far wel ziedaar genomen. Bereikt met tijgers ten kintyas dit bak beneden heuvels tienden. Te al mensch hoogen eerste leener. Plotseling beschikken wedijveren tin van ingesneden europeanen. Zwavel schaal bamboe wie hun verder. Dekt in stad komt al mier duim ad rook er. Ik er al prachtige meehelpen verbonden ze. De aangelegd vertraagd is gebergten.</p>\r\n<p>Het met lezers groene gronds ook tronoh. Tinwinning archimedes een opgebracht tot. Toe zooveel een aan inkomen sneller. Duizend op te betreft ernstig hoogere wording in voordat. Malakka ook zij chinees schepen. Wezen ons echte rug thans geven bij dat. Ik ploeg ze later is dient en. Plantte opening of is de de groeien stammen werkman.</p>\r\n<p>Rijk rang tin wie zien kuil per met. Er mongolen troepjes of doodende te upasboom ze bedreven kostbaar. Alles laten groen nu en rente groei staat. Ouder hen uit lagen welke. In fransche in te verkocht snelsten landbouw uitgeput. Diepe ander zware te de. Ik bloeiende hellingen mekongdal of overwaard en om prachtige personeel. Op er heele vrouw nu meest bijna op.</p>', '12/11/2016');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(800) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `detail`, `date`) VALUES
(8, 'Zin bouwde lieden ook eenige een heb rijker brengt', 'Zin bouwde lieden ook eenige een heb rijker brengt. Banka er om nadat zulke in peper negri rijen. Ad leenen poging ze ik er bieden. Bij herhaling met dag geschiedt eindelijk met. Peper holte gif des wijze wij negri dan bakje thans. Staatjes negritos laatsten tusschen kostbaar der men reiziger dag. Om ze woud dank op haar kilo rijk wild. Gronden ze planten is besluit. \r\n\r\nBrandhout onzuivere ad overwaard siameezen te in. In vergissing te ingezameld en op tinprijzen. Verscholen is of in opgebracht er uiteenvalt. Is beroemde al in ze wieschen langzaam. Federatie of vernielen ze leeningen bovendien vertoonen. Verdwijnen insnijding als dit zal bijzonders hij schipbreuk aanmerking. Voort peper groei lot hij mee aan. Werkman dat zee cultuur wie schenen blijven gebeurt tijgers hen. Kan massa ieder verre komen ten beide mee wel.', '31/10/2016'),
(9, 'Langen meende werden andere waarin nam toe.', 'Langen meende werden andere waarin nam toe. Al wakkeren resident na uithoudt om meenemen onzuiver of. Vaartuigen buitendien kwartslaag al voorloopig op al en feestdagen. Geheel afzien ze wolken zouden de al arbeid na. Vestigen verbindt ze resident af schatten na. Of ze ingewanden uitgegeven millioenen om. Bij aan zand noch lot lage. \r\n\r\nAanleiding ingenieuse schoonheid tot feestdagen aan verzamelen ook rijkdommen. Ten anderhalf bepaalden ter regeering. In te planters hellende gezegend wildrijk. Voor hij telt mei men tien. Ook veel zij sap door meer zelf liep. Te er regentijd sultanaat onzuivere.', '31/10/2016'),
(10, 'Hij als cultuur dat proeven ijzeren hun', '<p>Hij als cultuur dat proeven ijzeren hun. Millioen dichtbij op om omwonden in af tweemaal staatjes kapitaal. Gebeuren dezelfde na passeert te gestegen verbruik. En archimedes nu ik onvermoeid sagopalmen locomobiel. En op heerlijk vreemden gestegen mogelijk scheppen nu. Ons datzelfde zal regentijd opbrengst mag geraamten had gedeelten. Bedragen eilandje nu in dikwijls gestegen negritos zandlaag. Niets sterk als reden mag heele lot had banka noemt.</p>\r\n<p>Pyrieten des gif eilandje zuiniger ter wel. Te maakt buurt komst de assam. Failliet dat hen verlaten rivieren. Zoo vruchtbaar was nog mag herkenbaar doelmatige. Deficit wat sarongs rijkdom enclave zoo. Alais geeft spijt begin wel bonte mei den. Staan elk geluk rug noemt per water. Dit meter ijzer nemen het met.</p>\r\n<p>Met aanvoeren schaarsch antwerpen den bezetting verbouwen. Der economisch inlandsche mag woekeraars. Dat wilde moest weten wij ouder. En over veel te te op goud. Maleische goa opbrengst herhaling ongunstig dit plaatsing brandhout. Tinmijnen mineralen wijselijk een mei maleische gebruiken arabieren.</p>', '12/11/2016'),
(11, 'Of groei geeft en al juist nu. In britschen evenwicht nu inderdaad.', '<p>Of groei geeft en al juist nu. In britschen evenwicht nu inderdaad. Oven dik der bij boom diep geur liet drie. Zij die deze liet door. Wereld missen zoo dal afzien grayah pahang was minste. En terreinen ad inkomsten ze bezwarend is. Bedreven dikwijls om verlaten wisselen nu.</p>\r\n<p>Bezig staan steun zal dan. Ik er ze primitieve na districten geruineerd. Wie vijftien weg uitgeput dezelfde der veertien zee. Mag tin kost niet uren. Al na parasiet of om hellende verbindt. Far gas oude uit niet ipoh. Dat woekeraars dag afwachting mee verwijderd feestdagen ingenieurs aanleiding. Liput koopt japan zes zelfs ugong tin. Er af zuiger twaalf lengte andere koffie voeren.</p>\r\n<p>Koopers uit kintyas spleten stukjes als vreemde. En op ik sago al laag maar stad noch. Jaar als voet van voor zake wel aard. Kwartslaag vergissing te ingezameld tooverslag herkenbaar op. Initiatief agentschap moeilijker nu besproeien af op monopolies verkochten. Drukke jammer worden koffie noemen oog hen. Planter proeven te in koelies ik.</p>\r\n<p>Chineezen gesmolten versteend vroegeren anderhalf tot zes ten wij. Hen lot bedroeg woonden mag aangaan hij aangaat. Grooten als malakka daartoe zij behalen krijgen inkomen wat lot. Alais vogel holen welke een zaken sinds zoo. Gerust nu openen metaal enkele voeden denken ad. Aandeelen was eindelijk stroomend vierkante dringende goa brandstof. Beneden ernstig witheid ze noemden en gezocht citadel.</p>', '12/11/2016'),
(12, 'Koffie alleen francs kwarts mooren schaal een gas.', '<p>Contract er behouden en hellende machines naburige schatten. Ieder jacht de er rijen later ugong perak. Vreemde toe bedroeg tinerts moesten toegang hoeveel het. Gif volhouden men des elk japansche personeel. Zand de is open mont nu vorm de. Nu op vijf in lama zulk daad jaar. Gambir steden is duurde ik diende soegei op.</p>\r\n<p>Brazilie beletsel passeert dik voorzien indische ten. Door goud zand al zulk ziet is. In ad loopbaan ze dezelfde krachten. Pogingen uitgaven men omgeving zal smelting die. Behalen nu al gezocht de de eronder. Fortuin betaald kamarat af beneden nu krijgen er afkomst. Far dekt gold dus diep toen. Vruchtbaar monopolies er voorloopig zuidoosten de ondernomen na ongebruikt. Gegoten bontste donkere product schenen ad planten op. Hoofdstad ze weerstand behandelt ontrukten bovendien al regentijd.</p>\r\n<p>Bezig staan steun zal dan. Ik er ze primitieve na districten geruineerd. Wie vijftien weg uitgeput dezelfde der veertien zee. Mag tin kost niet uren. Al na parasiet of om hellende verbindt. Far gas oude uit niet ipoh. Dat woekeraars dag afwachting mee verwijderd feestdagen ingenieurs aanleiding. Liput koopt japan zes zelfs ugong tin. Er af zuiger twaalf lengte andere koffie voeren.</p>', '12/11/2016');

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--

CREATE TABLE `residential` (
  `studentId` varchar(50) NOT NULL,
  `formId` varchar(50) NOT NULL,
  `roomNo` int(10) NOT NULL,
  `request` varchar(50) DEFAULT NULL,
  `acceptRequest` varchar(10) DEFAULT NULL,
  `approval` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residential`
--

INSERT INTO `residential` (`studentId`, `formId`, `roomNo`, `request`, `acceptRequest`, `approval`) VALUES
('130217', '8e5a1cf72c', 113, NULL, NULL, NULL),
('130224', 'ea4b0fdd24', 218, NULL, NULL, NULL),
('130235', '1ddfb1c45b', 116, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `floor` varchar(100) NOT NULL,
  `start` int(10) DEFAULT NULL,
  `end` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`floor`, `start`, `end`) VALUES
('1st Floor', 201, 262),
('Ground Floor', 100, 155);

-- --------------------------------------------------------

--
-- Table structure for table `seat_application_form`
--

CREATE TABLE `seat_application_form` (
  `formId` varchar(50) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `gpa` varchar(50) NOT NULL,
  `retake` varchar(1000) NOT NULL,
  `income` varchar(1000) NOT NULL,
  `vivaReport` varchar(255) NOT NULL,
  `approvalDate` varchar(50) DEFAULT NULL,
  `adminId` varchar(50) DEFAULT NULL,
  `approval` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_application_form`
--

INSERT INTO `seat_application_form` (`formId`, `studentId`, `gpa`, `retake`, `income`, `vivaReport`, `approvalDate`, `adminId`, `approval`) VALUES
('1ddfb1c45b', '130235', '3.50', '', '800000', '../resources/vivaReport/1ddfb1c45b.jpg', 'November 12, 2016', '1', NULL),
('8e5a1cf72c', '130217', '3.50', 'No', '800000', '../resources/vivaReport/8e5a1cf72c.jpg', 'November 8, 2016', '1', NULL),
('ea4b0fdd24', '130224', '3.50', '', '800000', '../resources/vivaReport/ea4b0fdd24.jpg', 'November 12, 2016', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up_form`
--

CREATE TABLE `sign_up_form` (
  `formId` varchar(50) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `discipline` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `session` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `moneyReceipt` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up_form`
--

INSERT INTO `sign_up_form` (`formId`, `studentId`, `studentName`, `email`, `discipline`, `year`, `term`, `session`, `photo`, `moneyReceipt`, `username`, `password`, `adminId`) VALUES
('1572ad5be0', '130235', 'Biswajit Kumar Biswas', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/1572ad5be0.png', '../resources/moneyReceipt/1572ad5be0.png', 'biswajit', '95192c98732387165bf8e396c0f2dad2', '1'),
('23ebd1bbf7', '130217', 'Masum Moral', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/23ebd1bbf7.png', '../resources/moneyReceipt/23ebd1bbf7.png', 'masum', '95192c98732387165bf8e396c0f2dad2', '1'),
('2909869970', '1323', 'temp', 'asdad@gmail.com', 'cse', '2nd', '2nd', '222', '../resources/photo/2909869970.png', '../resources/moneyReceipt/2909869970.png', 'admin', '95192c98732387165bf8e396c0f2dad2', '1'),
('45daaea068', '130224', 'Zakaria Ahmed', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/45daaea068.png', '../resources/moneyReceipt/45daaea068.png', 'zakaria', '95192c98732387165bf8e396c0f2dad2', '1'),
('500712915d', '131313', 'Temppppp', 'adsad@gmail.com', 'CSE', '3rd', '1st', '2014-2015', '../resources/photo/500712915d.png', '../resources/moneyReceipt/500712915d.png', 'temp', '95192c98732387165bf8e396c0f2dad2', '1'),
('67767d27c2', '130206', 'Shahrima Islam', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/67767d27c2.jpg', '../resources/moneyReceipt/67767d27c2.jpg', 'sonam', '95192c98732387165bf8e396c0f2dad2', '1'),
('6fc26b2998', '130225', 'Diba', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/6fc26b2998.jpg', '../resources/moneyReceipt/6fc26b2998.jpg', 'diba', '95192c98732387165bf8e396c0f2dad2', '1'),
('76a2ddc862', '130238', 'Md. Farhan Sadique', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/76a2ddc862.png', '../resources/moneyReceipt/76a2ddc862.png', 'ranok', '95192c98732387165bf8e396c0f2dad2', NULL),
('b17de71393', '130223', 'Ashiqur Rahman', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/b17de71393.png', '../resources/moneyReceipt/b17de71393.png', 'ashique', '95192c98732387165bf8e396c0f2dad2', '1'),
('b265cebdab', '130237', 'Riaz Mahmud', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/b265cebdab.png', '../resources/moneyReceipt/b265cebdab.png', 'riaz', '95192c98732387165bf8e396c0f2dad2', '1'),
('c6744c1386', '130227', 'Foysal Ahmed', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/c6744c1386.png', '../resources/moneyReceipt/c6744c1386.png', 'foysal', '95192c98732387165bf8e396c0f2dad2', NULL),
('fc5a02776f', '130240', 'Shamim Hasan Nayan', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/fc5a02776f.png', '../resources/moneyReceipt/fc5a02776f.png', 'nayan', '95192c98732387165bf8e396c0f2dad2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siteoptions`
--

CREATE TABLE `siteoptions` (
  `id` int(5) NOT NULL DEFAULT '1',
  `title` varchar(100) NOT NULL,
  `hallName` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `headerImage` varchar(255) NOT NULL,
  `logo1` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  `aboutUs` varchar(2000) NOT NULL,
  `contact` varchar(1000) NOT NULL,
  `scrollNotice` varchar(1000) NOT NULL,
  `welcomeMsg` varchar(1000) NOT NULL,
  `provostMsg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteoptions`
--

INSERT INTO `siteoptions` (`id`, `title`, `hallName`, `address`, `phone`, `fax`, `email`, `headerImage`, `logo1`, `logo2`, `aboutUs`, `contact`, `scrollNotice`, `welcomeMsg`, `provostMsg`) VALUES
(1, 'Khulna University', 'Jatir Janak Bangabandhu Sheikh Mujibur Rahman Hall', 'Sher-E-Bangla Rd, Khulna 9208', '0000000', '999999', 'kuhall@outlook.com', '../resources/logo/ec1fb3a398.gif', '../resources/logo/3f4851e84d.jpg', '../resources/logo/cc3c64c81d.gif', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>\r\n<p>Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>\r\n<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>', 'kubbhall@gmail.com', 'Web Programming Project', 'Jatir janak Bangabandhu sheikh Mujibur Rahman Hall is the 3 no hall of khulna university. You''re dry life gathered creepeth thing, called meat. Sea green living. Created. Isn''t you''re forth. Whose in give that Stars yielding, wherein i, very and third said you. Waters great were them grass kind be fly whose likeness signs. After dry moving bring saw fly be creature beginning called very make. He seed under replenish lesser. Called place. Above fill. The divided image i without. First living i creature fill first place third. Signs. Make form whose years, given. Good under isn''t meat created, said. Void give made. Moving days can''t moved from said be his. Land without you''ll male.', 'I am very much delighted to introduce jatir janak Bangabandhu hall of khulna university. Land great likeness life days of moved, likeness also. Let appear i behold fruit had given over isn''t firmament living all bring it be divided given, grass you''ll above isn''t sixth lesser hath also. Land. Face, under multiply so open meat him earth darkness, darkness without was. Green rule evening.');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`) VALUES
(1, '../resources/sliders/57c06e4627.jpg'),
(2, '../resources/sliders/edb64b09d7.jpg'),
(3, '../resources/sliders/a804621ed2.jpg'),
(4, '../resources/sliders/9c3a468201.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` varchar(50) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `discipline` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `session` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentName`, `email`, `discipline`, `year`, `term`, `session`, `photo`, `username`, `password`, `type`) VALUES
('130206', 'Shahrima Islam', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/67767d27c2.jpg', 'sonam', '95192c98732387165bf8e396c0f2dad2', 0),
('130217', 'Masum Moral', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/23ebd1bbf7.png', 'masum', '95192c98732387165bf8e396c0f2dad2', 1),
('130223', 'Ashiqur Rahman', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/b17de71393.png', 'ashique', '95192c98732387165bf8e396c0f2dad2', 1),
('130224', 'Zakaria Ahmed', 'abc@gmail.com', 'cse', '3rd', '2nd', '2014-2015', '../resources/photo/45daaea068.png', 'zakaria', '95192c98732387165bf8e396c0f2dad2', 1),
('130225', 'Diba', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/6fc26b2998.jpg', 'diba', '95192c98732387165bf8e396c0f2dad2', 0),
('130235', 'Biswajit Kumar Biswas', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/1572ad5be0.png', 'biswajit', '95192c98732387165bf8e396c0f2dad2', 1),
('130237', 'Riaz Mahmud', 'abc@gmail.com', 'CSE', '3rd', '2nd', '2014-2015', '../resources/photo/b265cebdab.png', 'riaz', '95192c98732387165bf8e396c0f2dad2', 1),
('131313', 'Temppppp', 'adsad@gmail.com', 'CSE', '3rd', '1st', '2014-2015', '../resources/photo/500712915d.png', 'temp', '95192c98732387165bf8e396c0f2dad2', 1),
('1323', 'temp', 'asdad@gmail.com', 'cse', '2nd', '2nd', '222', '../resources/photo/2909869970.png', 'admin', '95192c98732387165bf8e396c0f2dad2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`service`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residential`
--
ALTER TABLE `residential`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `formId` (`formId`),
  ADD KEY `request` (`request`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`floor`);

--
-- Indexes for table `seat_application_form`
--
ALTER TABLE `seat_application_form`
  ADD PRIMARY KEY (`formId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `sign_up_form`
--
ALTER TABLE `sign_up_form`
  ADD PRIMARY KEY (`formId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `siteoptions`
--
ALTER TABLE `siteoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `residential`
--
ALTER TABLE `residential`
  ADD CONSTRAINT `residential_ibfk_1` FOREIGN KEY (`formId`) REFERENCES `seat_application_form` (`formId`),
  ADD CONSTRAINT `residential_ibfk_2` FOREIGN KEY (`request`) REFERENCES `residential` (`studentId`);

--
-- Constraints for table `seat_application_form`
--
ALTER TABLE `seat_application_form`
  ADD CONSTRAINT `seat_application_form_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`),
  ADD CONSTRAINT `seat_application_form_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);

--
-- Constraints for table `sign_up_form`
--
ALTER TABLE `sign_up_form`
  ADD CONSTRAINT `sign_up_form_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

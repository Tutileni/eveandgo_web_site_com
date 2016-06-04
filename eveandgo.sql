-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Janvier 2016 à 23:22
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eveandgo`
--

-- --------------------------------------------------------

--
-- Structure de la table `audio`
--

CREATE TABLE `audio` (
  `Id_Audio` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID_categorie` int(11) NOT NULL,
  `Nom` varchar(60) NOT NULL,
  `Sous_categorie` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ID_categorie`, `Nom`, `Sous_categorie`) VALUES
(1, 'Concert', 'Pop Rock'),
(2, 'Concert', 'Electro'),
(3, 'Concert', 'Rap/Hip Hop'),
(4, 'Concert', 'Dark / Metal'),
(5, 'Concert', 'Variete francaise/Chanson'),
(6, 'Concert', 'Classique'),
(7, 'CLUBBING', 'Soiree-Electro'),
(8, 'CLUBBING', 'Concert-Electro'),
(9, 'CLUBBING', 'Festival-Electro'),
(10, 'CLUBBING', 'Soiree-Electro'),
(11, 'CLUBBING', 'Concert-Electro'),
(12, 'CLUBBING', 'Soiree-Electro'),
(13, 'Festival', 'Pop Rock'),
(14, 'Festival', 'Electro'),
(15, 'Festival', 'Danse'),
(16, 'Festival', 'Classique'),
(17, 'Festival', 'Jazz / Blues / Gospel'),
(18, 'Festival', 'Variete francaise / Chanson'),
(19, 'MUSEE/EXPO', 'Visite/Musee'),
(20, 'MUSEE/EXPO', 'Expo/Photographie'),
(21, 'Sport', 'Football'),
(22, 'Sport', 'Football'),
(23, 'Sport', 'Mecanique'),
(24, 'Sport', 'Combat'),
(25, 'Sport', 'Basket'),
(26, 'Sport', 'Tennis'),
(27, 'Loisirs', 'Parc'),
(28, 'Loisirs', 'Salon-Grand-Public'),
(29, 'Loisirs', 'Cinema'),
(30, 'Loisirs', 'Cinema'),
(31, 'Loisirs', 'Cinema'),
(32, 'Loisirs', 'Parc'),
(34, 'Spectacle', 'Humour');

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE `commenter` (
  `evenement_ID_Eve` int(11) NOT NULL,
  `membre_Login` varchar(25) NOT NULL,
  `Commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contient_tag`
--

CREATE TABLE `contient_tag` (
  `message_Id_message` int(11) NOT NULL,
  `tag_Id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `est_illustre`
--

CREATE TABLE `est_illustre` (
  `audio_Id_Audio` int(11) DEFAULT NULL,
  `images_Id_image` int(11) DEFAULT NULL,
  `video_Id_video` int(11) DEFAULT NULL,
  `evenement_ID_Eve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `est_illustre`
--

INSERT INTO `est_illustre` (`audio_Id_Audio`, `images_Id_image`, `video_Id_video`, `evenement_ID_Eve`) VALUES
(NULL, 1, NULL, 1),
(NULL, 2, NULL, 2),
(NULL, 3, NULL, 3),
(NULL, 4, NULL, 4),
(NULL, 5, NULL, 5),
(NULL, 6, NULL, 6),
(NULL, 7, NULL, 7),
(NULL, 8, NULL, 8),
(NULL, 9, NULL, 9),
(NULL, 10, NULL, 10),
(NULL, 11, NULL, 11),
(NULL, 12, NULL, 12),
(NULL, 13, NULL, 13),
(NULL, 14, NULL, 14),
(NULL, 15, NULL, 15),
(NULL, 16, NULL, 16),
(NULL, 17, NULL, 17),
(NULL, 18, NULL, 18),
(NULL, 19, NULL, 19),
(NULL, 20, NULL, 20),
(NULL, 21, NULL, 21),
(NULL, 22, NULL, 22),
(NULL, 23, NULL, 23),
(NULL, 24, NULL, 24),
(NULL, 25, NULL, 25),
(NULL, 26, NULL, 26),
(NULL, 27, NULL, 27),
(NULL, 28, NULL, 28),
(NULL, 29, NULL, 29),
(NULL, 30, NULL, 30),
(NULL, 31, NULL, 31),
(NULL, 32, NULL, 32),
(NULL, 34, NULL, 34);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `ID_Eve` int(11) NOT NULL,
  `Titre` char(25) NOT NULL,
  `Descriptif` text NOT NULL,
  `Type_de_Public` varchar(25) NOT NULL,
  `Site_web` varchar(255) NOT NULL,
  `Date_Eve` date NOT NULL,
  `Prix` int(11) NOT NULL,
  `Horaire` time NOT NULL,
  `Complet` varchar(20) NOT NULL,
  `membre_Login` varchar(25) NOT NULL,
  `categories_ID_categorie` int(11) NOT NULL,
  `signalement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`ID_Eve`, `Titre`, `Descriptif`, `Type_de_Public`, `Site_web`, `Date_Eve`, `Prix`, `Horaire`, `Complet`, `membre_Login`, `categories_ID_categorie`, `signalement`) VALUES
(1, 'Concert Rock My Geek Musi', 'Rock My Geek Festival - Soirée "MEDIEVALE FANTASTIQUE" avec\r\nECHOS DE LA TERRE DU MILIEU + STILLE VOLK + NAHEULBAND', 'enfant', 'http://www.digitick.com/rock-my-geek-music-festival-concert-le-bascala-bruguieres-16-janvier-2016-css4-digitick-pg101-ri3488614.html', '2016-01-16', 0, '19:30:00', '', 'pleo', 1, 0),
(2, 'BIRDY NAM NAM', ' De Paris à Osaka, de Moscou à Miami, en première partie de Skrillex ou en tête d''affiche du Main Square, les Birdy donnent depuis 15 ans à grands coups de vinyles, de scratch, de Trans-Boulogne Express, d''Abbesses ou Wild for the Night.\r\n\r\nC''est en passant à Los Angeles, où la folie est une norme que le trio original s''est nourri de sea, sex & sun et ça transpire dans les nouveaux morceaux. Donc pas besoin de discours surfait et nul besoin de se triturer la tête, le maître mot cette fois c''est DANCE OR DIE ! Ca tombe bien, c''est le titre du nouvel album.\r\n\r\nEt en guise de conclusion, les 3 dj enterrent une partie de leur passé. Le savoir-faire, l''artisanat à la française, la qualité du travail bien fait, c''est eux qui l''ont initié et adviennent que pourra des vieux brontosaures de la musique business.\r\n\r\nLe trio partagera désormais sa musique librement, gratuitement à tous ces supporters...', 'adulte', 'http://www.digitick.com/birdy-nam-nam-concert-stereolux-nantes-16-janvier-2016-css4-digitick-pg101-ri3313558.html', '2016-01-16', 0, '20:00:00', '', 'pleo', 2, 0),
(3, 'KALIN & MYLES', ' C''est en 2011 que Kalin et Myles commencent la musique ensemble avec leur premier titre, More Than Friends, qui récolte un certain succès sur YouTube. Sur leur lancée, ils sortent leur premier EP Chase Dreams en juin 2014 (qui se classera 6ème du top rap albums du Billboard !) suivi 6 mois plus tard d''un second EP, Dedication.\r\n\r\nCette année, Kalin et Myles ont été nommés aux Teen Choice Awards et débuté leur première tournée internationale.', 'adulte', 'http://www.digitick.com/kalin-myles-concert-la-boule-noire-paris-16-janvier-2016-css4-digitick-pg101-ri3424332.html', '2016-01-16', 0, '19:30:00', '', 'pleo', 3, 0),
(4, 'LOFOFORA', ' 1 ere partie : Yurodivy .Récent vainqueur du tremplin Décibulles , plusieurs fois premières parties de Lofofora , Yurodivy a sorti son premier Ep en 2014. Ces strasbourgeois balancent un post-hardcore décapant comme on n''en fait plus en France .Yurodivy et son nom apocalytique innove encore et toujours avec des riffs barrés et des grosses rythmiques qui rappelleront par moments The Dillinger Escape Plan , rien que cela ! Impressionnant, scotchant , Yurodivy arrive par la grande porte ! LOFOFORA :25 ans... Voilà donc vingt cinq ans que Lofofora créé, expérimente ce composé de métal-punk aux embruns groove et doté de conscience. Un quart de siècle, depuis sa naissance, que Lofofora parle à nos ventres rock et nos âmes citoyennes ; vingt cinq ans qu''ils dézinguent une à une les aberrations de cette époque et les absurdités d''un monde dans lequel ils tiennent le cap de l''alternative. ', 'adulte', 'http://www.digitick.com/lofofora-concert-theatre-de-la-mediatheque-freyming-merlebach-23-janvier-2016-css4-digitick-pg101-ri3549488.html', '0000-00-00', 0, '20:30:00', '', 'pleo', 4, 0),
(5, 'ALAIN SOUCHON & LAURENT V', ' 1974 : Alain Souchon et Laurent Voulzy collaborent sur leur premier hit « J''ai 10 ans ». \r\n2014 : Alain Souchon et Laurent Voulzy réunis enfin sur un album commun ! \r\n\r\nA l''occasion de leur premier album, Alain Souchon et Laurent Voulzy sont actuellement réunis sur scène pour une Tournée exceptionnelle dans toute la France !', 'famille', 'http://www.digitick.com/alain-souchon-et-laurent-voulzy-en-concert-concert-les-arenes-de-metz-16-janvier-2016-css4-digitick-pg101-ri3228558.html', '2016-01-16', 0, '20:00:00', '', 'pleo', 5, 0),
(6, 'Schubert-Brahms-Prokoviev', ' Au sein de la prestigieuse phalange de virtuoses de l''ex-Union Soviétique, Elisabeth Leonskaya, née au lendemain de la Seconde Guerre mondiale à Tbilissi, en Géorgie, tient une place à part. Discrète, se confiant peu aux médias, elle incarne le clavier dans ce qu''il a de plus noble et ardent une forme de pureté artistique qui lui vaut de nombreux admirateurs. L''immense Sviatoslav Richter comptait au nombre de ceux-ci et en avait fait une de ses partenaires privilégiées.', 'famille', 'http://www.digitick.com/elisabeth-leonskaya-concert-cite-de-la-musique-philharmonie-2-paris-16-janvier-2016-css4-digitick-pg101-ri3223392.html', '2016-01-16', 0, '20:30:00', '', 'pleo', 6, 0),
(7, 'PSYMIND #2', ' 21H/09H00 AU DOCK DES SUDS\r\n♪♫ 12H DE TRANCE & PSYTRANCE NON STOP♫♪\r\n\r\n- 5000 HAPPY PEOPLES\r\n- 3 SCENES + GRAND CHILL-OUT \r\n- SYSTEMS L''ACOUSTICS\r\n- 29 LIVES & DJS - INTERNATIONAUX & LOCAUX\r\n- PSYTRANCE, PROGRESSIVE, FULL ON, DARK, PSYGRESSIVE\r\n- SALLES ENTIEREMENT RE-DECOREES - LIGHTSHOWS\r\n- VILLAGE STANDS - RESTAURATION - BAR\r\n- ANIMATIONS - SURPRISES !!! \r\n- STAND DE PREVENTION\r\nMasquer\r\n// PROGRESSIVE STAGE // - ACE VENTURA - MORTEN GRANAU - VINI VICI - MANDRAGORA - HATIKWA - KIPI VIBRATION - KOKMOK - AYASKA - TRANSMUTATION DB - CEZZ //\r\n// PSYCHEDELIC STAGE // - KOXBOX - MAD MAXX - DIRTY SAFFI - DUST - PSYBERPUNK - FREQUENCY LESS - MISS TEKIX vs HEAVY FAWN - MENTAL DROP - SHRED''ER //\r\n// FRIEND''S STAGE // - PAT LE PIRATE - SANLAYANA - SAW DEEP - AKINAX - SWAM - SPARROW - TITEP TETRIP - OIKIA - YAGSA //', 'adulte', 'http://www.digitick.com/psymind-2-soiree-le-dock-des-suds-marseille-16-janvier-2016-css4-digitick-pg101-ri3465504.html', '2016-01-16', 0, '21:00:00', '', 'pleo', 7, 0),
(8, 'BROKEN BACK', ' Les 4 titres de cet EP apparaissent comme des hymnes à cette génération de 1990. Le son sort d''une chambre d''étudiant, tout est bricolé, fait à la main. Pas de gros studios, pas de musiciens additionnels. \r\nMixés par Pierrick Devin (ancien assistant de Philippe Zdar, connu entre autre pour son travail avec Lilly Wood & the Prick), et N''to (producteur de Montpellier considéré comme un des espoirs de la scène Deep House minimale française), cet EP sonne comme une mélodie qui n''a pas de frontières, à l''image d''une génération qui ne met plus de barrières entre les continents. Une génération lumineuse, née sur les cendres d''une crise ambiante, mais qui semble porteuse d''un optimisme à toute épreuve. Une génération vers laquelle, parfois, il fait bon de diriger son regard.', 'adulte', 'http://www.digitick.com/broken-back-concert-le-grand-mix-tourcoing-21-janvier-2016-css4-digitick-pg101-ri3502290.html', '2016-01-16', 31, '20:00:00', '', 'pleo', 8, 0),
(9, 'THE PEACOCK SOCIETY - REG', ' 1 nuit, 3 dancefloors, 1 warehouse, 1 club :\r\nTheo Parrish, Daphni, Dj Koze, Daniel Avery,\r\nMotor City Drum Ensemble, Levon Vincent,\r\nAndrew Weatherall, Danny Daze, Luke Hess Live,\r\nClouds Live, Eric Cloutier, Zombie Zombie Live,\r\nClara 3000, Nathan Melja, …\r\n#bouillant\r\n\r\nFESTIVAL INTERDIT AUX MINEURS', 'adulte', 'http://www.digitick.com/the-peacock-society-regular-baby-festival-parc-floral-paris-30-janvier-2016-css4-digitick-pg101-ri3508028.html', '2016-01-30', 39, '20:00:00', '', 'ltutileni', 9, 0),
(10, 'FLORIAN COMBE DJ set + NA', ' Le Cargo passe du côté obscur pour ce réveillon electro ! Fondateur du label Scandium Records, FLORIAN COMBE produit et projette sur les devant de la scène des artistes comme Maxime Dangles ou Joris Delacroix. Rejeton de la scène techno Sudiste, NHAR fait de son algorithme musical une rencontre à la frange de la techno-house minimale, signée sur les labels Modelisme, Plak ou Correspondant. Dès les 00''s, MAXIME DANGLES entre par la grande porte dans le monde electro et prend un tournant techno assumé, affirmant ses sonorités tranchantes, brutes et percutantes, qu''il joue dans les clubs mythiques du Berghain, du Rex, et le Studio 80... Entouré de son dispositif scénographique LED Live, ce chevalier de lumière saura nous exalter.\r\n', 'enfant', 'http://www.digitick.com/florian-combe-dj-set-nahr-live-maxime-dangles-led-live-soiree-cargo-de-nuit-arles-16-janvier-2016-css4-digitick-pg101-ri3545570.html', '2016-01-16', 6, '22:00:00', '', 'pleo', 10, 0),
(11, 'DAVID GUETTA', ' Après une première tournée événement en 2012, une nouvelle série de shows en France vient de se confirmer !', 'adulte', 'http://www.digitick.com/david-guetta-concert-halle-tony-garnier-lyon-28-janvier-2016-css4-digitick-pg101-ri3238576.html', '2016-01-28', 85, '21:00:00', '', 'pleo', 11, 0),
(12, 'DEJA-WU', ' Les préventes donnent un accès prioritaire mais ne garantissent pas l''accès à l''établissement. La direction se réserve le droit d''admission.\r\nUne tenue correcte est exigée.\r\nLes personnes en état d''ébriété ou au comportement agressif se verront l''entrée refusée.\r\nLes mots d''ordre sont : Sourire et Bonne Humeur', 'adulte', 'http://www.digitick.com/deja-wu-soiree-le-rex-club-paris-16-janvier-2016-css4-digitick-pg101-ri3549176.html', '2016-01-16', 13, '23:55:00', '', 'spedro', 12, 0),
(13, 'FESTIVAL DU SCHMOUL - PAS', ' FESTIVAL DU SCHMOUL \r\n\r\nVendredi : Mass Hysteria, Dominic Sonic, Tokyo Sex Destruction, Washington Dead Cats, The Roadies, Loo & Placido\r\n\r\nSamedi : Tallisker, Blaze, Jeanne Added, Tom Fire, Last Train, Djs Fly et Netik', 'adulte', 'http://www.digitick.com/festival-du-schmoul-pass-2-jours-festival-salle-des-fetes-bain-de-bretagne-du-29-au-30-janvier-2016-css4-digitick-pg101-ri3579492.html', '2016-01-29', 34, '22:30:00', '', 'ltutileni', 13, 0),
(14, 'ASTROPOLIS 21.5 / THE SHO', ' ASTROPOLIS 2016\r\nTHE SHOES, ESB...', 'adulte', 'http://www.digitick.com/astropolis-21-5-the-shoes-esb-festival-la-carene-brest-css4-digitick-pg101-ri3539344.html', '2016-01-16', 28, '22:30:00', '', 'ltutileni', 14, 0),
(15, 'FESTIVAL CONCORDAN(S)E', ' Festival CONCORDAN(S)E - Rencontre inédite entre un chorégraphe et un écrivain\r\nConcordan(s)e passe une commande à un chorégraphe et à un écrivain qui ne se connaissent pas au préalable. Le chorégraphe et l''écrivain interprètent ensuite face au public une chorégraphie et un texte inédits. \r\n\r\nJEUDI 17 MARS - Carreau du Temple\r\nL''hippocampe mais l''hipoccampe\r\n{Cécile Loyer, chorégraphe. Violaine Schwartz, écrivain} \r\nEnjoy the silence\r\n{Mickaël Phelippeau, chorégraphe. Célia Houdart, écrivain} \r\n\r\nVENDREDI 18 MARS - Carreau du Temple\r\nJetés dehors\r\n{Sylvain Prunenec, chorégraphe. Mathieu Riboulet, écrivain} \r\nEn amour, il faut toujours un perdant\r\n{Fabrice Ramalingom, chorégraphe. Emmanuelle Bayamack-Tam, écrivain}', 'adulte', 'http://www.digitick.com/festival-concordan-s-e-festival-danse-css4-digitick-pg51-ei388404.html', '2016-03-18', 0, '17:30:00', '', 'ltutileni', 15, 0),
(16, 'LES NUITS OXYGENE #2 - So', ' LE PROGRAMME\r\nVasks, Les Saisons (création française)\r\nScriabine (Sonate No. 6 Op. 62, Valse en la bémol majeur Op. 38, Poème-nocturne Op. 61, Sonate No. 4 en fa dièse majeur Op. 30)\r\n\r\n« Une ampleur qui impressionne. Un piano au caractère rhapsodique, au service de la musique et de son chant. Vestard Shimkus, une personnalité des plus originales, une belle découverte.» (Stéphane Friederich, Classica, Février 2015)\r\nMasquer\r\nAvec son apparence de DJ, le pianiste letton Vestard Shimkus nous surprend par son look et son talent. Il possède déjà une discographie plus que respectable et admirable, dont un explosif album Beethoven (Ars Produktion), et une extraordinaire monographie Rachmaninov (Artalinna). Vestard Shimkus est né en 1984 à J&#363;rmala. Il a remporté de nombreux prix, dont le Prix « International Performers Competition » à Stockholm en 2001 à l''âge de dix-sept ans. Encore trop discret en France, son prochain concert à Paris, dans le cadre de la deuxième édition des Nuits Oxygene (il était présent lors de la première édition), mêlera pages de Scriabine, et un cycle d''importance en création française, Les Saisons, de son compatriote et maître, P&#275;teris Vasks.', 'adulte', 'http://www.digitick.com/les-nuits-oxygene-2-soiree-1-shimkus-festival-eglise-allemande-paris-29-mars-2016-css4-digitick-pg101-ri3643930.html', '2016-01-29', 17, '20:00:00', '', 'ltutileni', 16, 0),
(17, 'SUGAR RAY NORCIA & THE BL', ' 10ème édition du Seven Nights to Blues Festival \r\n\r\nSugar Ray Norcia : voix, harmonica\r\n«Monster» Mike Welch : voix, guitare\r\nAnthony Geraci : piano\r\nMichael «Mudcat» Ward : basse\r\nNeil Gouvin : batterie\r\n\r\nLe 10 éme « SEVEN NIGHTS TO BLUES FESTIVAL » fête son anniversaire avec ce premier concert époustouflant ! Jouant son blues d''un style unique autour du monde depuis plus de quarante ans, Sugar Ray Norcia & the Bluetones n''est nullement cantonné à un seul genre. Il est capable de jouer le Chicago Blues à la façon de Muddy Waters, Little Walter ou Billy Boy Arnold, le Kansas City Swing dans le style de Big Joe Turner, le blues du Texas comme T.Bone Walker ou Freddie King… mais aussi le blues du swamp de Lazy Lester. Tout cela avec l''originalité distinctive de son leader Sugar Ray Norcia au chant et à l''harmonica, du guitariste Monster Mike Welch, d''Anthony Geraci au piano et à l''orgue Hammond, du bassiste et contrebassiste Michael «Mudcat» Ward et du métronome Neil Gouvin à la batterie !\r\nDe plus ces différents musiciens sont présents sur beaucoup d''albums importants incluant rien moins qu''Hubert Sumlin, John Hammond, Johnny Winter, Otis Grand, Pinetop Perkins, the Mannish Boys, Sugaray Rayford, Debbie Davies, Duke Robillard, Ronnie Earl et beaucoup d''autres !\r\n\r\nJe laisse le mot de la fin à l''incontournable Kim Wilson des Fabulous Thunderbirds qui lorsqu''il parle de Sugar Ray le présente comme le «real deal» fer de lance de cette musique qui nous est si chère !', 'enfant', 'http://www.digitick.com/sugar-ray-norcia-the-bluetones-usa-festival-salle-andre-wauquier-saint-andre-lez-lille-22-janvier-2016-css4-digitick-pg101-ri3612794.html', '2016-01-22', 15, '20:30:00', '', 'ltutileni', 17, 0),
(18, 'HUBERT FELIX THIEFAINE', ' HF Thiefaine, artiste Arachnée Productions\r\nL''album « Suppléments de Mensonge » (Disque platine, 2 Victoires de la Musique en 2011), HUBERT FELIX THIEFAINE souhaitait donner un digne successeur à cet album mythique.\r\nC''est chose faite avec « STRATEGIE DE L''INESPOIR » son magistral nouvel album sortie le 24 Novembre avec pour premier extrait « ANGELUS ». Pour son retour sur scène HUBERT FELIX THIEFAINE annonce une nouvelle tournée à partir d''avril 2015.', 'adulte', 'http://www.digitick.com/hubert-felix-thiefaine-festival-centre-international-saint-vulbas-30-mars-2016-css4-digitick-pg101-ri3544126.html', '2016-03-30', 0, '21:00:00', '', 'ltutileni', 18, 0),
(19, 'MUSEE D''ORSAY - TARIF NOC', ' Billet valable 3 mois à compter de la date d''émission. Ce billet donne accès aux collections permanentes et aux expositions dans la limite des places disponibles.\r\nBillet utilisable dans les 3 mois qui suivent l''achat.\r\n\r\n\r\nValable le jeudi à partir de 18h et jusqu''à 21h45 (dernière entrée 21h15).\r\nLe musée est ouvert les jours fériés sauf les 01/05 et 25/12. \r\nAccès réservé porte C. Une attente est possible au contrôle Vigipirate.\r\n\r\nCe billet donne accès aux collections permanentes, et aux expositions temporaires dans la limite des places disponibles.\r\n\r\nGratuits : moins de 18 ans, 18-25 ans ressortissants de l''Union Européenne, étudiants en histoire de l''art, porteurs du Pass Education, personnes handicapées et demandeurs d''emploi (prévoir justificatifs). \r\nLe musée est gratuit pour tous le 1er dimanche de chaque mois, et le 1er janvier 2014.\r\nPrésentées dans une ancienne gare, les collections du musée d''Orsay sont parmi les plus célèbres. Elles présentent l''ensemble de la production artistique de 1848 à 1914, période décisive de l''histoire de l''Art d''où sont issus les chefs d''oeuvres de l''impressionnisme. Vous admirerez ainsi les plus grands artistes : Manet, Degas, Monet, Renoir, Van Gogh, Gauguin, Courbet, ou encore les sculpteurs Carpeaux, Rodin et Maillol.\r\n', 'enfant', 'http://www.digitick.com/musee-d-orsay-tarif-nocturnes-visite-paris-du-12-janvier-2012-au-31-decembre-2016-css4-digitick-pg101-ri1121753.html', '2016-01-12', 10, '16:20:00', '', 'spedro', 19, 0),
(20, 'Chevaliers et bombardes.', ' En pleine guerre de Cent Ans, le 25 octobre 1415, la bataille d''Azincourt sonne le glas de l''armée féodale. Un siècle plus tard, l''artillerie de François Ier joue un rôle décisif dans la victoire contre les piquiers suisses à Marignan en 1515. En un siècle, les armées, la tactique et les institutions militaires ont subi de profondes transformations et innovations techniques.\r\nGrâce à un regroupement exceptionnel d''objets provenant d''institutions françaises et étrangères - pièces d''artillerie, armures et manuscrits... - partez à la découverte des grandes batailles qui ont marqué l''histoire des XV-XVIe siècles et à la rencontre de personnages comme Jeanne d''Arc, le chevalier Bayard ou encore François Ier, dont la légende résonne encore aujourd''hui dans l''imaginaire collectif. Un voyage dans le temps ludique et spectaculaire, accompagné de reconstitutions et de nombreuses animations multimédias, pour redécouvrir l''art de la guerre, du Moyen Âge à la Renaissance.', 'famille', 'http://www.digitick.com/chevaliers-et-bombardes-d-azincourt-a-marignan-1415-1515-expo-musee-de-l-armee-paris-du-07-octobre-2015-au-24-janvier-2016-css4-digitick-pg101-ri3424296.html', '2016-10-07', 10, '10:30:00', '', 'spedro', 20, 0),
(21, 'Olympique de Marseille -', ' 16e de finale de Coupe de France', 'autre', 'http://www.digitick.com/olympique-de-marseille-montpellier-hsc-sport-stade-velodrome-20-janvier-2016-css4-digitick-pg101-ri3663310.html', '2016-01-20', 17, '21:00:00', '', 'spedro', 21, 0),
(22, 'LOSC - ESTAC TROYES', ' Venez decouvrir qui gagnera', 'enfant', 'http://www.digitick.com/losc-estac-troyes-sport-stade-pierre-mauroy-lille-23-janvier-2016-css4-digitick-pg101-ri3483740.html', '2016-01-23', 9, '20:00:00', '', 'spedro', 22, 0),
(23, 'Billet week-end Prévente', ' Pour sa troisième édition, le Grand-Prix Camions du Castellet vous donne rendez-vous le week-end de Pentecôte pour 2 jours de spectacle et fête ! \r\n\r\nCôté compétitions, la Coupe de France Camions jouera sa première manche de la saison sur le Circuit Paul Ricard aux côtés des Catherham R300 et nouveauté 2016, la Lotus Cup Europe (discipline FIA). Côté animations, un programme toujours plus varié pour vous offrir un week-end d’exception entre amis ou en famille : exposition et défilés de camions décorés, village enfants, expositions constructeurs, fête foraine, show cascades, feu d’artifice, concert…\r\n\r\nEntrée gratuite pour les moins de 16 ans accompagnés d''un adulte.', 'adulte', 'http://www.digitick.com/billet-week-end-prevente-a-30-au-lieu-de-35-sport-circuit-paul-ricard-le-castellet-du-14-au-15-mai-2016-css4-digitick-pg101-ri3544924.html', '2016-01-14', 10, '15:10:00', '', 'spedro', 23, 0),
(24, 'Finale du championnat de', ' Finale du championnat de France de Boxe professionnelle dans la catégorie des welters, samedi 16 janvier à 20h salle Pierre Montané (près du Zénith) !\r\nEn tête d''affiche Mohamed MIMOUNE (Toulouse) VS Kamal MOHAMED (Clermont - Ferrand). \r\nDepuis des années on l''attendait dans notre belle ville rose, enfin un toulousain en finale du championnat de France. Une victoire lui ouvrirait la route de l'' Europe ! \r\nVous pourrez aussi assister à trois autres matchs pros dont deux dans le top 4 français !\r\nEvènement à ne pas manquer ! Ouverture des portes à 19h30 !\r\nVenez nombreux pour profiter avec nous d''un évènement consacré à une boxe de qualité !.', 'adulte', 'http://www.digitick.com/finale-du-championnat-de-france-sport-salle-pierre-montane-toulouse-16-janvier-2016-css4-digitick-pg101-ri3694316.html', '2016-01-16', 15, '20:00:00', '', 'spedro', 24, 0),
(25, 'JSF Nanterre - JDA Dijon', ' Le club de la JSF Nanterre reçoit la JDA Dijon dans le cadre de la 20ème journée de PRO A.\r\nMasquer\r\nLes tarifs réduits concernent seulement les - de 18 ans, étudiants, licenciés JSFN, demandeurs d''emploi, personnes invalides.\r\nPour tout achat de places à tarif réduit, un justificatif vous sera demandé à l''entrée de la salle (carte d''identité, carte étudiante, licence JSFN, carte de demandeur d''emploi, carte d''invalidité). L''entrée est gratuite pour les enfants de moins de 4 ans à condition qu''ils soient sur les genoux de ses parents.\r\n\r\nAttention : Toute personne n''ayant pas de justificatif se verra refuser l''accès à la salle, sans remboursement.\r\n\r\nDeux clubs de supporters sont présents en tribune Supporters et Bercy (bruits, tambours...)', 'enfant', 'http://www.digitick.com/jsf-nanterre-jda-dijon-sport-palais-des-sports-de-nanterre-13-fevrier-2016-css4-digitick-pg101-ri3262240.html', '2016-02-13', 19, '20:00:00', '', 'spedro', 25, 0),
(26, 'FED CUP par BNP PARIBAS', ' FED CUP par BNP PARIBAS\r\n\r\nFrance / Italie\r\n\r\nLa France accueillera l''Italie pour le 1er tour du groupe mondial à Marseille au Palais des Sports les 6 et 7 février 2016', 'enfant', 'http://www.digitick.com/fed-cup-par-bnp-paribas-sport-tennis-css4-digitick-pg51-ei383064.html', '2016-01-16', 0, '00:00:00', '', 'spedro', 26, 0),
(27, 'Billet Tribu - Safari de', ' Billet valable 2 ans à partir de la date d''achat\r\n\r\n1 billet Valable pour 2 adulte (+ de 12ans) et 3 enfants (de 3 à 12 ans) Circuit voiture et parc à pied.\r\n\r\nPensez à vérifier les horaires d''ouverture et fermeture sur le site safari-peaugres.com\r\nAttention: Ce billet n''est pas un coupe file', 'enfant', 'http://www.digitick.com/billet-tribu-safari-de-peaugres-loisirs-css4-digitick-pg101-ri1849572.html', '2016-01-16', 80, '17:30:00', '', 'spedro', 27, 0),
(28, 'GALA DES CRINIERES D''OR', ' Du 20 au 24 janvier 2016, CHEVAL PASSION vous donne rendez-vous à Avignon pour le grand salon équestre de l''hiver. Après le succès du 30e anniversaire qui a enregistré une fréquentation de près de 100 000 visiteurs - dont 25 000 spectateurs pour le Gala des Crinières d''Or - le programme de la nouvelle édition s''annonce riche en évènements et animations, réunissant les stars d''aujourd''hui et les talents de demain autour de nouvelles animations et des grands rendez-vous qui ont fait le succès de Cheval Passion. Au programme : 1200 chevaux, 250 exposants, des concours (western, horse-ball, tri du bétail, dressage.), 90 heures de shows, les soirées festives du Cabaret Équestre et de la Bodega et 5 représentations du Gala des Crinières d''or.\r\n\r\nLe 1er octobre 2015, Cheval Passion ouvre sa billetterie. Il sera dès lors possible de réserver ses places pour la Gala des Crinières d''Or et même ses entrées pour le salon.\r\n', 'enfant', 'http://www.digitick.com/gala-des-crinieres-d-or-salon-grand-public-css4-digitick-pg51-ei372552.html', '2016-01-16', 0, '20:23:00', '', 'spedro', 28, 1),
(29, 'Les Etoiles du Rex + Film', ' Plongez au cœur du 7e art en partageant avec vos proches une séance de cinéma au cœur du plus grand cinéma d''Europe puis passez derrière l''écran où vous découvrirez les coulisses du Grand Rex, par le biais d''un parcours audio-guidé interactif.\r\n\r\nVous débuterez votre visite en montant dans un ascenseur panoramique transparent et passerez réellement derrière l''écran géant du Grand Rex. Au cœur de ce sanctuaire dédié au cinéma, vous découvrirez une ancienne cabine de projection reconstituée, verrez des images d''archives, pénétrerez dans le bureau du Directeur, poserez votre voix sur un extrait de film...\r\n\r\nPeu à peu, vous serez véritablement entraîné dans ce parcours ludique et interactif, véritable mise en scène de l''envers du plus célèbre Cinéma d''Europe.\r\n\r\nVous pourrez profiter de votre séance de cinéma sur le film de votre choix (6/7 films à l''affiche) avant ou après votre visite des Etoiles du Rex.\r\nCe billet donne droit à une séance de cinéma au choix parmi les 6 ou 7 films à l''affiche en 2D ou 3D, dans la Grande Salle ou les petites salles [hors spectacle de noël & féérie des eaux] ainsi qu''une entrée dans les coulisses du Grand Rex.', 'famille', 'http://www.digitick.com/les-etoiles-du-rex-film-a-l-affiche-loisirs-cultival-paris-du-30-juin-2014-au-30-septembre-2017-css4-digitick-pg101-ri2547782.html', '2016-06-30', 18, '20:00:00', '', 'spedro', 29, 0),
(30, 'Lumière sur la Cité du Ci', ' La Cité du Cinéma imaginée par Luc Besson vous ouvre ses portes pour une visite guidée insolite et exclusive. C''est au sein d''une ancienne centrale électrique construite dans les années 30, repérée par le réalisateur pour son film "Léon", que trône aujourd''hui le temple du 7e Art sur plus de 6 hectares.\r\n\r\nVotre visite débutera au cœur de la magistrale Nef de plus de 200m de long sous 18m de hauteur de structures Eiffel où sont exposés décors et costumes originaux de films comme le "5ème Elément".\r\n\r\nVous poursuivrez votre parcours en visitant l''Avenue des Studios ainsi qu'' un des ateliers techniques et vous emprunterez le célèbre escalier du film "Léon". Vous verrez également 1 des 9 plateaux de tournage (hors activité) dont la superficie s''échelonne de 600 à 2 000m² !\r\n\r\nVotre conférencier vous contera 1001 anecdotes vous permettant d''appréhender les différents métiers du Cinéma représentés au sein de la Cité. Vous découvrirez également les coulisses du chantier de cet "Hollywood sur Seine" grâce à un film retraçant les différentes évolutions de ce projet révolutionnaire pensé par Luc Besson.', 'adulte', 'http://www.digitick.com/lumiere-sur-la-cite-du-cinema-loisirs-cultival-paris-du-22-avril-2015-au-30-septembre-2017-css4-digitick-pg101-ri3183258.html', '2015-04-22', 22, '21:00:00', '', 'spedro', 30, 0),
(31, 'Titans de l''Age de Glace', ' Un voyage à travers les magnifiques paysages gelés d''Amérique du Nord, d''Europe et d''Asie, il y a 10 000 ans à l''époque où les hommes partageaient la toundra avec de dangereux animaux : mammouths, tigres à dents de sabre, loups…\r\nUn témoignage du développement paradoxalement fécond de notre civilisation : cette grande épreuve de la survie, ce « test de la glace », obligea nos ancêtres à rechercher à comprendre et à apprivoiser la nature.\r\n\r\nLes mammouths et les tigres à dents de sabre peuvent avoir succombé à l''extinction, mais ils sont en plein essor à La Géode ....\r\n\r\n\r\nUn documentaire de David Clark, Giant Screen Films\r\n', 'enfant', 'http://www.digitick.com/titans-de-l-age-de-glace-loisirs-cinema-css4-digitick-pg51-ei334624.html', '2016-01-16', 20, '20:00:00', '', 'spedro', 31, 0),
(32, 'LA VALLEE DES SINGES 2016', ' Saison 2016 selon calendrier d''ouverture.', 'enfant', 'http://www.digitick.com/la-vallee-des-singes-2016-loisirs-romagne-css4-digitick-pg101-ri3538514.html', '2016-01-16', 20, '15:10:00', '', 'spedro', 32, 0),
(34, 'NADIA ROZ dans CA FAIT DU', ' Nadia Roz croque la vie et pétille par sa bonne humeur. Ce petit bout de femme envahit la scène comme une bouffée d''oxygène avec un talent unique. A travers ses personnages comme une coach sportive, une mannequin brésilienne, une Blanche Neige malicieuse ou encore une caillera caustique et attachante, elle incarne des femmes contemporaines qui toutes nous émeuvent et nous déclenchent des fous rires. \r\nC''est sûr, Nadia Roz redonne des couleurs à la vie et… ça fait du bien ! \r\n\r\nNadia Roz a reçu plusieurs récompenses à travers toute la France dont le prix du public et du jury au Festival Mont Blanc d''humour de Saint Gervais en 2014. Elle a également été proclamée « Révélation du Marrakech du Rire 2015 ».', 'enfant', 'http://www.digitick.com/nadia-roz-dans-ca-fait-du-bien-spectacle-humour-css4-digitick-pg51-ei371592.html', '2016-02-20', 5, '20:23:00', '', 'spedro', 34, 0);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `Id_image` int(11) NOT NULL,
  `Nom_image` text NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`Id_image`, `Nom_image`, `Type`) VALUES
(1, '569a29ba1e55a.jpg', ''),
(2, '569a302bea53a.jpg', ''),
(3, '569a354017678.jpg', ''),
(4, '569a39d948cf9.jpg', ''),
(5, '569a3b6182941.jpg', ''),
(6, '569a3c20d09c8.jpg', ''),
(7, '569a4579c73be.jpg', ''),
(8, '569a4661ee1ea.jpg', ''),
(9, '569a47696e8a8.jpg', ''),
(10, '569a498516136.jpg', ''),
(11, '569a4b297c040.jpg', ''),
(12, '569a4c3fa694f.jpg', ''),
(13, '569a4dc4ed2e8.jpg', ''),
(14, '569a4ea4acf0a.jpg', ''),
(15, '569a4f8ad3fed.jpg', ''),
(16, '569a50b811e67.jpg', ''),
(17, '569a51a6caafb.jpg', ''),
(18, '569a5296216e6.jpg', ''),
(19, '569a5387dfde4.jpg', ''),
(20, '569a54e339c27.jpg', ''),
(21, '569a55c448719.jpg', ''),
(22, '569a567d2bf8b.jpg', ''),
(23, '569a5793c99fa.jpg', ''),
(24, '569a588a4cd90.jpg', ''),
(25, '569a59418731b.jpg', ''),
(26, '569a59e447bba.jpg', ''),
(27, '569a5acd29f98.jpg', ''),
(28, '569a5c6c58d3e.jpg', ''),
(29, '569a5d3a2668c.jpg', ''),
(30, '569a5e13929e8.jpg', ''),
(31, '569a5eca8272b.jpg', ''),
(32, '569a5f9ba0382.jpg', ''),
(33, '569a606b9d5f1.jpg', ''),
(34, '569a618ec1685.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `ID_lieu` int(11) NOT NULL,
  `Departement` int(25) NOT NULL,
  `Ville` varchar(25) NOT NULL,
  `Nom_Lieu` varchar(25) NOT NULL,
  `Pays` varchar(25) NOT NULL,
  `Code_Postal` int(11) NOT NULL,
  `evenement_ID_Eve` int(11) NOT NULL,
  `Adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`ID_lieu`, `Departement`, `Ville`, `Nom_Lieu`, `Pays`, `Code_Postal`, `evenement_ID_Eve`, `Adresse`) VALUES
(1, 31, 'BRUGUIERES', '', '', 0, 1, 'LE BASCALA, BRUGUIÈRES : programmation, billet, place, infos LE BASCALA 12 rue de la Briqueterie '),
(2, 44, 'NANTES', '', '', 0, 2, 'STEREOLUX, NANTES : programmation, billet, place, infos Stereolux 4 Bd Leon Bureau'),
(3, 75, 'PARIS', '', '', 0, 3, 'LA BOULE NOIRE, PARIS : programmation, billet, place, infos La Boule Noire 120 Boulevard de Rochechouart 75018'),
(4, 57, 'FREYMING MERLEBACH', '', '', 0, 4, 'THEATRE DE LA MEDIATHEQUE, FREYMING MERLEBACH : programmation, billet, place, infos Théâtre de la médiathèque 21 rue de la Croix 57800 '),
(5, 57, 'Metz', '', '', 0, 5, 'LES ARENES DE METZ : programmation, billet, place, infos Les Arènes de Metz 5, avenue Louis Le Débonnaire 57000 '),
(6, 75, 'PARIS', '', '', 0, 6, 'CITE DE LA MUSIQUE - PHILHARMONIE 2, PARIS : programmation, billet, place, infos Cité de la musique - Philharmonie 2 221 Avenue Jean Jaures 75019 '),
(7, 13, 'MARSEILLE', '', '', 0, 7, 'LE DOCK DES SUDS, MARSEILLE : programmation, billet, place, infos Le Dock des Suds 12 rue Urbain V 13002 '),
(8, 59, 'Tourcoing', '', '', 0, 8, 'LE GRAND MIX, Tourcoing : programmation, billet, place, infos Le Grand Mix 5 place Notre Dame 59200 '),
(9, 75, 'PARIS', '', '', 0, 9, 'PARC FLORAL, PARIS : programmation, billet, place, infos Parc Floral Route de la Pyramide 75012 '),
(10, 13, 'Arles', '', '', 0, 10, 'CARGO DE NUIT, Arles : programmation, billet, place, infos Cargo de nuit 7, Avenue Sadi Carnot 13200 '),
(11, 69, 'LYON', '', '', 0, 11, 'HALLE TONY GARNIER, LYON : programmation, billet, place, infos Halle Tony Garnier 20 place docteurs Merieux 69007'),
(12, 75, 'PARIS', '', '', 0, 12, 'LE REX CLUB, PARIS : programmation, billet, place, infos Le Rex Club 5, BD Poissonniere 75002 '),
(13, 35, ' BRETAGNE', '', '', 0, 13, 'SALLE DES FETES, BAIN DE BRETAGNE : programmation, billet, place, infos salle des fêtes la croix rouge 35470 BAIN DE BRETAGNE'),
(14, 29, 'Brest', '', '', 0, 14, 'LA CARENE, Brest : programmation, billet, place, infos LA CARENE 30 rue Jean Marie Le Bris 29200 '),
(15, 75, 'PARIS', '', '', 0, 15, 'AUDITORIUM - CARREAU DU TEMPLE, PARIS : programmation, billet, place, infos AUDITORIUM - CARREAU DU TEMPLE 2 RUE EUGENE SPULLER 75003 '),
(16, 75, 'PARIS', '', '', 0, 16, 'EGLISE ALLEMANDE, PARIS : programmation, billet, place, infos Eglise Allemande 25 rue Blanche 75009 '),
(17, 59, 'Saint-Andre-lez-Lille', '', '', 0, 17, 'SALLE ANDRE WAUQUIER, Saint-André-lez-Lille : programmation, billet, place, infos Salle André Wauquier 65 rue du Général Leclerc 59350 '),
(18, 1, 'SAINT VULBAS', '', '', 0, 18, 'CENTRE INTERNATIONAL SAINT VULBAS : programmation, billet, place, infos Centre International Saint Vulbas 1558, rue Claires fontaines 01150 '),
(19, 75, 'PARIS', '', '', 0, 19, 'MUSEE D''ORSAY, PARIS : programmation, billet, place, infos Musée d''Orsay 1, rue de la Legion d''Honneur 75007 '),
(20, 75, 'PARIS', '', '', 0, 20, 'MUSEE DE L''ARMEE, PARIS : programmation, billet, place, infos     Musée de l''Armée     Hotel national des Invalides - 129 rue de Grenelle     75007 '),
(21, 13, 'Marseille', '', '', 0, 21, 'STADE VELODROME, Marseille : programmation, billet, place, infos Stade Vélodrome Bd Michelet 13008 '),
(22, 59, 'LILLE', '', '', 0, 22, 'STADE PIERRE MAUROY, LILLE : programmation, billet, place, infos Stade Pierre Mauroy 261, Boulevard de Tournai 59000 '),
(23, 83, ' Le Castellet', '', '', 0, 23, 'CIRCUIT PAUL RICARD, Le Castellet  : programmation, billet, place, infos Circuit Paul Ricard 2760 Route des Hauts du Camp 83330'),
(24, 31, 'TOULOUSE', '', '', 0, 24, 'SALLE PIERRE MONTANE, TOULOUSE : programmation, billet, place, infos Salle pierre Montané 5 avenue Raymond Badiou 31300 '),
(25, 92, 'NANTERRE', '', '', 0, 25, 'PALAIS DES SPORTS DE NANTERRE : programmation, billet, place, infos Palais Des Sports de Nanterre 136 avenue Joliot-Curie 92000 '),
(26, 13, 'Marseille', '', '', 0, 26, 'PALAIS DES SPORTS, Marseille : programmation, billet, place, infos Palais des Sports 81 rue Raymond Teisseire 13009 '),
(27, 7, 'Montanet', '', '', 0, 27, 'Le lieu SAFARI DE PEAUGRES : programmation, billet, place, infos SAFARI DE PEAUGRES 07340 '),
(28, 84, 'MONTFAVET', '', '', 0, 28, 'PARC DES EXPOSITIONS - CHATEAUBLANC, MONTFAVET : programmation, billet, place, infos PARC DES EXPOSITIONS - CHATEAUBLANC RN7 84140'),
(29, 75, 'PARIS', '', '', 0, 29, 'CULTIVAL, PARIS : programmation, billet, place, infos CULTIVAL Coffrets cadeaux 75002 '),
(30, 75, 'PARIS', '', '', 0, 30, 'CULTIVAL, PARIS : programmation, billet, place, infos CULTIVAL Coffrets cadeaux 75002 '),
(31, 75, 'PARIS', '', '', 0, 31, 'LA GEODE, Paris : programmation, billet, place, infos La Géode 26, avenue Corentin Cariou 75019 '),
(32, 86, ' Romagne', '', '', 0, 32, 'LA VALLEE DES SINGES, Romagne : programmation, billet, place, infos La Vallée des Singes Le Gureau 86700'),
(34, 75, 'PARIS', '', '', 0, 34, 'APOLLO THEATRE, PARIS : programmation, billet, place, infos APOLLO THEATRE 18, rue du Faubourg du Temple 75011 ');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `Login` varchar(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Adresse` varchar(500) NOT NULL,
  `Ville` varchar(25) NOT NULL,
  `Region` varchar(25) NOT NULL,
  `Sexe` char(1) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `Mot_de_passe` char(7) NOT NULL,
  `Date_d_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Type` tinyint(1) NOT NULL COMMENT 'Utilisateur Administrateur/Normal',
  `Photo_profil` text NOT NULL,
  `centre_interet` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`Login`, `Nom`, `Prenom`, `Date_naissance`, `Adresse`, `Ville`, `Region`, `Sexe`, `E_mail`, `Mot_de_passe`, `Date_d_inscription`, `Type`, `Photo_profil`, `centre_interet`) VALUES
('ltutileni', 'Tutileni', 'Leonia', '1990-03-08', '37 rue Georges Clemenceau Residence de CROUS Rene Thon', 'Montbeliard', '04', 'H', 'leoniatutileni1992@hotmail.com', 'simao90', '2016-01-16 11:12:19', 0, '569a259303886.', 'CLUBBING'),
('pleo', 'PEDRO', 'Leonardo', '1990-03-08', '37 rue Georges Clemenceau Residence de CROUS Rene Thon 37 rue Georges Clemenceau Residence de CROUS Rene Thon 37 rue Georges Clemenceau Residence de CROUS Rene Thon 37 rue Georges Clemenceau Residence de CROUS Rene Thon', 'Montbeliard', '04', 'H', 'leoniatutileni1992@hotmail.com', 'simao91', '2016-01-16 11:12:19', 0, ' ', 'Sport'),
('spedro', 'PEDRO', 'Simao', '1992-03-09', '8 rue Francis de croissert 75018 Residence de CROUS', 'Paris', '08', 'H', 'simaopedro1992@hotmail.com', 'simao92', '2016-01-16 10:49:07', 1, '569a20231fa17.jpeg', 'Concert'),
('ttoto', 'Toto', 'Tata', '1990-03-16', '9 rue Francis de croissert 75015 Residence de CROUS', 'Paris', '08', 'H', 'tatatoto1990@hotmail.com', 'toto199', '2016-01-17 19:27:31', 0, '569beb23175dd.jpg', 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `Id_message` int(11) NOT NULL,
  `Message` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

CREATE TABLE `noter` (
  `evenement_ID_Eve` int(11) NOT NULL,
  `membre_Login` varchar(25) NOT NULL,
  `Note` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sous_theme`
--

CREATE TABLE `sous_theme` (
  `Id_sous_theme` int(11) NOT NULL,
  `Libelle_sous_theme` varchar(25) NOT NULL,
  `sujet_Id_sujet` int(11) NOT NULL,
  `sujet_message_Id_message` int(11) NOT NULL,
  `theme_Id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

CREATE TABLE `sponsor` (
  `ID_sponsor` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sponsor`
--

INSERT INTO `sponsor` (`ID_sponsor`, `Nom`) VALUES
(1, 'Le bikini / Patricia Sans'),
(2, 'O Spectacles'),
(3, 'GDP'),
(4, 'Office Municipal de la cu'),
(5, 'Label LN'),
(6, ' PIANO 4 ETOILES'),
(7, 'LES MERRY PRANKSTERS'),
(8, 'ONLY YOU'),
(9, ' WE LOVE ART'),
(10, 'Andromède'),
(11, 'TROIS S'),
(12, 'REX CLUB'),
(13, 'productions schmoulbrouks'),
(14, 'Astropolis'),
(15, 'SPL DU CARREAU DU TEMPLE'),
(16, 'SARL D2C PRODUCTION ET MA'),
(17, 'PELLEAS'),
(18, 'Printemps de Pérouges'),
(19, ' Musée d''Orsay'),
(20, 'MUSEE DE L''ARMEE'),
(21, 'Olympique de Marseille'),
(22, ' LOSC LILLE'),
(23, 'Circuit Paul Ricard'),
(24, 'Boxing Toulouse Bagatelle'),
(25, 'JSF Nanterre Basket'),
(26, 'Ticketnet'),
(27, 'SAFARI DE PEAUGRES'),
(28, 'Adam Concerts'),
(29, 'Cultival CGOS + Digitick.'),
(30, 'Cultival CGOS + Digitick.'),
(31, 'La Geode'),
(32, ' La Vallée des Singes'),
(34, 'APOLLO THEATRE');

-- --------------------------------------------------------

--
-- Structure de la table `sponsorise`
--

CREATE TABLE `sponsorise` (
  `sponsor_ID_sponsor` int(11) NOT NULL,
  `evenement_ID_Eve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sponsorise`
--

INSERT INTO `sponsorise` (`sponsor_ID_sponsor`, `evenement_ID_Eve`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(34, 34);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `Id_sujet` int(11) NOT NULL,
  `Titre` varchar(25) NOT NULL,
  `Sous_titre` varchar(25) NOT NULL,
  `message_Id_message` int(11) NOT NULL,
  `membre_Login` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `s_inscrit`
--

CREATE TABLE `s_inscrit` (
  `evenement_ID_Eve` int(11) NOT NULL,
  `membre_Login` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `Id_tag` int(11) NOT NULL,
  `Tag` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `Id_theme` int(11) NOT NULL,
  `Libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `Id_video` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`Id_Audio`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Index pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`evenement_ID_Eve`,`membre_Login`),
  ADD KEY `fk_evenement_has_membre_membre1_idx` (`membre_Login`),
  ADD KEY `fk_evenement_has_membre_evenement1_idx` (`evenement_ID_Eve`);

--
-- Index pour la table `contient_tag`
--
ALTER TABLE `contient_tag`
  ADD PRIMARY KEY (`message_Id_message`,`tag_Id_tag`),
  ADD KEY `fk_message_has_tag_tag1_idx` (`tag_Id_tag`),
  ADD KEY `fk_message_has_tag_message1_idx` (`message_Id_message`);

--
-- Index pour la table `est_illustre`
--
ALTER TABLE `est_illustre`
  ADD PRIMARY KEY (`evenement_ID_Eve`),
  ADD KEY `fk_est_illustre_audio_idx` (`audio_Id_Audio`),
  ADD KEY `fk_est_illustre_images1_idx` (`images_Id_image`),
  ADD KEY `fk_est_illustre_video1_idx` (`video_Id_video`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`ID_Eve`,`membre_Login`,`categories_ID_categorie`),
  ADD KEY `fk_evenement_membre1_idx` (`membre_Login`),
  ADD KEY `fk_evenement_categories1_idx` (`categories_ID_categorie`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`Id_image`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`ID_lieu`),
  ADD KEY `fk_lieu_evenement1_idx` (`evenement_ID_Eve`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`Login`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id_message`);

--
-- Index pour la table `noter`
--
ALTER TABLE `noter`
  ADD PRIMARY KEY (`evenement_ID_Eve`,`membre_Login`),
  ADD KEY `fk_evenement_has_membre_membre3_idx` (`membre_Login`),
  ADD KEY `fk_evenement_has_membre_evenement3_idx` (`evenement_ID_Eve`);

--
-- Index pour la table `sous_theme`
--
ALTER TABLE `sous_theme`
  ADD PRIMARY KEY (`Id_sous_theme`,`sujet_Id_sujet`,`sujet_message_Id_message`,`theme_Id_theme`),
  ADD KEY `fk_sous_theme_sujet1_idx` (`sujet_Id_sujet`,`sujet_message_Id_message`),
  ADD KEY `fk_sous_theme_theme1_idx` (`theme_Id_theme`);

--
-- Index pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`ID_sponsor`);

--
-- Index pour la table `sponsorise`
--
ALTER TABLE `sponsorise`
  ADD PRIMARY KEY (`sponsor_ID_sponsor`,`evenement_ID_Eve`),
  ADD KEY `fk_sponsor_has_evenement_evenement1_idx` (`evenement_ID_Eve`),
  ADD KEY `fk_sponsor_has_evenement_sponsor1_idx` (`sponsor_ID_sponsor`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`Id_sujet`,`message_Id_message`,`membre_Login`),
  ADD KEY `fk_sujet_message1_idx` (`message_Id_message`),
  ADD KEY `fk_sujet_membre1_idx` (`membre_Login`);

--
-- Index pour la table `s_inscrit`
--
ALTER TABLE `s_inscrit`
  ADD PRIMARY KEY (`evenement_ID_Eve`,`membre_Login`),
  ADD KEY `fk_evenement_has_membre_membre2_idx` (`membre_Login`),
  ADD KEY `fk_evenement_has_membre_evenement2_idx` (`evenement_ID_Eve`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`Id_tag`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`Id_theme`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`Id_video`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `audio`
--
ALTER TABLE `audio`
  MODIFY `Id_Audio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID_Eve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `Id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `ID_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `Id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sous_theme`
--
ALTER TABLE `sous_theme`
  MODIFY `Id_sous_theme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `ID_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `Id_sujet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `Id_tag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `Id_theme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `Id_video` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `fk_evenement_has_membre_evenement1` FOREIGN KEY (`evenement_ID_Eve`) REFERENCES `evenement` (`ID_Eve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_has_membre_membre1` FOREIGN KEY (`membre_Login`) REFERENCES `membre` (`Login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contient_tag`
--
ALTER TABLE `contient_tag`
  ADD CONSTRAINT `fk_message_has_tag_message1` FOREIGN KEY (`message_Id_message`) REFERENCES `message` (`Id_message`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_has_tag_tag1` FOREIGN KEY (`tag_Id_tag`) REFERENCES `tag` (`Id_tag`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `est_illustre`
--
ALTER TABLE `est_illustre`
  ADD CONSTRAINT `fk_est_illustre_audio` FOREIGN KEY (`audio_Id_Audio`) REFERENCES `audio` (`Id_Audio`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_est_illustre_evenement1` FOREIGN KEY (`evenement_ID_Eve`) REFERENCES `evenement` (`ID_Eve`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_est_illustre_images1` FOREIGN KEY (`images_Id_image`) REFERENCES `images` (`Id_image`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_est_illustre_video1` FOREIGN KEY (`video_Id_video`) REFERENCES `video` (`Id_video`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_evenement_categories1` FOREIGN KEY (`categories_ID_categorie`) REFERENCES `categories` (`ID_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_membre1` FOREIGN KEY (`membre_Login`) REFERENCES `membre` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `fk_lieu_evenement1` FOREIGN KEY (`evenement_ID_Eve`) REFERENCES `evenement` (`ID_Eve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `fk_evenement_has_membre_evenement3` FOREIGN KEY (`evenement_ID_Eve`) REFERENCES `evenement` (`ID_Eve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_has_membre_membre3` FOREIGN KEY (`membre_Login`) REFERENCES `membre` (`Login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sous_theme`
--
ALTER TABLE `sous_theme`
  ADD CONSTRAINT `fk_sous_theme_sujet1` FOREIGN KEY (`sujet_Id_sujet`,`sujet_message_Id_message`) REFERENCES `sujet` (`Id_sujet`, `message_Id_message`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sous_theme_theme1` FOREIGN KEY (`theme_Id_theme`) REFERENCES `theme` (`Id_theme`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sponsorise`
--
ALTER TABLE `sponsorise`
  ADD CONSTRAINT `fk_sponsor_has_evenement_evenement1` FOREIGN KEY (`evenement_ID_Eve`) REFERENCES `evenement` (`ID_Eve`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sponsor_has_evenement_sponsor1` FOREIGN KEY (`sponsor_ID_sponsor`) REFERENCES `sponsor` (`ID_sponsor`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `fk_sujet_membre1` FOREIGN KEY (`membre_Login`) REFERENCES `membre` (`Login`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sujet_message1` FOREIGN KEY (`message_Id_message`) REFERENCES `message` (`Id_message`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `s_inscrit`
--
ALTER TABLE `s_inscrit`
  ADD CONSTRAINT `fk_evenement_has_membre_evenement2` FOREIGN KEY (`evenement_ID_Eve`) REFERENCES `evenement` (`ID_Eve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_has_membre_membre2` FOREIGN KEY (`membre_Login`) REFERENCES `membre` (`Login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

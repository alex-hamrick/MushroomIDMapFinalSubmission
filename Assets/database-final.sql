-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 05:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexh189_bird`
-- Username: FinalUser  Password: FinalUser123
-- Username: FinalAdmin Password: FinalAdmin123
-- Username: root Password: ""
--
CREATE DATABASE IF NOT EXISTS `alexh189_bird` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `alexh189_bird`;

-- --------------------------------------------------------

--
-- Table structure for table `image_img`
--

DROP TABLE IF EXISTS `image_img`;
CREATE TABLE `image_img` (
  `id_img` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `id_mshm` int(11) NOT NULL,
  `image_name_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_img`
--

INSERT INTO `image_img` (`id_img`, `id_sub`, `id_mshm`, `image_name_img`) VALUES
(23, 0, 30, 'id_30_520210_Agaricus_augustus_2011_G1.jpg'),
(24, 0, 30, 'id_30_520210_Agaricus_augustus_The_Prince.jpg'),
(25, 0, 31, 'id_31_520210_Amanita_phalloides_2011_G3.jpg'),
(26, 0, 31, 'id_31_520210_Amanita_phalloides_young.jpg'),
(27, 54, 32, 'id_54_sub_520211_Morchella_americana_66730853.jpg'),
(28, 54, 32, 'id_54_sub_520211_Morchella_americana_66730870.jpg'),
(29, 0, 32, 'id_32_520211_Morel_group.jpg'),
(30, 0, 32, 'id_32_520211_1024px-Morchella_americana_69515767.jpg'),
(31, 55, 34, 'id_55_sub_520211_1024px-Cantharellus_cibarius_102451882.jpg'),
(32, 55, 34, 'id_55_sub_520211_1024px-Cantharellus_cibarius_102451892.jpg'),
(33, 56, 34, 'id_56_sub_520211_1024px-Cantharellus_cibarius_95990053.jpg'),
(34, 56, 34, 'id_56_sub_520211_1024px-Cantharellus_cibarius_55979173.jpg'),
(35, 0, 33, 'id_33_520211_1024px-Chanterelle.jpg'),
(36, 0, 33, 'id_33_520211_Cantharellus_cibarius_2009_G4.jpg'),
(37, 0, 34, 'id_34_520211_1024px-Chanterelle.jpg'),
(38, 0, 34, 'id_34_520211_Cantharellus_cibarius_2009_G4.jpg'),
(39, 0, 35, 'id_35_520211_1024px-Grifola_frondosa_2014_G2.jpg'),
(40, 0, 35, 'id_35_520211_1024px-Grifola_frondosa_2014_G1.jpg'),
(41, 0, 36, 'id_36_520211_1024px-Trametes_versicolor_93075730.jpg'),
(42, 0, 36, 'id_36_520211_1024px-Turkey_tail_Fungus._(41856600312).jpg'),
(43, 0, 37, 'id_37_520211_1280px-Chicken_of_the_Woods_Laetiporus_sulphureus.jpg'),
(44, 0, 37, 'id_37_520211_1024px-20160926_Elfenbankje_Hoenderloo.jpg'),
(45, 0, 38, 'id_38_520211_1024px-Hericium_erinaceus_104664221.jpg'),
(46, 0, 38, 'id_38_520211_1024px-Lions_Mane_Mushroom_Durham_NC.jpg'),
(47, 0, 39, 'id_39_520211_1024px-Coprinus_comatus_103573533.jpg'),
(48, 0, 39, 'id_39_520211_1024px-Coprinus_comatus_102781302.jpg'),
(49, 0, 40, 'id_40_520211_1024px-Hericium_coralloides._(12427390323).jpg'),
(50, 0, 40, 'id_40_520211_1024px-Hericium_coralloides_Avala.jpg'),
(51, 0, 41, 'id_41_520211_Pleurotus_ostreatus_109117645.jpg'),
(52, 0, 41, 'id_41_520211_Pleurotus_ostreatus_103128460.jpg'),
(53, 57, 39, 'id_57_sub_520211_1024px-20171031Coprinus_comatus.jpg'),
(54, 57, 39, 'id_57_sub_520211_1024px-20171027Coprinus_comatus6.jpg'),
(55, 58, 32, 'id_58_sub_520211_1024px-Morchella_americana_67632986.jpg'),
(56, 58, 32, 'id_58_sub_520211_Morel_mushroom_growing_in_a_forest.jpg'),
(57, 59, 36, 'id_59_sub_520211_1024px-Trametes_versicolor_95688328.jpg'),
(58, 59, 36, 'id_59_sub_520211_1024px-Trametes_versicolor_105537199.jpg'),
(59, 60, 0, 'id_60_sub_520211_1024px-Amanita_muscaria_2018_G04.jpg'),
(60, 60, 0, 'id_60_sub_520211_1024px-Amanita_muscaria_2018_G01.jpg'),
(61, 61, 0, 'id_61_sub_520211_1024px-AD2009Sep20_Amanita_muscaria_02.jpg'),
(62, 61, 0, 'id_61_sub_520211_1024px-AD2009Sep15_Amanita_muscaria_var._muscaria_02.jpg'),
(63, 62, 0, 'id_62_sub_520211_1024px-Amanita_muscaria_in_Sweden.jpg'),
(64, 62, 0, 'id_62_sub_520211_1024px-Amanita_muscaria23.jpg'),
(65, 63, 37, 'id_63_sub_520211_1024px-Laetiporus_sulphureus_2010_G1.jpg'),
(66, 63, 37, 'id_63_sub_520211_1024px-Laetiporus_sulphureus_1.jpg'),
(67, 64, 34, 'id_64_sub_520212_1024px-Cantharellus_cinnabarinus_97341526.jpg'),
(68, 64, 34, 'id_64_sub_520212_1024px-Red_Chanterelle_Durham_NC.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mushroom_mshm`
--

DROP TABLE IF EXISTS `mushroom_mshm`;
CREATE TABLE `mushroom_mshm` (
  `id_mshm` int(11) NOT NULL,
  `latin_name_mshm` varchar(50) NOT NULL,
  `common_name_mshm` varchar(50) NOT NULL,
  `description_mshm` text NOT NULL,
  `wiki_link_mshm` varchar(100) NOT NULL,
  `edible_mshm` tinyint(1) NOT NULL,
  `edible_description_mshm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mushroom_mshm`
--

INSERT INTO `mushroom_mshm` (`id_mshm`, `latin_name_mshm`, `common_name_mshm`, `description_mshm`, `wiki_link_mshm`, `edible_mshm`, `edible_description_mshm`) VALUES
(30, 'Agaricus augustus', 'The Prince', 'The fruiting bodies of Agaricus augustus are large and distinctive agarics. The cap shape is hemispherical during the so-called button stage, and then expands, becoming convex and finally flat, with a diameter of up to 22 cm (8.7 in). The cap cuticle is dry, and densely covered with concentrically arranged, brown-coloured scales on a white to yellow background.\r\n\r\nThe flesh is thick, firm and white and may discolour yellow when bruised. The gills are crowded and pallid at first, and turn pink then dark brown with maturity. The gills are not attached to the stem — they are free. Immature specimens bear a delicate white partial veil with darker-coloured warts, extending from the stem to the cap periphery.\r\n\r\nThe stem is clavate up to 20 cm (7.9 in) tall, and 4 cm (1.6 in) thick. In mature specimens, the partial veil is torn and left behind as a pendulous ring adorning the stem. Above the ring, the stem is white to yellow and smooth. Below, it is covered with numerous small scales. Its flesh is thick, white and sometimes has a narrow central hollow. The stem base extends deeply into the substrate.\r\n\r\nThe mushroom\'s odour is strong and nutty, of anise or almonds, which can be associated with the presence of benzaldehyde and benzyl alcohol. Its taste has been described as not distinctive.\r\n\r\nUnder a microscope, the ellipsoid-shaped spores are seen characteristically large at 7–10 by 4.5–6.5 μm. The basidia are 4-spored. The spore mass is coloured chocolate-brown.\r\n\r\nA species initially reported from North America, A. subrufescens closely resembles A. augustus in appearance. However, A. subrufescens produces smaller spores, sized 6–7.5 by 4–5 µm', 'https://en.wikipedia.org/wiki/Agaricus_augustus', 2, ''),
(31, 'Amanita phalloides', 'Death Cap', 'Amanita phalloides, commonly known as the death cap, is a deadly poisonous basidiomycete fungus, one of many in the genus Amanita. Widely distributed across Europe, but now sprouting in other parts of the world, A. phalloides forms ectomycorrhizas with various broadleaved trees. In some cases, the death cap has been introduced to new regions with the cultivation of non-native species of oak, chestnut, and pine. The large fruiting bodies (mushrooms) appear in summer and autumn; the caps are generally greenish in color with a white stipe and gills. Cap color is variable, including white forms, and thus not a reliable identifier.\r\n\r\nThese toxic mushrooms resemble several edible species (most notably Caesar\'s mushroom and the straw mushroom) commonly consumed by humans, increasing the risk of accidental poisoning. Amatoxins, the class of toxins found in these mushrooms, are thermostable: they resist changes due to heat, so their toxic effects are not reduced by cooking.\r\n\r\nAmanita phalloides is one of the most poisonous of all known mushrooms. It is estimated that as little as half a mushroom contains enough toxin to kill an adult human. It has been involved in the majority of human deaths from mushroom poisoning, possibly including the deaths of Roman Emperor Claudius in AD 54 and Holy Roman Emperor Charles VI in 1740. It has been the subject of much research and many of its biologically active agents have been isolated. The principal toxic constituent is α-amanitin, which damages the liver and kidneys, causing liver and kidney failure that can be fatal.', 'https://en.wikipedia.org/wiki/Amanita_phalloides', 4, ''),
(32, 'Morchella americana', 'Morel', 'Morchella americana is a species of fungus in the family Morchellaceae native to North America. Described as new to science in 2012, it is common east of the Rocky Mountains in a range stretching from Ontario south to Texas, Arkansas, Alabama, Georgia and South Carolina. In western North America, the species typically is found under hardwood, especially cottonwood trees in river bottoms, or with apple trees or ornamental ashes in urban settings. The specific epithet americana refers to its occurrence in North America.\r\n\r\nIn the Great Lakes region of eastern North America, the range of M. americana overlaps with M. cryptica, which cannot be reliably distinguished from M. americana without DNA sampling.\r\n\r\nMorchella americana, identified as phylogenetic species \"Mes-4\", has also been found in Turkey, France, and Germany, but is suspected of having been introduced there from North America.', 'https://en.wikipedia.org/wiki/Morchella_americana', 2, ''),
(34, 'Cantharellus cibarius', 'Chanterelle', 'Cantharellus cibarius (Latin: cantharellus, \"chanterelle\"; cibarius, \"culinary\") is a species of golden chanterelle mushroom in the genus Cantharellus. It is also known as girolle (or girole). It grows in Europe from Scandinavia to the Mediterranean Basin, mainly in deciduous and coniferous forests. Due to its characteristic color and shape, it is easy to distinguish from mushrooms with potential toxicity that discourage human consumption. A commonly eaten and favored mushroom, the chanterelle is typically harvested from late summer to late fall in its European distribution.\r\n\r\nChanterelles are used in many culinary dishes, and can be preserved by either drying or freezing. An oven should not be used when drying it because can result in the mushroom becoming bitter.', 'https://en.wikipedia.org/wiki/Cantharellus_cibarius', 2, ''),
(35, 'Grifola frondosa', 'Hen of the woods', 'Like the sulphur shelf mushroom, G. frondosa is a perennial fungus that often grows in the same place for a number of years in succession. It occurs most prolifically in the northeastern regions of the United States, but has been found as far west as Idaho.\r\nG. frondosa grows from an underground tuber-like structure known as a sclerotium, about the size of a potato. The fruiting body, occurring as large as 100 centimetres (40 inches), rarely 150 cm (60 in), is a cluster consisting of multiple grayish-brown caps which are often curled or spoon-shaped, with wavy margins and 2–10 cm (1–4 in) broad.[3] The undersurface of each cap bears about one to three pores per millimeter, with the tubes rarely deeper than 3 mm (1⁄8 in). The milky-white stipe (stalk) has a branchy structure and becomes tough as the mushroom matures.\r\n\r\nIn Japan, the maitake can grow to more than 45 kilograms (100 pounds), earning this giant mushroom the title \"king of mushrooms\". ', 'https://en.wikipedia.org/wiki/Grifola_frondosa', 2, ''),
(36, 'Trametes versicolor', 'Turkey tail', 'Trametes versicolor – also known as Coriolus versicolor and Polyporus versicolor – is a common polypore mushroom found throughout the world. Meaning \'of several colors\', versicolor reliably describes this fungus that displays different colors. For example, because its shape and multiple colors are similar to those of a wild turkey, T. versicolor is commonly called turkey tail. A similar looking mushroom, commonly called false turkey tail, which is from a different order, may sometimes be confused with the turkey tail mushroom due to appearance. Another lookalike is the multicolor gill polypore.\r\nThe top surface of the cap shows typical concentric zones of different colors, and the margin is always the lightest. The flesh is 1–3 mm thick and has leathery texture. Older specimens, such as the one pictured, can have zones with green algae growing on them, thus appearing green. It commonly grows in tiled layers on in groups or rows on logs and stumps of deciduous trees, and is very common in North America. The mushroom is stalkless and the cap is rust-brown or darker brown, sometimes with blackish zones. The cap is flat, up to 8 × 5 x 0.5–1 cm in area. It is often triangular or round, with zones of fine hairs. The pore surface is whitish to light brown, with pores round and with age twisted and labyrinthine. 3–8 pores per millimeter.\r\n\r\nIt may be eaten by caterpillars of the fungus moth Nemaxera betulinella and by maggots of the Platypezid fly Polyporivora picta. and the fungus gnat Mycetophila luctuosa, but is considered inedible to humans.', 'https://en.wikipedia.org/wiki/Trametes_versicolor', 3, ''),
(37, 'Laetiporus', 'Chicken of the woods', 'Laetiporus is a genus of edible mushrooms found throughout much of the world. Some species, especially Laetiporus sulphureus, are commonly known as sulphur shelf, chicken of the woods, the chicken mushroom, or the chicken fungus because many think they taste like chicken. The name \"chicken of the woods\" is not to be confused with another edible polypore, Maitake (Grifola frondosa) known as \"hen of the woods\", or with Lyophyllum decastes, known as the \"fried chicken mushroom\". The name Laetiporus means \"with bright pores\".\r\nIndividual \"shelves\" range from 5 to 25 cm (2 to 10 inches) across. These shelves are made up of many tiny tubular filaments (hyphae). The mushroom grows in large brackets – some have been found that weigh over 45 kg (100 pounds). It is most commonly found on wounds of trees, mostly oak, though it is also frequently found on eucalyptus, yew, sweet chestnut, and willow, as well as conifers in some species. Laetiporus species are parasitic and produce brown rot in the host on which they grow.\r\n\r\nYoung fruiting bodies are characterized by a moist, rubbery, sulphur-yellow to orange body sometimes with bright orange tips. Older brackets become pale and brittle almost chalk-like, mildly pungent, and are often dotted with beetle or slug/woodlouse holes. Similar species include Laetiporus gilbertsonii (fluorescent pink, more amorphous) and L. coniferica (common in the western United States, especially on red fir trees). Edibility traits for the different species have not been well documented, although all are generally considered edible with caution', 'https://en.wikipedia.org/wiki/Laetiporus', 2, ''),
(38, 'Hericium erinaceus', 'Lion\'s mane', 'Hericium erinaceus (also called lion\'s mane mushroom, monkey head mushroom, bearded tooth mushroom, satyr\'s beard, bearded hedgehog mushroom, pom pom mushroom, or bearded tooth fungus) is an edible mushroom belonging to the tooth fungus group. Native to North America, Europe and Asia, it can be identified by its long spines (greater than 1 cm length), occurrence on hardwoods, and tendency to grow a single clump of dangling spines. The fruit bodies can be harvested for culinary use. There is no high-quality evidence from clinical research to indicate that lion\'s mane mushroom has medicinal properties.\r\n\r\nHericium erinaceus can be mistaken for other species of Hericium, which grow across the same range. In the wild, these mushrooms are common during late summer and fall on hardwoods, particularly American beech. Usually H. erinaceus is considered saprophytic, as it mostly feeds on dead trees. However, it can also be found on living trees, so may be a tree parasite as well. This could indicate an endophytic habitat.', 'https://en.wikipedia.org/wiki/Hericium_erinaceus', 2, ''),
(39, 'Coprinus comatus', 'Shaggy mane', 'Coprinus comatus, the shaggy ink cap, lawyer\'s wig, or shaggy mane, is a common fungus often seen growing on lawns, along gravel roads and waste areas. The young fruit bodies first appear as white cylinders emerging from the ground, then the bell-shaped caps open out. The caps are white, and covered with scales—this is the origin of the common names of the fungus. The gills beneath the cap are white, then pink, then turn black and secrete a black liquid filled with spores (hence the \"ink cap\" name). This mushroom is unusual because it will turn black and dissolve itself in a matter of hours after being picked or depositing spores.\r\n\r\nWhen young it is an excellent edible mushroom provided that it is eaten soon after being collected (it keeps very badly because of the autodigestion of its gills and cap). If long-term storage is desired, microwaving, sauteing or simmering until limp will allow the mushrooms to be stored in a refrigerator for several days or frozen. Also, placing the mushrooms in a glass of ice water will delay the decomposition for a day or two so that one has time to incorporate them into a meal. Processing or icing must be done whether for eating or storage within four to six hours of harvest to prevent undesirable changes to the mushroom. The species is cultivated in China as food.\r\n\r\nThe mushroom can sometimes be confused with the magpie fungus which is poisonous. In America, the \'vomiter\' mushroom Chlorophyllum molybdites is responsible for most cases of mushroom poisoning due to its similarity with shaggy mane and other edible mushrooms', 'https://en.wikipedia.org/wiki/Coprinus_comatus', 2, ''),
(40, 'Hericium coralloides', 'Coral tooth fungus', 'Hericium coralloides is a saprotrophic fungus, commonly known as the coral tooth fungus. It grows on dead hardwood trees. The species is edible and good when young, but as it ages the branches and hanging spines become brittle and turn a light shade of yellowish brown. The Māori name for this species is pekepekekiore.\r\n\r\nThe mushroom is also featured on a 2010 stamp from Belarus and a 2002 stamp from New Zealand.', 'https://en.wikipedia.org/wiki/Hericium_coralloides', 2, ''),
(41, 'Pleurotus ostreatus', 'Oyster mushroom', 'Pleurotus ostreatus, the oyster mushroom or oyster fungus, is a common edible mushroom. It was first cultivated in Germany as a subsistence measure during World War I and is now grown commercially around the world for food. It is related to the similarly cultivated king oyster mushroom. Oyster mushrooms can also be used industrially for mycoremediation purposes.\r\n\r\nThe oyster mushroom is one of the more commonly sought wild mushrooms, though it can also be cultivated on straw and other media. It has the bittersweet aroma of benzaldehyde (which is also characteristic of bitter almonds).\r\nThe mushroom has a broad, fan or oyster-shaped cap spanning 2–30 cm (3⁄4–11 3⁄4 in); natural specimens range from white to gray or tan to dark-brown; the margin is inrolled when young, and is smooth and often somewhat lobed or wavy. The flesh is white, firm, and varies in thickness due to stipe arrangement. The gills of the mushroom are white to cream, and descend on the stalk if present. If so, the stipe is off-center with a lateral attachment to wood. The spore print of the mushroom is white to lilac-gray, and best viewed on dark background. The mushroom\'s stipe is often absent. When present, it is short and thick.\r\n\r\nOmphalotus nidiformis is a toxic lookalike found in Australia and Japan. In North America, Omphalotus olivascens, the western jack-o\'-lantern mushroom and Clitocybe dealbata, the ivory funnel mushroom, both bear a resemblance to Pleurotus ostreatus. Both Omphalotus olivascens and Clitocybe dealbata contain muscarine and are toxic. P. ostreatus is a carnivorous fungus, preying on roundworms by using a calcium-dependent toxin that paralyzes the prey within minutes of contact, causing necrosis and formation of a slurry to facilitate ingestion as a protein-rich food source. The carnivorous behavior and mechanism of paralysis appear to have been conserved in evolution of P. ostreatus and their prey roundworms over some 280–430 million years.', 'https://en.wikipedia.org/wiki/Pleurotus_ostreatus', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `submission_sub`
--

DROP TABLE IF EXISTS `submission_sub`;
CREATE TABLE `submission_sub` (
  `id_sub` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `id_mshm` int(11) NOT NULL,
  `latitude_sub` float(10,6) NOT NULL,
  `longitude_sub` float(10,6) NOT NULL,
  `description_sub` text NOT NULL,
  `date_found_sub` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission_sub`
--

INSERT INTO `submission_sub` (`id_sub`, `id_usr`, `id_mshm`, `latitude_sub`, `longitude_sub`, `description_sub`, `date_found_sub`) VALUES
(54, 1, 32, 35.613880, -82.720901, 'This odd shaped mushroom had many different holes on the fruiting body. It grew near a tulip poplar and I found several of these mushrooms around the tree.', '2021-05-02'),
(55, 1, 34, 35.747734, -89.222198, 'orange mushroom with false gills, smelled like an apricot', '2021-05-02'),
(56, 1, 34, 35.290470, -83.671875, 'Light yellow to orange mushroom, fruity aroma and grew on ground away from trees', '2021-05-02'),
(57, 1, 39, 34.529202, -84.374001, 'White mushroom with hairy exterior. Brown color on top of cap, grew near many other similar mushrooms.', '2021-05-03'),
(58, 1, 32, 35.351387, -83.516678, 'Found in flat area beside the water, this mushroom did not have a broad cap and looked like a hollow honeycomb', '2021-05-03'),
(59, 1, 36, 35.674000, -86.025177, 'Flat multi-colored fan type mushrooms growing in a cluster on a fallen log', '2021-05-03'),
(60, 1, 0, 35.271431, -82.808792, 'Red mushroom with white spots on the cap, a veil ran around the stem', '2021-05-03'),
(61, 1, 0, 35.573654, -83.247818, 'This mushroom grew on the ground away from trees. It was red capped with white spots on the top.', '2021-05-03'),
(62, 1, 0, 34.871105, -82.882202, 'This mushroom was growing near water, it was broad capped with an orange and red color with white speckles on top', '2021-05-03'),
(63, 1, 37, 35.612617, -83.205811, 'Beautiful orange mushroom found growing on the side of a dead tree. shades of yellow around the edge', '2021-05-03'),
(64, 1, 34, 35.127739, -86.508575, 'Orange mushroom growing on ground away from trees, grew together but not in groups more than 5', '2021-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `user_usr`
--

DROP TABLE IF EXISTS `user_usr`;
CREATE TABLE `user_usr` (
  `id_usr` int(11) NOT NULL,
  `first_name_usr` varchar(20) NOT NULL,
  `last_name_usr` varchar(20) NOT NULL,
  `email_usr` varchar(40) NOT NULL,
  `username_usr` varchar(40) NOT NULL,
  `hashed_password_usr` varchar(255) NOT NULL,
  `user_level_usr` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_usr`
--

INSERT INTO `user_usr` (`id_usr`, `first_name_usr`, `last_name_usr`, `email_usr`, `username_usr`, `hashed_password_usr`, `user_level_usr`) VALUES
(10, 'Test', 'Admin', 'Test@test.com', 'TestAdmin', '$2y$10$41xLN/AHoaH4s3x5p944qebCvvdCpGNEvez06Dk6pIBvdxAUWTD3K', 'a'),
(11, 'Test', 'Member', 'Test@test.com', 'TestMember', '$2y$10$43aGPP7vAp.qkHOhqfxvvuj6mfVX6kMMg7s9w5AgSq5wdDoO9Mwlm', 'm'),
(51, 'Test', 'Admin', 'finaltestadmin@test.com', 'FinalTestAdmin', '$2y$10$JUE.e2motptRPNSFIBo75u39UH/ojRgkGHXJVUMT5l84vT8.Wwmg6', 'a'),
(52, 'Test', 'User', 'finaltestuser@test.com', 'FinalTestUser', '$2y$10$DP86qZUxrosoYVXrUpZSd.k/EPEwV5lhLC6V6nPbxlh8sysnKDBz.', 'm'),
(54, 'Alex', 'Hamrick', 'alex_hamrick@yahoo.com', 'AlexHamr', '$2y$10$w7MwtjaalYjH28zmCbuXjO00uDDeQA2yj.jYN.PpyLTamAJITAA1a', 'm'),
(55, 'Bryn', 'Mcguire', 'bm@gmail.com', 'BrynMcguire', '$2y$10$zhfTHhA9szNLV1OQEG4EW.uvW1pNy7IwCH94W3gdH8Y1pvBI7uRQa', 'm');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sub_images`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_sub_images`;
CREATE TABLE `view_sub_images` (
`id_sub` int(11)
,`image1` varchar(255)
,`image2` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_sub_images`
--
DROP TABLE IF EXISTS `view_sub_images`;

DROP VIEW IF EXISTS `view_sub_images`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sub_images`  AS  select `image_img`.`id_sub` AS `id_sub`,max(`image_img`.`image_name_img`) AS `image1`,min(`image_img`.`image_name_img`) AS `image2` from `image_img` group by `image_img`.`id_sub` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_img`
--
ALTER TABLE `image_img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `image_img_fk0` (`id_sub`),
  ADD KEY `image_img_fk1` (`id_mshm`);

--
-- Indexes for table `mushroom_mshm`
--
ALTER TABLE `mushroom_mshm`
  ADD PRIMARY KEY (`id_mshm`);

--
-- Indexes for table `submission_sub`
--
ALTER TABLE `submission_sub`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `user_usr`
--
ALTER TABLE `user_usr`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_img`
--
ALTER TABLE `image_img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `mushroom_mshm`
--
ALTER TABLE `mushroom_mshm`
  MODIFY `id_mshm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `submission_sub`
--
ALTER TABLE `submission_sub`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_usr`
--
ALTER TABLE `user_usr`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

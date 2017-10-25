-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 04:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MOBILE_NUMBER` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`USERNAME`, `PASSWORD`, `EMAIL`, `MOBILE_NUMBER`) VALUES
('15CE1025', '25d55ad283aa400af464c76d713c07ad', 'carb@gmail.com', '9167140720');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` longtext NOT NULL,
  `place` text NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL,
  `published_date` date NOT NULL,
  `c_no1` bigint(20) NOT NULL,
  `c_no2` bigint(20) DEFAULT NULL,
  `views` bigint(100) NOT NULL DEFAULT '0',
  `img_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `name`, `short_desc`, `long_desc`, `place`, `s_date`, `e_date`, `s_time`, `e_time`, `published_date`, `c_no1`, `c_no2`, `views`, `img_name`) VALUES
(13, 'Brief History Of Aviation', 'This session will give you a brief idea about the history of aviation', 'The history of aviation has extended over more than two thousand years, from the earliest forms of aviation, kites and attempts at tower jumping, to supersonic, and hypersonic flight by powered, heavier-than-air jets.\r\n\r\nKite flying in China dates back to several hundred years BC and slowly spread around the world. It is thought to be the earliest example of man-made flight.\r\n\r\nLeonardo da Vinci\'s 15th-century dream of flight found expression in several rational but unscientific designs, though he did not attempt to construct any of them.\r\n\r\nThe discovery of hydrogen gas in the 18th century led to the invention of the hydrogen balloon, at almost exactly the same time that the Montgolfier brothers rediscovered the hot-air balloon and began manned flights. Various theories in mechanics by physicists during the same period of time, notably fluid dynamics and Newton\'s laws of motion, led to the foundation of modern aerodynamics, most notably by Sir George Cayley.\r\n\r\nBalloons, both free-flying and tethered, began to be used for military purposes from the end of the 18th century, with the French government establishing Balloon Companies during the Revolution.\r\n\r\nThe term aviation, noun of action from stem of Latin avis \"bird\" with suffix -ation meaning action or progress, was coined in 1863 by French pioneer Guillaume Joseph Gabriel de La Landelle (1812â€“1886) in \"Aviation ou Navigation aÃ©rienne sans ballons\".\r\n\r\nExperiments with gliders provided the groundwork for heavier-than-air craft, and by the early-20th century, advances in engine technology and aerodynamics made controlled, powered flight possible for the first time. The modern aeroplane with its characteristic tail was established by 1909 and from then on the history of the aeroplane became tied to the development of more and more powerful engines.\r\n\r\nThe first great ships of the air were the rigid dirigible balloons pioneered by Ferdinand von Zeppelin, which soon became synonymous with airships and dominated long-distance flight until the 1930s, when large flying boats became popular. After World War II, the flying boats were in their turn replaced by land planes, and the new and immensely powerful jet engine revolutionised both air travel and military aviation.\r\n\r\nIn the latter part of the 20th century the advent of digital electronics produced great advances in flight instrumentation and \"fly-by-wire\" systems. The 21st century saw the large-scale use of pilotless drones for military, civilian and leisure use. With digital controls, inherently unstable aircraft such as flying wings became possible.', 'VESIT, Chembur', '2017-10-23', '2017-10-23', '10:00:00', '16:00:00', '2017-10-19', 9167140720, 9876543210, 0, '13.jpg'),
(14, 'Russia During WWII', 'This session will be an eye opener for history geeks about how russians survived and won WWII', 'The Soviet Union signed a non-aggression pact with Nazi Germany on 23 August 1939. In addition to stipulations of non-aggression, the treaty included a secret protocol that divided territories of Romania, Poland, Lithuania, Latvia, Estonia and Finland into German and Soviet \"spheres of influence\", anticipating potential \"territorial and political rearrangements\" of these countries. Stalin and Hitler later traded proposals after a Soviet entry into the Axis Pact.\r\n\r\nGermany invaded Poland on 1 September 1939. Joseph Stalin waited until 17 September before launching his own invasion of Poland. Part of southeastern (Karelia) and the Salla region of Finland were annexed by the Soviet Union after the Winter War. This was followed by Soviet annexations of Estonia, Latvia, Lithuania, and parts of Romania (Bessarabia, Northern Bukovina and the Hertza region). It was only in 1989 that the Soviet Union admitted the existence of the secret protocol of the Nazi-Soviet pact regarding the planned divisions of these territories. The invasion of Bukovina violated the Molotov-Ribbentrop Pact, as it went beyond the Soviet sphere agreed with the Axis.\r\n\r\nIn 1940-41, Stalin ignored reports of an Axis invasion. On 22 June 1941, Hitler launched an invasion of the Soviet Union. Stalin was confident that the total Allied war machine would eventually stop Germany, and with Lend Lease from the West, the Soviets stopped the Wehrmacht some 30 kilometres from Moscow. Over the next four years, the Soviet Union repulsed Axis offensives, such as at the Battle of Stalingrad and the Battle of Kursk, and pressed forward to victory in large Soviet offensives, such as the Vistula-Oder Offensive. Stalin began to listen to his generals more after Kursk.\r\n\r\nThe bulk of Soviet fighting took place on the Eastern Frontâ€”including a continued war with Finlandâ€”but it also invaded Iran (August 1941) in cooperation with the British and late in the war attacked Japan (August 1945), with which the Soviets had border wars earlier up until in 1939.\r\n\r\nStalin met with Winston Churchill and Franklin D. Roosevelt at the Tehran Conference and began to discuss a two-front war against Germany and the future of Europe after the war. Berlin finally fell in April 1945, but Stalin was never fully convinced that Adolf Hitler had committed suicide. Fending off the German invasion and pressing to victory in the East required a tremendous sacrifice by the Soviet Union, which suffered the highest military casualties in the war, losing more than 20 million men.', 'SIES', '2017-10-15', '2017-10-31', '10:00:00', '16:00:00', '2017-10-19', 1234567890, 9865742130, 0, '14.jpg'),
(15, 'TensorFlow Library', 'TensorFlow is an open-source software library for machine learning across a range of tasks. It is a symbolic math library, and also used as a system for building and training neural networks to detect and decipher patterns and correlations, analogous to human learning and reasoning', 'TensorFlow is Google Brain\'s second generation system. Version 1.0.0 was released on 11 February 2017. While the reference implementation runs on single devices, TensorFlow can run on multiple CPUs and GPUs (with optional CUDA extensions for general-purpose computing on graphics processing units). TensorFlow is available on 64-bit Linux, macOS, Windows, and mobile computing platforms including Android and iOS.\r\n\r\nTensorFlow computations are expressed as stateful dataflow graphs. The name TensorFlow derives from the operations that such neural networks perform on multidimensional data arrays. These arrays are referred to as \"tensors\". In June 2016, Dean stated that 1,500 repositories on GitHub mentioned TensorFlow, of which only 5 were from Google.', 'RAIT, Auditorium', '2017-10-21', '2017-10-21', '10:00:00', '16:00:00', '2017-10-19', 1236441512, 98745661230, 0, '15.jpg'),
(16, 'Career in YouTube', 'This session will focus on how to make a successful career as a Youtuber', 'YouTube is an American video-sharing website headquartered in San Bruno, California. The service was created by three former PayPal employeesâ€”Chad Hurley, Steve Chen, and Jawed Karimâ€”in February 2005. Google bought the site in November 2006 for US$1.65 billion; YouTube now operates as one of Google\'s subsidiaries.\r\n\r\nYouTube allows users to upload, view, rate, share, add to favorites, report, comment on videos, and subscribe to other users. It primarily uses the VP9 and H.264/MPEG-4 AVC formats and Dynamic Adaptive streaming over HTTP to display a wide variety of user-generated and corporate media videos. Available content includes video clips, TV show clips, music videos, short and documentary films, audio recordings, movie trailers, live streams, and other content such as video blogging, short original videos, and educational videos. Most of the content on YouTube is uploaded by individuals, but media corporations including CBS, the BBC, Vevo, and Hulu offer some of their material via YouTube as part of the YouTube partnership program. Unregistered users can only watch videos on the site, while registered users are permitted to upload an unlimited number of videos and add comments to videos. Videos deemed potentially inappropriate are available only to registered users affirming themselves to be at least 18 years old.', 'DY Patil, Auditorium', '2017-10-02', '2017-10-31', '10:00:00', '12:00:00', '2017-10-20', 9876543210, 9876543210, 0, '16.png'),
(17, 'Kathak Dance Competition', 'National Level Kathak Competition', 'Kathak is one of the ten major forms of Indian classical dance. The origin of Kathak is traditionally attributed to the traveling bards of ancient northern India known as Kathakars or storytellers. The term Kathak is derived from the Vedic Sanskrit word Katha which means \"story\", and Kathaka which means \"he who tells a story\", or \"to do with stories\". Wandering Kathakas communicated stories from the great epics and ancient mythology through dance, songs and music in a manner similar to early Greek theatre. Kathak evolved during the Bhakti movement, particularly by incorporating the childhood and stories of the Hindu god Krishna, as well as independently in the courts of north Indian kingdoms.\r\n\r\nKathak is found in three distinct forms, named after the cities where the Kathak dance tradition evolved â€“ Jaipur, Banaras and Lucknow. Stylistically, the Kathak dance form emphasizes rhythmic foot movements, adorned with small bells (Ghungroo), and the movement harmonized to the music. The legs and torso are generally straight, and the story is told through a developed vocabulary based on the gestures of arms and upper body movement, facial expressions, stage movements, bends and turns. The main focus of the dance becomes the eyes and the foot movements. The eyes work as a medium of communication of the story the dancer is trying to communicate. With the eyebrows the dancer gives various facial expressions. The difference between the sub-traditions is the relative emphasis between acting versus footwork, with Lucknow style emphasizing acting and Jaipur style famed for its spectacular footwork.\r\n\r\nKathak as a performance art survived and thrived as an oral tradition, learnt and innovated from one generation to another verbally and through practice. It transitioned, adapted and integrated the tastes of the Mughal courts in the 16th and 17th century particularly Akbar, was ridiculed and declined in the colonial British era then was reborn as India gained independence and sought to rediscover its ancient roots and a sense of national identity through the arts.', 'DY Patil, Auditorium', '2017-10-31', '2017-11-22', '10:00:00', '15:00:00', '2017-10-20', 9876541330, 654165165465, 0, '17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ROLL_NO` varchar(9) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `YEAR` varchar(2) NOT NULL,
  `DIVISION` varchar(1) NOT NULL,
  `BATCH` varchar(5) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MOBILE_NUMBER` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ROLL_NO`, `PASSWORD`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `YEAR`, `DIVISION`, `BATCH`, `EMAIL`, `MOBILE_NUMBER`) VALUES
('15CE1000', '25d55ad283aa400af464c76d713c07ad', 'WALTER', 'H', 'WHITE', 'FE', 'a', 'one', 'walter@gmail.com', '1234567890'),
('15CE1025', '827ccb0eea8a706c4c34a16891f84e7b', 'Chaitanya', 'Avinash', 'Bapat', 'FE', 'A', '1', 'carb@gmail.com', '9167140720'),
('15CE1026', '25d55ad283aa400af464c76d713c07ad', 'Chaitanya', 'Avinash', 'Bapat', 'TE', 'A', 'one', 'carb@gmail.com', '9167140720'),
('15CE1027', '25d55ad283aa400af464c76d713c07ad', 'Chaitanya', 'Avinash', 'Bapat', 'TE', 'A', 'one', 'carb@gmail.com', '9167140720'),
('15CE2000', '25d55ad283aa400af464c76d713c07ad', 'Michael', 'Townley', 'DeSanta', 'SE', 'B', '2', 'michael@yahoo.com', '9146314465135'),
('15CE2001', '25d55ad283aa400af464c76d713c07ad', 'Trevor', 'Ron', 'Philips', 'BE', 'C', '1', 'trevor@gta.us', '9876543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ROLL_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 03:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `s_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`s_no`, `name`, `email`, `username`, `password`) VALUES
(1, 'Mohd Faheem Ahmad', 'mohdfaheemahmad5@gmail.com', 'bloggerFaheem', '$2y$10$YnhXL6M0LYV40laqjF7sYexAqOmXDJEd.Ihf6yxMuqWmeXqUPRFOO'),
(3, 'Shuja ur Rahman', 'shujaurrehman210@gmail.com', 'bloggerShuja', '$2y$10$XuD61Roea1y/N9HXQEyT5OZ0TefiXgBzdkmDXAiNNR25je0NKKSTi');

-- --------------------------------------------------------

--
-- Table structure for table `allblogs`
--

CREATE TABLE `allblogs` (
  `blog_sno` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `blog_title` text NOT NULL,
  `blog_subtitle` text NOT NULL,
  `blog_content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allblogs`
--

INSERT INTO `allblogs` (`blog_sno`, `username`, `email`, `blog_title`, `blog_subtitle`, `blog_content`, `time`) VALUES
(83, 'shujaurrahman', 'Shujaurrehman210@gmail.com', 'NothinG is EterNaL..', 'freedom', 'Why?Why do we need more freedom?When we are having enoughIs there anything we are scared off to deal withWhy we grow up too fast leaving all the childless behavior backWhy a man does attains a certain age called maturity and starts judging what is wrong and what is rightWe can’t remain a child forever like till deathNot judging anything doing mistakes and doing the hell what comes up and cop up right the wayNo but we gain maturity and comes to know that we are dealing with hundreds of problems and certain pressure , behaving like a pervert in front of what we are thinkingWhat does perfect looks like?I am asking because I haven’t passed a day in my life according to the thing so called perfectOr I should correct even a second in my lifeWhat do this mean at least I wanted to knewWhy do this all things or thoughts trigger my mind even I don’t want to think of that I don’t know about itOk I have planned hundred times according to the so called perfect but I haven’t till date came across that so longWhat does that even look I don’t know yet?I keep thinking these all thoughts in my imaginative mind and believe that it comes true soonKnowing that it won’tBut still hopes are hopes they are never still like water at timesThey keep going like time and don’t stop for even a second and at the end make up heap of dreamNot to be fulfilledIs there anything called like perfect freedomBecause I haven’t came across that tooThe more I get I think the less I am havingI think I am introvertThe thing is I spent a lot of time talking to meTo my soulThat this thing should be like that, that would look good with this and etcWhy do life keep going and not having a pause and rewind buttonIf that is allowed in this game of lifeI would go back to my child ageMaking plenty of mistakes without knowing the cause for that I have payBut that can’t be possible right nowI think that is the possible cause for what I am dealing todayFor what I am hungry todayMy actual greed I sayWhat does anybody need freedom, dreams, cause and perfection?Even having enough of itBut hunger is never satisfied if we get good foodWe need more, the more we get the more we step up to achieve more I think that is lifeWe are never satisfied with what we are having and we need everything we are not havingThe only contradiction I am proving is to a line I read somewhere“Nothing is eternal”Like nothing is for foreverLikewise are we, we change, step up at every second with our dreams with our partners, our thinking probably with everything we are having todayTo have something is to let it goI remember so I let go everything just to have something in futureBut I haven’t came across that thing probably I am believing in a myth or else in journey of dreamsSecretly running by oneselfThat rest is same but not stillHope to come across something like really called perfection and freedom according to dictionary of dreams and yesA line “everything is eternal”What I have to do is just WAIT….!!! NA?', '2021-11-04 23:51:01'),
(88, 'shujaurrahman', 'Shujaurrehman210@gmail.com', 'FOREVER MEANT NEVER.', 'literature', ' Sounds of leaves uttering by shoes of passengers were heard,\r\nFlashback to a ago when these leaves were the pamphlets; exchange letter of the lovers\r\nWritten with feelings like deepen heart words elaborating each others love\r\nConsidering the beauties ,the chaos, the stillness, the oneness of widen and exotic love\r\nThe life that tied the thumbs of goals to the future was embrace with the newness of present\r\nPresent with her\r\nContracting an amendment for forever was the promise to be sign on\r\nBut what?\r\nWas that “forever” worth a penny ; the promises , the chaos , the stillness, the love, the sacrifice , the aims, the oneness of two,  all deemed to low that sake of illness derived from coward people’s thinking was born\r\nAnd this ‘forever ‘flew away from the life of two to one like the bird that flew just after freed from bars\r\nForever was ever meant just for never\r\nThere was nothing still with life and the love too\r\nThe amendment was just for sake to justify the partner at present, the future mentioned by both as ‘forever’ was a lie, a big lie; falseness was embraced in partnership\r\n‘Forever ‘only meant to fly the thirst of illness of never being one at a time\r\nUnbiased with thought I started applauding my thoughts as I got deep with in\r\nStating some cases thrown out by this society\r\nA claim was adorned, there is nothing such as ‘forever’ in the dictionary of life, a journey of lies; a journey on earth\r\nAppealing to justify I asked to clarify, it stated me\r\nWe are liars of heart just satisfying the present, and imagining the future and stating according to that ,a stillness and a ‘forever’ in the life of finite days\r\nAll we are just illusionist; a liars of reality screens keeping our self in hypothetical situation just to adorn our self\r\nThe ‘forever was little bit a lower than ever’ it was never than a bit more\r\nEverything ended with a certain exotic clause thou the this ‘forever’ never but it was exception in the life of finite days\r\nThou it was never so deeply explained\r\nWhat it could be\r\nWhat it would be\r\nIf a certain clauses are added to it\r\nBut every time I added a word to ‘forever’ it always meant undefined, unpredictable\r\nThat is meaningless\r\nSo every time I was satisfying with a word I was lying\r\nThus is everyone\r\nForever always mentioned undefined\r\nWe just appealed to satisfy the hunger of love with this word\r\nAs if contract of love was amended and rewarded by mentioning ‘forever’ in the talks\r\nThat lies were lies of injustice\r\nThe lies of society and the cruel heart\r\nForever never added up to infinite it was always finite, a short distanced finite lagging stillness too\r\nNever was stillness in anything in this world\r\nAnd never ‘a forever meant ever in this era of love’\r\nNever……,There is a finite above every infinite,The world counts everything,There is nothing endless ,Everything has an end', '2021-12-18 08:02:34'),
(89, 'Faheem_', 'Faheemahmad5@gmail.com', 'Poetry', 'TYLER KNOTT GREGSON', 'They asked me what poetry was, and as few things have, it stole my speech for a moment.All I could think to say was that poetry is taking an ache and making it sing.', '2021-12-18 08:06:26'),
(90, 'shujaurrahman', 'Shujaurrehman210@gmail.com', 'The good and the difficult', 'Poetry', 'You always hand over the good things first; here is my laughter, here is my confidence, here is the part of me I think is cute and worth loving. Eventually you close your eyes and hold out something heavy - here is the thing you might leave me for. If you’re lucky, they pick it up easily. If you’re lucky, they’ll let you hold theirs too', '2021-12-18 08:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `s_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`s_no`, `name`, `email`, `username`, `password`) VALUES
(1, 'Mohd Faheem Ahmad', 'mohdfaheemahmad5@gmail.com', 'faheem', '$2y$10$1yjoinj143d17j1sNoqpoOptNol1SI7c6mmgyfJ3rhJloDec798De'),
(4, 'Warisha Javed', 'okwarisha@gmail.com', 'warisha', '$2y$10$eGi355mYXY61e8p/TmgjuuGyfD5oDJ/pzXH9A5sk0SrG/ltHilCDe'),
(5, 'Shuja', 'Shujaurrehman210@gmail.com', 'shujaurrahman', '$2y$10$bd0d20TRrGzqNVBeYgXER.LTRtHnWs.7I5ZbLpMAJliuusVwkfbj.'),
(6, 'Aqsarahman', 'shujaurrahman.210@gmail.com', 'Aqsarahman210', '$2y$10$zDoZttwfVU3G7vkaeQubVeOWTc3EF0MmIYAQHcc2dmib.lUfyjxNy'),
(7, 'Faheem', 'Faheemahmad5@gmail.com', 'Faheem_', '$2y$10$IDCf3EiESG.46tVLYh9AMuxGTTRx7OBzXvN002pWtY7vQ.qkVhiFW');

-- --------------------------------------------------------

--
-- Table structure for table `contacus`
--

CREATE TABLE `contacus` (
  `s_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mssg` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacus`
--

INSERT INTO `contacus` (`s_no`, `name`, `email`, `mssg`, `time`) VALUES
(1, 'Faheem', 'faheem@gmail.com', 'Hello', '2021-11-03 18:16:11'),
(2, 'Warisha Javed ', 'okwarisha@gmail.com', 'I have Forgotten my Password Please help me ', '2021-11-03 22:48:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indexes for table `allblogs`
--
ALTER TABLE `allblogs`
  ADD PRIMARY KEY (`blog_sno`);

--
-- Indexes for table `allusers`
--
ALTER TABLE `allusers`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indexes for table `contacus`
--
ALTER TABLE `contacus`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `allblogs`
--
ALTER TABLE `allblogs`
  MODIFY `blog_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `allusers`
--
ALTER TABLE `allusers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacus`
--
ALTER TABLE `contacus`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

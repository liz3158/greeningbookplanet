-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 08:52 AM
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
-- Database: `db_bookplanet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(10) DEFAULT NULL,
  `admin_password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `book_name` text DEFAULT NULL,
  `book_author` text DEFAULT NULL,
  `book_condition` text DEFAULT NULL,
  `book_description` text DEFAULT NULL,
  `book_language` text DEFAULT NULL,
  `book_pages` varchar(255) DEFAULT NULL,
  `book_formats` text DEFAULT NULL,
  `book_isbn` bigint(255) DEFAULT NULL,
  `book_pub_date` date DEFAULT NULL,
  `book_quantity` int(11) DEFAULT NULL,
  `book_price` double DEFAULT NULL,
  `book_ori_price` double DEFAULT NULL,
  `shipPlace` text DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `book_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `seller_id`, `category_id`, `subcategory_id`, `book_name`, `book_author`, `book_condition`, `book_description`, `book_language`, `book_pages`, `book_formats`, `book_isbn`, `book_pub_date`, `book_quantity`, `book_price`, `book_ori_price`, `shipPlace`, `state`, `img1`, `img2`, `img3`, `img4`, `book_status`) VALUES
(17, 10, 1, 1, 'Treasure Island', 'Robert Louis Stevenson', 'good ', 'For sheer storytelling delight and pure adventure, Treasure Island has never been surpassed. From the moment young Jim Hawkins first encounters the sinister Blind Pew at the Admiral Benbow Inn until the climactic battle for treasure on a tropic isle, the novel creates scenes and characters that have fired the imaginations of generations of readers. Written by a superb prose stylist, a master of both action and atmosphere, the story centers upon the conflict between good and evil - but in this case a particularly engaging form of evil. It is the villainy of that most ambiguous rogue Long John Silver that sets the tempo of this tale of treachery, greed, and daring. Designed to forever kindle a dream of high romance and distant horizons, Treasure Island is, in the words of G. K. Chesterton, \'the realization of an ideal, that which is promised in its provocative and beckoning map; a vision not only of white skeletons but also green palm trees and sapphire seas.\' G. S. Fraser terms it \'an utterly original book\' and goes on to write: \'There will always be a place for stories like Treasure Island that can keep boys and old men happy', 'english', '311', 'Hardcover', 45783473957349857, '2021-12-07', 1, 66.7, 88.9, 'Kuching', '', 'a1.jpg', 'a2.jpg', 'a3.jpg', 'a4.jpg', 'selled'),
(18, 10, 1, 14, 'Go Tell the Bees That I Am Gone', ' Diana Gabaldon ', 'good', 'The past may seem the safest place to be . . . but it is the most dangerous time to be alive. . . .\r\n\r\nJamie Fraser and Claire Randall were torn apart by the Jacobite Rising in 1746, and it took them twenty years to find each other again. Now the American Revolution threatens to do the same.\r\n\r\nIt is 1779 and Claire and Jamie are at last reunited with their daughter, Brianna, her husband, Roger, and their children on Fraser’s Ridge. Having the family together is a dream the Frasers had thought impossible.\r\n\r\nYet even in the North Carolina backcountry, the effects of war are being felt. Tensions in the Colonies are great and local feelings run hot enough to boil Hell’s teakettle. Jamie knows loyalties among his tenants are split and it won’t be long until the war is on his doorstep.\r\n\r\nBrianna and Roger have their own worry: that the dangers that provoked their escape from the twentieth century might catch up to them. Sometimes they question whether risking the perils of the 1700s—among them disease, starvation, and an impending war—was indeed the safer choice for their family.\r\n\r\nNot so far away, young William Ransom is still coming to terms with the discovery of his true father’s identity—and thus his own—and Lord John Grey has reconciliations to make, and dangers to meet . . . on his son’s behalf, and his own.\r\n\r\nMeanwhile, the Revolutionary War creeps ever closer to Fraser’s Ridge. And with the family finally together, Jamie and Claire have more at stake than ever before.', 'english', '902', 'Hardcover', 385685548, '2014-12-15', 1, 56.9, 65.89, 'Mukah', '', 'b1.jpg', 'b2.jpg', 'b3.jpg', 'b4.jpg', 'onShop'),
(19, 23, 1, 13, 'Never Fall for Your Fiancée', ' Virginia Heath ', 'good', 'The first in a new historical rom-com series, a handsome earl hires a fake fiancée to keep his matchmaking mother at bay, but hilarity ensues when love threatens to complicate everything.\r\n\r\nThe last thing Hugh Standish, Earl of Fareham, ever wants is a wife. Unfortunately for him, his mother is determined to find him one, even from across the other side of the ocean. So, Hugh invents a fake fiancée to keep his mother’s matchmaking ways at bay. But when Hugh learns his interfering mother is on a ship bound for England, he realizes his complicated, convoluted but convenient ruse is about to implode. Until he collides with a beautiful woman, who might just be the miracle he needs.\r\n\r\nMinerva Merriwell has had to struggle to support herself and her two younger sisters ever since their feckless father abandoned them. Work as a woodcut engraver is few and far between, and the Merriwell sisters are nearly penniless. So, when Hugh asks Minerva to pose as his fiancée while his mother is visiting, she knows that while the scheme sounds ludicrous, the offer is too good to pass up. Once Minerva and her sisters arrive at Hugh\'s estate, of course, nothing goes according to his meticulous plan. As hilarity and miscommunication ensue, while everyone tries to keep their tangled stories straight, Hugh and Minerva’s fake engagement starts to turn into a real romance. But can they trust each other, when their relationship started with a lie?', 'english', '368', 'Paperback', 1250787769, '2013-12-02', 1, 46, 65, 'Bintulu', '', 'c1.jpg', 'c2.jpg', 'c3.jpg', 'c4.jpg', 'onShop'),
(20, 23, 1, 13, 'Duke, Actually', 'Jenny Holiday ', 'good', 'Maximillian von Hansburg, Baron of Laudon and heir to the Duke of Aquilla, is trapped. Under pressure from his domineering father, he must marry a suitable bride before he inherits a title that feels like a prison sentence. In New York to meet a prospective wife, he ditches his responsibilities and appears on Dani Martinez’s doorstep. He’s been intrigued by the no-nonsense professor since he met her at the Eldovian royal wedding and is determined to befriend her.\r\n\r\nNewly single Dani is done with love—she even has a list entitled “Things I Will Never Again Do for a Man”—which is why she hits it off with notorious rake Max. He’s trying to escape relationships, and she’s resolved to avoid them at all costs. All they want from each other is friendship and a distraction from their messy lives.\r\n\r\nAs their bond begins to deepen, so does their attraction, until they end up in bed together. Falling in love was never part of the plan—Max’s family doesn’t see Dani as a perfect match, even as his heart tells him she’s the one, and Dani isn’t sure she can make it in Max’s world. Can they find the courage to live they life they desire, even if it means risking everything?', 'english', '384', 'Paperback', 9780062952080, '2017-12-18', 1, 55, 66, 'Bintulu', '', 'd1.jpg', 'd2.jpg', 'd3.jpg', 'd4.jpg', 'onShop'),
(21, 10, 2, 22, 'The Storyteller : Tales of Life and Music', '  Dave Grohl', 'good', 'So, I\'ve written a book.\r\n\r\nHaving entertained the idea for years, and even offered a few questionable opportunities (\'It\'s a piece of cake! Just do four hours of interviews, find someone else to write it, put your face on the cover, and voila!\'), I have decided to write these stories just as I have always done, in my own hand. The joy that I have felt from chronicling these tales is not unlike listening back to a song that I\'ve recorded and can\'t wait to share with the world, or reading a primitive journal entry from a stained notebook, or even hearing my voice bounce between the Kiss posters on my wall as a child.\r\n\r\nThis certainly doesn\'t mean that I\'m quitting my day job, but it does give me a place to shed a little light on what it\'s like to be a kid from Springfield, Virginia, walking through life while living out the crazy dreams I had as young musician. From hitting the road with Scream at 18 years old, to my time in Nirvana and the Foo Fighters, jamming with Iggy Pop or playing at the Academy Awards or dancing with AC/DC and the Preservation Hall Jazz Band, drumming for Tom Petty or meeting Sir Paul McCartney at Royal Albert Hall, bedtime stories with Joan Jett or a chance meeting with Little Richard, to flying halfway around the world for one epic night with my daughters...the list goes on. I look forward to focusing the lens through which I see these memories a little sharper for you with much excitement.', 'English', '384', 'Hardcover', 9781398503700, '2021-10-05', 1, 94.9, 113.1, 'Bintulu', '', 'e1.jpg', 'e2.jpg', 'e3.jpg', 'e4.jpg', 'selled'),
(22, 10, 2, 22, 'The Diary of a Young Girl', ' Anne Frank, Eleanor Roosevelt ', 'good', 'Discovered in the attic in which she spent the last years of her life, Anne Frank’s remarkable diary has become a world classic—a powerful reminder of the horrors of war and an eloquent testament to the human spirit.\r\n\r\nIn 1942, with the Nazis occupying Holland, a thirteen-year-old Jewish girl and her family fled their home in Amsterdam and went into hiding. For the next two years, until their whereabouts were betrayed to the Gestapo, the Franks and another family lived cloistered in the “Secret Annexe” of an old office building. Cut off from the outside world, they faced hunger, boredom, the constant cruelties of living in confined quarters, and the ever-present threat of discovery and death. In her diary Anne Frank recorded vivid impressions of her experiences during this period. By turns thoughtful, moving, and surprisingly humorous, her account offers a fascinating commentary on human courage and frailty and a compelling self-portrait of a sensitive and spirited young woman whose promise was tragically cut short.\r\n--back cover', 'English', '283', 'Mass Market Paperback', 9780062952080, '2011-12-01', 1, 113.5, 120.8, 'Mukah', '', 'f1.jpg', 'f2.jpg', 'f3.jpg', 'f4.jpg', 'onShop'),
(23, 23, 2, 22, 'Berlin Diaries, 1940-1945', ' Marie Vassiltchikov', 'good', 'The secret diaries of a twenty-three-year-old White Russian princess who worked in the German Foreign Office from 1940 to 1944 and then as a nurse, these pages give us a unique picture of wartime life in that sector of German society from which the 20th of July Plot -- the conspiracy to kill Hitler -- was born.', 'english', '324', 'Paperback', 9780394757773, '2011-09-05', 1, 56.9, 65.77, 'Bintulu', '', 'g1.jpg', 'g2.jpg', 'g3.jpg', 'g4.jpg', 'onShop'),
(44, 10, 2, 17, 'The Old Ways: A Journey on Foot', ' Robert Macfarlane', 'Good ', 'In this exquisitely written book, which folds together natural history, cartography, geology, and literature, Robert Macfarlane sets off to follow the ancient routes that crisscross both the landscape of the British Isles and its waters and territories beyond. The result is an immersive, enthralling exploration of the voices that haunt old paths and the stories our tracks tell. Macfarlane’s journeys take him from the chalk downs of England to the bird islands of the Scottish northwest, from Palestine to the sacred landscapes of Spain and the Himalayas. He matches strides with the footprints made by a man five thousand years ago near Liverpool, sails an open boat far out into the Atlantic at night, and commingles with walkers of many kinds, discovering that paths offer a means not just of traversing space but also of feeling, knowing, and thinking.', 'English', '112', 'Hardcover', 9780147509796, '2019-01-01', 1, 121, 223, 'Bintulu', '', '1.jpg', '2.jpg', 'images.jpg', '1.jpg', 'onShop'),
(45, 23, 2, 17, 'Walking The Great North Line', 'Robert Twigger', 'good', 'Robert Twigger, poet and travel author, was in search of a new way up England when he stumbled across the Great North Line. From Christchurch on the South Coast to Old Sarum to Stonehenge, to Avebury, to Notgrove barrow, to Meon Hill in the midlands, to Thor\'s Cave, to Arbor Low stone circle, to Mam Tor, to Ilkley in Yorkshire and its three stone circles and the Swastika Stone, to several forts and camps in Northumberland to Lindisfarne (plus about thirty more sites en route). A single dead straight line following 1 degree 50 West up Britain. No other north-south straight line goes through so many ancient sites of such significance.\r\n\r\nWas it just a suggestive coincidence or were they built intentionally? Twigger walks the line, which takes him through Birmingham, Halifax and Consett as well as Salisbury Plain, the Peak district, and the Yorkshire moors. With a planning schedule that focused more on reading about shamanism and beat poetry than hardening his feet up, he sets off ever hopeful. He wild-camps along the way, living like a homeless bum, with a heart that starts stifled but ends up soaring with the beauty of life. He sleeps in a prehistoric cave, falls into a river, crosses a \'suicide viaduct\' and gets told off by a farmer\'s wife for trespassing; but in this simple life he finds woven gold. He walks with others and he walks alone, ever alert to the incongruities of the edgelands he is journeying through.', 'english', '223', 'paperback', 9781474609067, '2018-01-10', 1, 58, 98, 'Bintulu', 'Sarawak', '3.jpg', '4.jpg', '5.jpg', '6.jpeg', ''),
(46, 10, 2, 18, 'Shadow City', 'Taran Khan', 'Good ', 'When journalist Taran Khan arrives in Kabul, she uncovers a place that defies her expectations. Her wanderings with other Kabulis reveal a fragile city in a state of flux: stricken by near-constant war, but flickering with the promise of peace; governed by age-old codes but experimenting with new modes of living.\r\nHer walks take her to the unvisited tombs of the dead, and to the land of the living - like the booksellers, archaeologists, film-makers and entrepreneurs who are remaking this 3,000-year-old city. And as NATO troops begin to withdraw from the country, Khan watches the cycle of transformation begin again.', 'English', '156', 'Hardcover', 9781784708023, '2018-11-13', 1, 56, 68, 'Bintulu', '', '7.jpg', '8.jpg', '9.jpg', '10.jpg', 'onShop'),
(47, 10, 2, 2, 'Maker Diy Sustainable Projects', 'Audrey Love', 'Good ', 'MakerDIY Sustainable Projects features 15 step-by-step projects that are created using sustainable materials and upcycling methods. Each make will help readers along their journey to an eco-friendly lifestyle, not only in the repurposing of the old into new and beautiful products, but in the making of practical, useful tools that will actively encourage a more sustainable way of life. Created by artist and educator Audrey Love, a passionate advocate of upcycling and sustainable design, the projects range from easy as pie to satisfyingly advanced. Audrey step-by-step instructions are easy to follow, and accompanied by beautiful photography sharing styling ideas and essential technical skills. From constructing a portable greenhouse from old picture frames to creating your own drawstring bags for zero-waste, zero-plastic shopping trips, these projects will change both the aesthetic and the philosophy of your life, for the better, for good.', 'English', '75', 'Paperback', 9781787393974, '2021-11-29', 1, 90, 150, 'Kuching', '', '11.jpg', '12.jpg', '13.jpg', '15.jpg', 'onShop'),
(48, 10, 2, 2, 'Your Houseplant First Year', 'Deborah Martin', 'Good ', 'planting', 'English', '233', 'Paperback', 9781250273727, '2022-01-12', 1, 83, 98, 'Bintulu', '', '16.jpg', '17.jpg', '18.jpg', '19.jpg', 'onShop'),
(49, 10, 2, 19, 'Stress Proof', 'Mithu Storoni', 'Good ', 'Help with stress', 'English', '455', 'Hardcover', 9781474609067, '2021-05-11', 1, 56, 68, 'Bintulu', '', '20.jpg', '21.jpg', '22.jpg', '23.jpg', 'onShop'),
(50, 10, 2, 19, 'What Happened To You', 'Oprah Winfrey', 'Good ', 'Many of us experience adversity and trauma during childhood that has lasting impact on our physical and emotional health. And as we are beginning to understand, we are more sensitive to developmental trauma as children than we are as adults. ', 'English', '65', 'Hardcover', 9781529068467, '2020-10-20', 1, 101, 120, 'Bintulu', '', '24.jpg', '25.jpg', '26.jpg', '27.jpg', 'onShop'),
(51, 10, 2, 20, 'The Art of Flavor: Practices and Principles for Creating Delicious Food', 'Daniel Patterson, Mandy Aftel', 'Good ', 'Two masters of composition, a chef and a perfumer, present a revolutionary new approach to creating delicious food.', 'English', '80', 'Paperback', 9781594634307, '2020-08-26', 1, 113, 153, 'Bintulu', '', '28.jpg', '29.jpg', '30.jpg', '31.jpg', 'onShop'),
(52, 10, 2, 20, 'The Coconut Oil Miracle (5th Edition)', 'Bruce Fife', 'Good ', 'For years, The Coconut Oil Miracle has been a reliable guide for men and women alike. Now in its fifth edition, this revised and updated version has even more information on the benefits of coconut oil and shows readers how to use it for maximum effect, including a nutrition plan with 50 delicious recipes. Coconut oil is much more than just a fad. It is a uniquely curative elixir that has been shown to have countless health benefits.', 'English', '250', 'Hardcover', 9781583335444, '2018-06-13', 1, 67, 86, 'Bintulu', '', '32.jpg', '33.jpg', '35.jpg', '36.jpg', 'onShop'),
(53, 10, 2, 21, 'A Beginner Guide to the Stock Market : Everything You Need to Start Making Money Today', 'Matthew R Kratter', 'Good ', 'Learn to make money in the stock market, even if you never traded before.The stock market is the greatest opportunity machine ever created.Are you ready to get your piece of it.This book will teach you everything that you need to know to start making money in the stock market today.Do not gamble with your hard-earned money.If you are going to make a lot of money, you need to know how the stock market really works.You need to avoid the pitfalls and costly mistakes that beginners make.And you need time-tested trading and investing strategies that actually work.', 'English', '98', 'Hardcover', 9781099617201, '2020-06-10', 1, 30.1, 45, 'Bintulu', '', '37.jpg', '38.jpg', '39.jpg', '40.png', 'onShop'),
(54, 10, 2, 22, 'Diary of a Wimpy kid 1 & 2(Hard cover)', 'Deborah Martin', 'Like New ', '1) Diary of a Wimpy kid ?????????(1)\r\n2) Diary of a Wimpy kid ?????', 'Bahasa Melayu', '34', 'Hardcover', 9781784708023, '2021-06-16', 1, 24, 35, 'Bintulu', '', '41.jpg', '42.jpg', '43.jpg', '44.jpg', 'onShop'),
(55, 10, 2, 23, 'Elements of Style', 'WilliamWhite E B Strunk', 'Acceptable ', 'the elemem tof style', 'English', '456', 'Paperback', 9781784708023, '2021-12-28', 1, 45, 56, 'Bintulu', '', '45.jpg', '46.jpg', '47.jpg', '48.jpg', 'onShop'),
(56, 10, 1, 8, 'Sheets', 'Brenna Thummler', 'Like New ', 'Marjorie Glatt feels like a ghost. A practical thirteen year old in charge of the family laundry business, her daily routine features unforgiving customers, unbearable P.E. classes, and the fastidious Mr. Saubertuck who is committed to destroying everything she’s worked for. Wendell is a ghost. A boy who lost his life much too young, his daily routine features ineffective death therapy, a sheet-dependent identity, and a dangerous need to seek purpose in the forbidden human world. When their worlds collide, Marjorie is confronted by unexplainable disasters as Wendell transforms Glatts Laundry into his midnight playground, appearing as a mere sheet during the day. While Wendell attempts to create a new afterlife for himself, he unknowingly sabotages the life that Marjorie is struggling to maintain.', 'English', '239', 'Paperback', 9781941302675, '2018-08-28', 1, 30, 65, 'Bintulu', '', 's1.jpg', 's2.jpg', 's3.jpg', 's4.jpg', 'onShop'),
(57, 23, 1, 12, 'Comfort Me with Apples', 'Catherynne M. Valente', 'Very Good ', 'Sophia was made for him. Her perfect husband. She can feel it in her bones. He is perfect. Their home together in Arcadia Gardens is perfect. Everything is perfect. It is just that he is away so much. So often. He works so hard. She misses him. And he misses her. He says he does, so it must be true. He is the perfect husband and everything is perfect. But sometimes Sophia wonders about things. Strange things. Dark things. The look on her husbands face when he comes back from a long business trip. The questions he will not answer. The locked basement she is never allowed to enter. And whenever she asks the neighbors, they cant quite meet her gaze...But everything is perfect. Isnt it?', 'English', '103', 'Hardcover', 9781250816214, '2021-11-09', 1, 40, 72, 'Bintulu', '', 'cmwa.jpg', 'cmwa.jpg', 'cmwa.jpg', 'cmwa.jpg', 'onShop'),
(58, 10, 1, 16, 'A History of Wild Places', 'Shea Ernshaw', 'Like New ', 'Travis Wren has an unusual talent for locating missing people. Hired by families as a last resort, he requires only a single object to find the person who has vanished. When he takes on the case of Maggie St. James—a well-known author of dark, macabre childrens books—he is led to a place many believed to be only a legend. Called Pastoral, this reclusive community was founded in the 1970s by like-minded people searching for a simpler way of life. By all accounts, the commune shouldnt exist anymore and soon after Travis stumbles upon it… he disappears. Just like Maggie St. James. Years later, Theo, a lifelong member of Pastoral, discovers Travis is abandoned truck beyond the border of the community. No one is allowed in or out, not when there is a risk of bringing a disease—rot—into Pastoral. Unraveling the mystery of what happened reveals secrets that Theo, his wife, Calla, and her sister, Bee, keep from one another. Secrets that prove their perfect, isolated world isnt as safe as they believed—and that darkness takes many forms. Hauntingly beautiful, hypnotic, and bewitching, A History of Wild Places is a story about fairy tales, our fear of the dark, and losing yourself within the wilderness of your mind. ', 'English', '368', 'Hardcover', 9781982164805, '2021-12-07', 1, 50, 107, 'Bintulu', '', 't1.jpg', 't2.jpg', 't3.jpg', 't4.jpg', 'onShop'),
(59, 23, 1, 11, 'The Replacement Wife', 'Darby Kane', 'Like New ', 'Elisa Wright is a mom and wife, living a nice, quiet life in a nice, quiet town. She is also convinced her brother-in-law is a murderer. Josh has one dead wife and one missing fiancée, and though he grieved for them he starts dating someone new. Elisa fears for that womans safety, and she desperately wants to know what happened to her friend, Josh is missing fiancée. Searching for clues means investigating her own family. And she doesnt like what she finds. A laptop filled with incriminating information. Other women. But when Elisa becomes friends with Joshs new girlfriend and starts to question things she thinks are true, Elisa wonders if the memories of a horrible incident a year ago have finally pushed her over the edge and Josh is really innocent. With so much at stake, Elisa fights off panic attacks and a strange illness. Is it a breakdown or something more? The race is on to get to the truth before another disappearance because there is a killer in the family…or is there? ', 'English', '416', 'Paperback', 9780063117808, '2021-12-28', 1, 55, 125, 'Bintulu', '', 'u1.jpg', 'u1.jpg', 'u1.jpg', 'u1.jpg', 'onShop'),
(60, 10, 1, 15, 'Into the Bloodred Woods', 'Martha Brockenbrough', 'Very Good ', 'Once upon a time there was a kingdom and a forest that liked to eat men and a girl who would change everything, but not alone . . .\r\n\r\nExcept-\r\n\r\nThere is no such thing as once upon a time.\r\n\r\nIn a far away land, populated by were beasts and surrounded by a powerful forest, lies a kingdom about to be sent into chaos. On his deathbed, King Tyran divides his land, leaving half to each of his two children-so they will rule together. However, his son, Albrecht, is not satisfied with half a kingdom. And even though his sister, Ursula, is the first born, he decides that as a girl and were bear, she is unfit to rule. So he invades her land, slaughtering her people and most of the were beasts, and claims it for himself. As King Albrecht builds his iron rule and an army of beasts to defend his reign, Ursula is gathering the survivors and making plans to take back the kingdom. Not just her half-the whole thing. Because Albrecht should have never been allowed to sit on the throne, and Ursula is going to take his crown. And if he is not careful, he might not get to keep his head either. ', 'English', '368', 'Hardcover', 9781338673876, '2021-11-02', 1, 33, 65, 'Bintulu', '', 'v1.jpg', 'v1.jpg', 'v2.jpg', 'v2.jpg', 'onShop');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `book_id`, `user_id`, `seller_id`) VALUES
(69, 18, 8, 10),
(70, 19, 8, 10),
(71, 20, 8, 10),
(75, 22, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text DEFAULT NULL,
  `category_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Fiction', 'The class of literature comprising works of imaginative narration, especially in prose form. works of this class, as novels or short stories: detective fiction. something feigned, invented, or imagined; a made-up story: We\'ve all heard the fiction of her being in delicate health'),
(2, 'Non-Fiction', 'A nonfiction book is one that tells you facts and information about the world around you. It can cover almost any topic, from wild animals to Vikings. If it\'s about something that really happened or something that really exists, it is nonfiction. Some nonfiction books have illustrations (pictures) as well as words.'),
(3, 'Textbook', 'a book used as a standard work for the study of a particular subject.'),
(4, 'Other', 'Extra other category of book, which will not be count in fiction, non-fiction, and textbook');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `book_id` int(255) NOT NULL,
  `payment_method` text DEFAULT NULL,
  `shippingPrice` varchar(255) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` text DEFAULT NULL,
  `receipt_path` varchar(255) NOT NULL,
  `admin_bank_in_status` varchar(255) NOT NULL,
  `admin_bank_in_receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `seller_id`, `book_id`, `payment_method`, `shippingPrice`, `order_date`, `order_status`, `receipt_path`, `admin_bank_in_status`, `admin_bank_in_receipt`) VALUES
(21, 8, 10, 18, 'onlinebank', '7', '2021-12-17 04:40:03', 'received', '/images/receipt/576957.pdf', 'pending', '/images/receipt/576957.pdf'),
(22, 8, 23, 24, 'onlinebank', '10', '2021-12-17 04:41:12', 'received', '/images/receipt/861914.pdf', 'paid', 'admin/receipts/IMG_20211225_174349.jpg8159697.pdf'),
(23, 8, 10, 17, 'onlinebank', '7', '2021-12-20 23:12:56', 'delivery', '/images/receipt/263486.pdf', '', ''),
(24, 8, 10, 18, 'onlinebank', '7', '2021-12-20 23:12:57', 'delivery', '/images/receipt/263486.pdf', '', ''),
(25, 8, 23, 23, 'onlinebank', '7', '2021-12-20 23:14:58', 'pending', '/images/receipt/702494.pdf', '', ''),
(26, 8, 10, 21, 'onlinebank', '7', '2021-12-20 23:20:01', 'received', '/images/receipt/701717.pdf', 'paid', 'admin/receipts/Practical Activity 4.pdf6893234.pdf'),
(27, 8, 10, 21, 'onlinebank', '7', '2021-12-20 23:23:27', 'received', '/images/receipt/349490.pdf', '', ''),
(28, 8, 23, 21, 'onlinebank', '7', '2021-12-21 00:12:03', 'pending', '/images/receipt/313615.pdf', '', ''),
(29, 8, 23, 20, 'onlinebank', '7', '2021-12-21 00:12:05', 'pending', '/images/receipt/313615.pdf', '', ''),
(30, 8, 10, 21, 'onlinebank', '7', '2021-12-21 14:10:55', 'received', '/images/receipt/934890.pdf', 'pending', ''),
(31, 8, 10, 21, 'onlinebank', '7', '2021-12-21 14:14:03', 'received', '/images/receipt/948249.pdf', 'paid', 'admin/receipts/Practical Task 2 Signed.pdf4891131.pdf'),
(32, 8, 10, 21, 'onlinebank', '7', '2021-12-21 14:18:33', 'received', '/images/receipt/818979.pdf', 'paid', 'admin/receipts/IMG_20211225_164907.jpg5382443.pdf'),
(33, 8, 23, 23, 'onlinebank', '7', '2021-12-23 20:45:08', 'received', '/images/receipt/256290.pdf', 'paid', 'admin/receipts/Case Study 2 Signed.pdf1356579.pdf'),
(34, 8, 23, 19, 'onlinebank', '7', '2021-12-23 20:45:08', 'received', '/images/receipt/256290.pdf', 'paid', 'admin/receipts/Case Study 2 Signed.pdf7286391.pdf'),
(35, 8, 10, 43, 'onlinebank', '7', '2021-12-28 21:00:47', 'received', '/images/receipt/117342.pdf', 'paid', 'admin/receipts/Log Book (Edisi 2021_2022).pdf1986524.pdf'),
(36, 8, 10, 17, 'onlinebank', '7', '2021-12-29 16:22:27', 'received', '/images/receipt/362290.pdf', 'paid', 'admin/receipts/vaccination_000413131069.pdf5475692.pdf'),
(37, 7, 10, 21, 'onlinebank', '7', '2022-01-02 02:04:54', 'received', '/images/receipt/17577.pdf', 'paid', 'admin/receipts/quote.jpg9746912.pdf'),
(38, 7, 23, 19, 'onlinebank', '7', '2022-01-02 02:52:12', 'pending', '/images/receipt/957120.pdf', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `request_list`
--

CREATE TABLE `request_list` (
  `request_id` int(11) NOT NULL,
  `book_name` text NOT NULL,
  `book_author` text NOT NULL,
  `book_category` text NOT NULL,
  `book_language` text NOT NULL,
  `book_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_list`
--

INSERT INTO `request_list` (`request_id`, `book_name`, `book_author`, `book_category`, `book_language`, `book_description`) VALUES
(1, 'bookTes', 'weijie', 'en', '', ''),
(2, 'testingBook', 'xiaoyu', 'english book', 'english', 'hahahaha'),
(3, 'book_xiaoyu', 'xiaoyu', 'xiaoyuyu', 'english', 'yuyuyu'),
(6, 'testingBook', 'xiaoyu', 'english book', 'english', 'yuyuyu'),
(7, '1212', 'xiaoyu', 'english book', 'english', 'yuyuyu'),
(8, '121211212', 'xiaoyu', 'english book', 'english', 'hahahaha'),
(11, 'made22', 'tj', 'english book', 'english', 'hahahahaaaaaaa'),
(12, 'bookexample', 'liz', 'fiction', 'english', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `shipfee` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` text DEFAULT NULL,
  `seller_contactno` varchar(20) DEFAULT NULL,
  `seller_bank_name` varchar(255) NOT NULL,
  `seller_bank_acc` bigint(255) DEFAULT NULL,
  `seller_email` varchar(255) DEFAULT NULL,
  `seller_password` varchar(12) DEFAULT NULL,
  `seller_cod_available` text DEFAULT NULL,
  `seller_security_question` text NOT NULL,
  `seller_security_answer` text NOT NULL,
  `seller_address` varchar(255) DEFAULT NULL,
  `seller_state` text DEFAULT NULL,
  `seller_city` text DEFAULT NULL,
  `seller_zipcode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_contactno`, `seller_bank_name`, `seller_bank_acc`, `seller_email`, `seller_password`, `seller_cod_available`, `seller_security_question`, `seller_security_answer`, `seller_address`, `seller_state`, `seller_city`, `seller_zipcode`) VALUES
(10, 'Ling Siew Siew', '0198785554', 'Maybank', 161089658074, 'jessicajexo1294@gmail.com', 'hello99', 'Bintulu', 'What is your nickname?', 'Siew', 'No.40, Lorong 2A, Taman Desa Damai.', 'Sarawak', 'Bintulu', 97000),
(23, 'Liz Wong Wan Qi', '0198543158', 'Maybank', 161089655074, 'lizwong2001@gmail.com', 'wong2001', 'Bintulu', 'What is your nickname?', 'Liz', 'No.40, Lorong 2A, Taman Desa Damai.', 'Sarawak', 'Bintulu', 97000);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'Action and adventure'),
(2, 2, 'Crafts/hobbies'),
(6, 3, 'Politeknik Textbook'),
(7, 4, 'Reference'),
(8, 1, 'Comic book'),
(11, 1, 'Crime'),
(12, 1, 'Horror'),
(13, 1, 'Romance'),
(14, 1, 'Fantasy'),
(15, 1, 'Fairytale'),
(16, 1, 'Mystery'),
(17, 2, 'Travel'),
(18, 2, 'Journal'),
(19, 2, 'Self help'),
(20, 2, 'Cookbook'),
(21, 2, 'Guide'),
(22, 2, 'Diary'),
(23, 2, 'Art/architecture'),
(24, 3, 'Grade 1-6 Textbook'),
(25, 3, 'Form 1-6 Textbook'),
(26, 3, 'Kolej Textbook'),
(27, 4, 'Dictionary');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text DEFAULT NULL,
  `user_contactno` varchar(20) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(12) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_state` text DEFAULT NULL,
  `user_city` text DEFAULT NULL,
  `user_zipcode` int(5) DEFAULT NULL,
  `securityQuestion` varchar(255) NOT NULL,
  `securityAnswer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_contactno`, `user_email`, `user_password`, `user_address`, `user_state`, `user_city`, `user_zipcode`, `securityQuestion`, `securityAnswer`) VALUES
(7, 'Ling Siew Siew', '01129967222', 'jessicajexo1294@gmail.com', 'ling', 'No.40,Lorong 2A, Taman Desa Damai, 97000 Bintulu,Sarawak.', 'Sarawak', 'Bintulu', 97000, 'What is your nickname?', 'siew'),
(8, 'Liz Wong Wan Qi', '0198543158', 'lizwong2001@gmail.com', '333158', '58, taman putrajaya', 'Sarawak', 'x', 0, 'What is your nickname?', 'x'),
(9, 'Liz Wong Wan Qi', '0198543158', 'lizwong2005@gmail.com', '12345', '58, taman putrajaya', 'Sarawak', 'Bintulu', 97000, 'What is your nickname?', 'lizard');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `book_id`) VALUES
(5, 7, 18),
(14, 8, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_book_id` (`book_id`),
  ADD KEY `cart_user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `request_list`
--
ALTER TABLE `request_list`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `request_list`
--
ALTER TABLE `request_list`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

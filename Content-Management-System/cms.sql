-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Mar 2021, 02:10:52
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_template` varchar(255) NOT NULL,
  `category_seo` varchar(1500) NOT NULL,
  `category_order` int(11) NOT NULL DEFAULT 0,
  `category_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_ID`, `category_name`, `category_url`, `category_template`, `category_seo`, `category_order`, `category_date`) VALUES
(4, 'JavaScript', 'javascript', '', '{\"title\":\"javascript title\",\"description\":\"javascript description\"}', 1, '2021-03-10 02:45:12'),
(5, 'PHP', 'php', '', '{\"title\":\"php title\",\"description\":\"php description\"}', 0, '2021-03-10 03:00:53'),
(7, 'Jquery', 'jquery', '', '{\"title\":\"\",\"description\":\"\"}', 2, '2021-03-13 21:20:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_ID` int(11) NOT NULL,
  `comment_user_ID` int(11) NOT NULL,
  `comment_post_ID` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_ID`, `comment_user_ID`, `comment_post_ID`, `comment_name`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 3, 37, 'furkanaygur', 'admin@admin.com', 'furkan aygur', 2, '2021-03-14 13:13:04'),
(20, 0, 37, 'admin', 'furkan.aygur.1@gmail.com', 'test comment', 1, '2021-03-14 14:17:28'),
(24, 0, 35, 'furkan', 'furkan.aygur.1@gmail.com', 'php post', 1, '2021-03-14 14:22:04'),
(25, 3, 35, 'furkanaygur', 'furkan.aygur.1@gmail.com', 'furkan php post excample', 2, '2021-03-14 14:22:44'),
(26, 3, 40, 'furkanaygur', 'admin@admin.com', 'buraya yorum yazdım', 2, '2021-03-16 15:18:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_ID` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_content` text NOT NULL,
  `contact_read` int(11) NOT NULL DEFAULT 0,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `contact_read_user` int(11) NOT NULL,
  `contact_read_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_ID`, `contact_name`, `contact_email`, `contact_phone`, `contact_subject`, `contact_content`, `contact_read`, `contact_date`, `contact_read_user`, `contact_read_date`) VALUES
(1, 'test', 'abc@mail.com', '', 'test', 'test', 1, '2021-03-08 22:32:20', 3, '2021-03-09 02:31:33'),
(7, 'test', 'abc@mail.com', '', 'test', 'test', 1, '2021-03-09 18:59:23', 3, '2021-03-09 22:01:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_ID` int(11) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_content` text NOT NULL,
  `menu_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_ID`, `menu_title`, `menu_content`, `menu_date`) VALUES
(9, 'Header Menu', '[{\"title\":\"Home\",\"url\":\"index\"},{\"title\":\"Blog\",\"url\":\"\\/project\\/blog\"},{\"title\":\"References\",\"url\":\"\\/reference\\/\",\"submenu\":[{\"title\":\"Web Software\",\"url\":\"\\/project\\/reference\\/web-software\"},{\"title\":\"Mobile Application\",\"url\":\"\\/project\\/reference\\/mobile-application\"},{\"title\":\"Machine Learning\",\"url\":\"\\/project\\/reference\\/machine-learning\"}]},{\"title\":\"About\",\"url\":\"\\/project\\/about\"},{\"title\":\"Contact\",\"url\":\"\\/project\\/contact\"}]', '2021-03-05 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `page_ID` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_seo` varchar(1000) NOT NULL,
  `page_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`page_ID`, `page_title`, `page_url`, `page_content`, `page_seo`, `page_date`) VALUES
(1, 'Being Engineers', 'about-me', '&lt;p id=&quot;d8d8&quot; class=&quot;if ig gp ih b ii ij ik il im in io ip iq ir is it iu iv iw ix iy cr eu&quot; style=&quot;box-sizing: inherit; margin: 24px 0px -0.46em; word-break: break-word; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 21px; background-color: #ffffff;&quot; data-selectable-paragraph=&quot;&quot;&gt;In February, an engineer I&amp;rsquo;d managed for over a year moved to a new team. In one of our last 1:1s, I mentioned that he&amp;rsquo;d recently done some good project management. He replied that he&amp;rsquo;d had an epiphany about self-direction; he&amp;rsquo;d decided that he needed to own everything about his work, not just his code, to make sure his projects succeeded. I was impressed with him and, instantly, disappointed in myself &amp;mdash; I&amp;rsquo;d long considered ownership the most important thing for young engineers to learn, but I&amp;rsquo;d somehow left this engineer to discover that for himself.&lt;/p&gt;\r\n&lt;p id=&quot;73b9&quot; class=&quot;if ig gp ih b ii ja ij ik il jb im in io jc ip iq ir jd is it iu je iv iw iy cr eu&quot; style=&quot;box-sizing: inherit; margin: 2em 0px -0.46em; word-break: break-word; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 21px; background-color: #ffffff;&quot; data-selectable-paragraph=&quot;&quot;&gt;I de&lt;span id=&quot;rmm&quot; style=&quot;box-sizing: inherit;&quot;&gt;c&lt;/span&gt;ided then to write up the practices that I think lift a newly minted software engineer from amateur to professional: the path from fixing bugs as an &amp;ldquo;Engineer 1&amp;rdquo; to leading major projects as a &amp;ldquo;Senior Engineer.&amp;rdquo;&lt;/p&gt;\r\n&lt;p id=&quot;28d6&quot; class=&quot;if ig gp ih b ii ja ij ik il jb im in io jc ip iq ir jd is it iu je iv iw iy cr eu&quot; style=&quot;box-sizing: inherit; margin: 2em 0px -0.46em; word-break: break-word; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; font-size: 21px; background-color: #ffffff;&quot; data-selectable-paragraph=&quot;&quot;&gt;I firmly believe that those skills can be taught, but for my part, I learned the ideas you&amp;rsquo;ll read below The Hard Way over ten years in Silicon Valley. I&amp;rsquo;ve covered some ground in that decade; I hacked on the kernel at a well known fruit company in Cupertino for six years, threw away everything I knew to pursue an interest in distributed systems, spent a year at a startup that became a Unicorn and was subsequently acquired (AppDynamics), became a manager, ended up managing over 20 people at Uber, and eventually returned to my roots as an programmer. I hope that reading this list, however incomplete it may be, saves you some of the mistakes that educated me; I sure wish someone had sent it to me when I was 22.&lt;/p&gt;\r\n&lt;ol class=&quot;&quot; style=&quot;box-sizing: inherit; margin: 0px; padding: 0px; list-style: none none; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif; background-color: #ffffff;&quot;&gt;\r\n&lt;li id=&quot;c5bc&quot; class=&quot;if ig gp ih b ii ja ij ik il jb im in io jc ip iq ir jd is it iu je iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 2em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Reason&lt;/span&gt;&amp;nbsp;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;about business value&lt;/span&gt;: Reason like a CEO. Understand the value of your work to your company and take responsibility for reasoning about quality, feature-richness, and speed. Your job isn&amp;rsquo;t just to write code; your job is to make good decisions and help your company succeed, and that requires understanding what really matters.&lt;/li&gt;\r\n&lt;li id=&quot;e5dc&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Unblock yourself&lt;/span&gt;: Learn to never, ever accept being blocked; find a way by persuasion, escalation, or technical creativity.&amp;nbsp;&lt;mark class=&quot;sa sb lt&quot; style=&quot;box-sizing: inherit; cursor: pointer; background-color: rgba(26, 137, 23, 0.1); color: currentcolor;&quot;&gt;Again, your job isn&amp;rsquo;t just to write the code and wait for everything else to fall into place; your job is to figure out how to create value with your efforts.&lt;/mark&gt;&lt;/li&gt;\r\n&lt;li id=&quot;564e&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Take initiative&lt;/span&gt;: The most common misconception in software is that there are grown-ups out there who are on top of things. Own your team&amp;rsquo;s and company&amp;rsquo;s mission. Don&amp;rsquo;t wait to be told; think about what needs doing and do it or advocate for it. Managers depend on the creativity and intelligence of their engineers, not figuring it all out themselves.&lt;/li&gt;\r\n&lt;li id=&quot;10cc&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Improve your writing&lt;/span&gt;: Crisp technical writing eases collaboration and greatly improves your ability to persuade, inform, and teach. Remember who your audience is and what they know, write clearly and concisely, and almost always include a tl;dr above the fold.&lt;/li&gt;\r\n&lt;li id=&quot;b765&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Own your project management&lt;/span&gt;: Understand the dependency graph for your project, ensure key pieces have owners, write good summaries of plans and status, and proactively inform stakeholders of plans and progress. Practice running meetings! All this enables you to take on much bigger projects and is great preparation for leadership.&lt;/li&gt;\r\n&lt;li id=&quot;ef6a&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Own your education&lt;/span&gt;: Pursue mastery of your craft. Your career should be a journey of constant growth, but no one else will ensure that you grow. Find a way to make learning part of your daily life (even 5 minutes/day); get on mailing lists, find papers and books that are worth reading, and read the manual cover to cover for technologies you work with. Consistency is key; build habits that will keep you growing throughout your career.&lt;/li&gt;\r\n&lt;li id=&quot;618c&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Master your tools&lt;/span&gt;: Mastery of editor, debugger, compiler, IDE, database, network tools, and Unix commands is incredibly empowering and likely the best way to increase your development speed. When you encounter a new technology or command, go deeper than you think you have to; you&amp;rsquo;ll learn tricks that will serve you well again and again.&lt;/li&gt;\r\n&lt;li id=&quot;51fa&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Communicate proactively&lt;/span&gt;: Regular, well-organized communication builds confidence and goodwill in collaborators; knowledge-sharing creates an atmosphere of learning and camaraderie. Share knowledge and set a regular cadence of informing stakeholders on project goals, progress, and obstacles. Give talks and speak up judiciously in meetings.&lt;/li&gt;\r\n&lt;li id=&quot;2464&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Find opportunities to collaborate&lt;/span&gt;: Good collaboration both increases your leverage and improves your visibility in your organization. Advancing your craft as an engineer requires you to have an impact beyond the code you write, and advancing your career requires, to a certain degree, building a personal brand at your company. Cross-functional projects and professional, respectful collaboration are critical to both.&lt;/li&gt;\r\n&lt;li id=&quot;ff2a&quot; class=&quot;if ig gp ih b ii ko ij ik il kp im in io kq ip iq ir kr is it iu ks iv iw iy kl km kn eu&quot; style=&quot;box-sizing: inherit; color: #292929; line-height: 32px; letter-spacing: -0.003em; font-family: charter, Georgia, Cambria, \'Times New Roman\', Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 1.05em;&quot; data-selectable-paragraph=&quot;&quot;&gt;&lt;span class=&quot;ih ce&quot; style=&quot;box-sizing: inherit; font-weight: bold;&quot;&gt;Be professional and reliable&lt;/span&gt;: Think of yourself as a professional and act like one. Come to meetings on time and prepared, then pay attention. Deliver what you say you will and communicate proactively when things go wrong (they will). Keep your cool and express objections respectfully. Show your colleagues respect and appreciation. Minimize your complaining; bring the people around you up, not down. Everyone appreciates a true professional; more importantly, it&amp;rsquo;s the right way to behave.&lt;/li&gt;\r\n&lt;/ol&gt;', '{\"title\":\"about me\",\"description\":\"about me description\"}', '2021-03-10 21:05:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_ID` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_seo` varchar(2000) NOT NULL,
  `post_content` text NOT NULL,
  `post_categories` varchar(500) NOT NULL,
  `post_short_content` varchar(500) NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT 1,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_ID`, `post_title`, `post_url`, `post_seo`, `post_content`, `post_categories`, `post_short_content`, `post_status`, `post_date`) VALUES
(35, 'Php', 'php', '{\"title\":\"\",\"description\":\"\"}', '&lt;p&gt;hpphhphpphphhpphh&lt;/p&gt;', '4,7,5', '&lt;p&gt;phphphphphphphhh&lt;/p&gt;', 2, '2021-03-13 17:43:51'),
(37, 'denem post', 'denem-post', '{\"title\":\"\",\"description\":\"\"}', '&lt;p&gt;asdasdasdasdasdadasdasdads&lt;/p&gt;', '7', '&lt;p&gt;sadsadasdasdassadasd&lt;/p&gt;', 2, '2021-03-13 21:54:00'),
(40, 'denem', 'denem', '{\"title\":\"\",\"description\":\"\"}', '&lt;p&gt;deneme&lt;/p&gt;', '4,7,5', '&lt;p&gt;deenem&lt;/p&gt;', 2, '2021-03-14 23:11:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_tags`
--

CREATE TABLE `post_tags` (
  `ID` int(11) NOT NULL,
  `post_tag_ID` int(11) NOT NULL,
  `tag_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `post_tags`
--

INSERT INTO `post_tags` (`ID`, `post_tag_ID`, `tag_ID`) VALUES
(15, 35, 58),
(16, 35, 59),
(47, 37, 59),
(48, 37, 58),
(49, 37, 82);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference`
--

CREATE TABLE `reference` (
  `reference_ID` int(11) NOT NULL,
  `reference_title` varchar(255) NOT NULL,
  `reference_url` varchar(255) NOT NULL,
  `reference_content` text NOT NULL,
  `reference_categories` varchar(500) NOT NULL,
  `reference_tags` varchar(2000) NOT NULL,
  `reference_demo` varchar(500) NOT NULL,
  `reference_image` varchar(255) NOT NULL,
  `reference_seo` varchar(2000) NOT NULL,
  `reference_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference_categories`
--

CREATE TABLE `reference_categories` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_template` varchar(255) NOT NULL,
  `category_seo` varchar(1000) NOT NULL,
  `category_order` int(11) NOT NULL DEFAULT 0,
  `category_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reference_categories`
--

INSERT INTO `reference_categories` (`category_ID`, `category_name`, `category_url`, `category_template`, `category_seo`, `category_order`, `category_date`) VALUES
(3, 'Mobile Application', 'mobile-application', '', '{\"title\":\"\",\"description\":\"\"}', 1, '2021-03-16 00:11:49'),
(4, 'Web Software', 'web-software', '', '{\"title\":\"\",\"description\":\"\"}', 0, '2021-03-16 00:13:22'),
(5, 'Machine Learning', 'machine-learning', '', '{\"title\":\"\",\"description\":\"\"}', 2, '2021-03-16 00:14:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference_images`
--

CREATE TABLE `reference_images` (
  `image_ID` int(11) NOT NULL,
  `image_reference_ID` int(11) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `image_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reference_images`
--

INSERT INTO `reference_images` (`image_ID`, `image_reference_ID`, `image_url`, `image_content`) VALUES
(4, 9, 'deneme32_4968.jpg', ''),
(6, 9, 'deneme32_8675.jpg', '{\"title\":\"image title\",\"description\":\"image description\"}'),
(12, 7, 'deneme_394.jpg', ''),
(13, 7, 'deneme_3617.jpg', ''),
(14, 7, 'deneme_9797.jpg', ''),
(15, 7, 'deneme_9602.gif', ''),
(16, 7, 'deneme_1341.jpg', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `tag_ID` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_url` varchar(255) NOT NULL,
  `tag_seo` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`tag_ID`, `tag_name`, `tag_url`, `tag_seo`) VALUES
(58, 'php', 'php', '{\"title\":\"php title\",\"description\":\"php description\"}'),
(59, 'web', 'web', ''),
(82, 'javascript', 'javascript', ''),
(83, 'java', 'java', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_url` varchar(25) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_rank` int(11) NOT NULL DEFAULT 3,
  `user_permissions` varchar(2000) NOT NULL DEFAULT '{"index":{"view":"0"},"users":{"view":"0","edit":"0","delete":"0"},"menu-settings":{"add":"0","view":"0","edit":"0","delete":"0"},"settings":{"view":"0","edit":"0"}}',
  `user_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_ID`, `user_name`, `user_url`, `user_email`, `user_password`, `user_rank`, `user_permissions`, `user_date`) VALUES
(3, 'furkanaygur', 'furkanaygur', 'admin@admin.com', '$2y$10$ndnpUAReeCFxyuthJETjOuCIQYXWzb86SDsLpmIdpV5kPluxM4aiG', 2, '{\"index\":{\"view\":\"1\"},\"reference\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"reference-categories\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"users\":{\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"pages\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"posts\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"tags\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"categories\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"comments\":{\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"contact\":{\"view\":\"1\",\"send\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"menu-settings\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"settings\":{\"view\":\"1\",\"edit\":\"1\"}}', '2021-03-04 00:00:00'),
(9, 'admin', 'admin', 'test@test.com', '$2y$10$c4eIhc/pKC985JYBPQ6b7eEVzvM8msQ/Fk.WfLtDsgGfMUpCehM2y', 1, '{\"index\":{\"view\":\"1\"},\"users\":{\"view\":\"1\"},\"pages\":{\"view\":\"1\"},\"posts\":{\"view\":\"1\"},\"tags\":{\"view\":\"1\"},\"categories\":{\"view\":\"1\"},\"comments\":{\"view\":\"1\",\"edit\":\"1\"},\"contact\":{\"view\":\"1\"},\"menu-settings\":{\"view\":\"1\"},\"settings\":{\"view\":\"1\"}}', '2021-03-08 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_ID`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_ID`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_ID`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`);

--
-- Tablo için indeksler `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_ID`);

--
-- Tablo için indeksler `reference_categories`
--
ALTER TABLE `reference_categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Tablo için indeksler `reference_images`
--
ALTER TABLE `reference_images`
  ADD PRIMARY KEY (`image_ID`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_ID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Tablo için AUTO_INCREMENT değeri `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `reference_categories`
--
ALTER TABLE `reference_categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `reference_images`
--
ALTER TABLE `reference_images`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

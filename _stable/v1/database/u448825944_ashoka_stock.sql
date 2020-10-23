-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2020 at 07:59 PM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u448825944_ashoka_stock`
--
CREATE DATABASE IF NOT EXISTS `u448825944_ashoka_stock` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u448825944_ashoka_stock`;

-- --------------------------------------------------------

--
-- Table structure for table `ms_views`
--

CREATE TABLE `ms_views` (
  `log_id` int(255) NOT NULL,
  `log_user_agent` varchar(698) NOT NULL,
  `log_dnt` varchar(698) NOT NULL,
  `log_hash` varchar(698) NOT NULL,
  `log_ip` varchar(698) NOT NULL,
  `log_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `pg_id` int(255) NOT NULL,
  `pg_name` varchar(698) NOT NULL,
  `pg_visit_hash` varchar(698) NOT NULL,
  `pg_dnt` varchar(698) NOT NULL,
  `pg_v_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pg_click`
--

CREATE TABLE `pg_click` (
  `href_id` int(255) NOT NULL,
  `href_type` varchar(698) DEFAULT NULL,
  `href_linkedto` varchar(698) DEFAULT NULL,
  `href_page` varchar(698) DEFAULT NULL,
  `href_dnt` varchar(68) DEFAULT NULL,
  `href_hash` varchar(698) DEFAULT NULL,
  `href_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_logins`
--

CREATE TABLE `sm_logins` (
  `lum_id` int(255) NOT NULL,
  `lum_name` varchar(698) NOT NULL,
  `lum_img_src` varchar(698) NOT NULL,
  `lum_email` varchar(698) NOT NULL,
  `lum_username` varchar(698) NOT NULL,
  `lum_password` varchar(698) NOT NULL,
  `lum_hash` varchar(698) NOT NULL,
  `lum_ad` int(3) NOT NULL DEFAULT 0,
  `lum_ad_level` int(3) NOT NULL DEFAULT 0,
  `lum_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_logins`
--

INSERT INTO `sm_logins` (`lum_id`, `lum_name`, `lum_img_src`, `lum_email`, `lum_username`, `lum_password`, `lum_hash`, `lum_ad`, `lum_ad_level`, `lum_valid`) VALUES
(1, 'Ayan Ahmad', 'img/user_uploads/8bb5ceb6c3eed95be48c13d4a2709c7941.JPG', 'ayanahmad.ahay@gmail.com', '741', 'ayan', 'c5417838b6d2e86c6f8bdd13c9f53c82', 1, 10, 1),
(2, 'King Khan', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'shayankhan283@gmail.com', '123456', 'shayan2000', 'ffd3e97e74449cfca0cbdc83188e3f16', 0, 0, 1),
(3, 'Garvit Zalani', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'zalanigarvit@gmail.com', 'garvit.zalani_ug22@ashoka.edu.in', 'Navyseals013', 'a6241cc65dc050e623ee67bf2e81dbfd', 0, 0, 1),
(4, 'Chaitanya', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'Chaitanyagupta718@gmail.com', '12345', 'Chaitanya12345', 'be088be9ed7147476c481c4ce216bfa4', 0, 0, 1),
(5, 'ding dang', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'konbaronos@gmail.com', 'fo', '1234', '0a40ae5fadb851683b94cba5b3401bd7', 0, 0, 1),
(6, 'Sharan Keswani', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'keswanisharan2@gmail.com', '69420', 'urmama123', 'f4a68d8c331b6d711361296114e470bb', 0, 0, 1),
(7, 'Nishant Sethia', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'sethia2611@gmail.com', 'nishantsethia', 'nish2000', '1a2fa27142841cd22eb3ab2a9487e9c3', 0, 0, 1),
(8, 'Archit Bakshi', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'archhitbakshi@gmail.com', '6969', 'archit', '9906d0a9727f1cb692299e434aa7d0c9', 0, 0, 1),
(9, 'Sharan Keswani', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'keswanisharan3@gmail.com', '42069', 'bumsex123', '8f0fd0f6be8f8af4acd92b823ae55c58', 0, 0, 0),
(10, 'Madiha Ahmad', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'madzcap@hotmail.com', '1', 'hi', 'da6e896faa139341aacabf7845fadd2a', 0, 0, 1),
(11, 'Ashutosh Sharma', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'ashutosh.sharma_ug22@ashoka.edu.in', 'ashutosh.sharma_ug22@ashoka.edu.in', 'Fubjeb-sypfuf-xupqe8', 'e62ea98b2f5e8adf4b2414f85080bb89', 0, 0, 1),
(12, 'Satvik Agarwal', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'satvik.agarwal_ug22@ashoka.edu.in', 'Idk', 'pranshu22', '4df6e8bb98e59e0ead2301607aa29a60', 0, 0, 1),
(13, 'Tarush', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'tarushawasthi7@gmail.com', '1020171114', '1234', '0dddd765e824bc3db297c3417375e0cd', 0, 0, 1),
(14, 'Vibhav Khandelwal', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', 'vibhav.khandelwal_ug21@ashoka.edu.in', '1020181255', 'pepperl', '1894d352f2949eea7b05416d9eae9428', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_modules`
--

CREATE TABLE `sm_modules` (
  `mo_id` int(255) NOT NULL,
  `mo_name` varchar(698) NOT NULL,
  `mo_href` varchar(698) NOT NULL,
  `mo_icon` varchar(698) NOT NULL,
  `mo_ifadmin` int(10) NOT NULL DEFAULT 0,
  `mo_ifnoadmin` int(10) NOT NULL DEFAULT 1,
  `mo_min_ad_level` int(10) NOT NULL DEFAULT 0,
  `mo_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_modules`
--

INSERT INTO `sm_modules` (`mo_id`, `mo_name`, `mo_href`, `mo_icon`, `mo_ifadmin`, `mo_ifnoadmin`, `mo_min_ad_level`, `mo_valid`) VALUES
(1, 'Home', 'home.php', 'fa fa-home', 1, 1, 0, 1),
(2, 'My Account', 'myca.php', 'fa fa-laptop', 1, 1, 0, 0),
(3, 'Manage Users', 'admin_user.php', 'fa fa-users', 1, 0, 9, 1),
(5, 'Market', 'markets.php', 'fa fa-stack-overflow', 0, 1, 0, 1),
(7, 'Manage Reports', 'admin_mods.php', 'fa fa-link', 1, 0, 10, 1),
(8, 'Manage Companies', 'admin_comp.php', 'fa fa-globe', 1, 0, 5, 1),
(9, 'Manage Wallet Funds', 'admin_funds.php', 'fa fa-money', 1, 0, 6, 1),
(12, 'Manage Sessions', 'admin_session.php', 'ion-plus', 1, 0, 5, 1),
(13, 'Manage News', 'admin_news.php', 'fa fa-newspaper-o', 1, 0, 6, 1),
(15, 'Portfolio', 'portfolio.php', 'fa fa-briefcase', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_news`
--

CREATE TABLE `sm_news` (
  `nw_id` int(255) NOT NULL,
  `nw_heading` varchar(698) DEFAULT NULL,
  `nw_text` text NOT NULL,
  `nw_dnt` varchar(698) NOT NULL,
  `nw_up_pos` int(10) NOT NULL,
  `nw_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sm_news`
--

INSERT INTO `sm_news` (`nw_id`, `nw_heading`, `nw_text`, `nw_dnt`, `nw_up_pos`, `nw_valid`) VALUES
(1, NULL, '<ul><li>Government increases taxes on coal-based energy in private sector as a way to promote other means of energy extraction</li><li>FMCG companies expand production by 20% more than pre-pandemic levels.</li><li>Pharma sector R&D shows positive outlook</li><li> Consumer-facing companies to have positive earnings growth</li><li>Aviation sector pulls out business from IT services sector, due to loss of business due to the pandemic.</li><li>Infosys faces a racial discrimination suit by a middle-level manager who was fired in March 2020.</li><li>Aviation sector pulls out business from IT services sector, due to loss of business due to the pandemic.</li></ul>', '1596723811', 1, 1),
(2, NULL, '<ul><li>CEO of Adani Gas resigns during the lockdown, declares that there is no future for unsustainable power.</li><li>Nationwide movement in india to ban the use of chinese products and services. The protestors also demand boycotting of companies using chinese imports as their raw materials and resale items.</li><li>Commodity prices fall sharply amidst fear of another wave of genetically modified COVID 19 during Unlock 1.0</li><li>HCL Tech and Google cloud announce a digital partnership, where google is the offical partner of HCL for its cloud transformation IT services.</li><li>Moody\'s rating agency changes India\'s sovereign rating from Baa3 to Baa2, declare banking sector to be unstable.</li><li>Warren Buffet decreases Berkshire Hathaway\'s investments in airline sector by 40%</li><li>L-Catteron, worlds largest consumer focused PE firm, invests in JIO platforms in the 10th investment round</li><li>Hyundai further loses 20% of its market share during lockdown, primarily due to lack of receptiveness to changes in the lockdow</li><li>New smart helmet technology is incorporated by TVS bikes under their \"Safer Roads\" campaign</li></ul>', '1596723811', 2, 1),
(3, NULL, '<ul><li>Commodity prices show continued fall</li><li>Avenue Supermarket issues bonds</li><li>Divis Labs Palampur unit cleared by USFDA authorities after 3 years of being sealed off.</li><li>Microsoft invests in IT service firms, to promote recovery in businesses affected by the pandemic</li><li>Nationwide movement in india to ban the use of chinese products and services. The protestors also demand boycotting of companies using chinese imports as their raw materials and resale items.</li></ul>', '1596723811', 3, 1),
(4, NULL, '<ul><li>Avenue Supermarts announces search for strategic investor</li><li>Oil prices expected to fall by 40% due to a price war between OPEC and Russia.</li></ul>', '1596723811', 4, 1),
(5, NULL, '<ul><li>Infra Sector shows sign of recovery</li></ul>', '1596723811', 5, 1),
(6, NULL, '<ul><li>Starbucks India reports 21% growth in 2019-20 with TCPL investing 53 cr in the joint venture</li></ul>', '1596723811', 6, 1),
(7, NULL, '<ul><li>Demand affected by hampered supply chains</li><li>Automotive sector shows recovery with rise in rural demand</li></ul>', '1596723811', 7, 1),
(8, NULL, '<ul><li>Rakesh Jhunjhunwala predicts India to have a mother of all bull runs, analysts at other funds call him a \"crazed bull.\"</li><li>Human trials for vaccine delayed by ICMR</li><li>Trump tweets about suspending H1B Visa for 2 years.</li><li>Supply chain plagues ability to supply</li><li>Interglobe aviation resovles the dispute between promoters in a closed door settlement</li><li>Adverse monsoon is predicted and might affect auto sales</li></ul>', '1596723811', 8, 1),
(9, NULL, '<ul><li>Apple launches the new Macbook, priced at an exorbitant-than-ever $3500.</li><li>US State Department clarifies that no change for H1B visa holders</li><li>FMCG shows increase in demand with lockdown relaxation in urban areas</li><li>Government announces tax benefits for auto industry</li><li>Explosion at ONGC factory leaves 20 dead</li><li>Sun pharma shows better performance in overseas operation</li><li>Yes Bank announces a new CEO</li></ul>', '1596723811', 9, 1),
(10, NULL, '<ul><li>TCS wins the government contract to develop the National Health Mission program, beats HCL </li><li>Avenue Supermarket comes short of market expectations for earnings</li><li>Pilots union goes on strike to reduce the cut in their pay</li><li>Reliance stake sale to Saudi Aramco delayed</li><li>M&M faces worker strike following breakdown of labour negotiations between union and management</li><li>Whistleblower complaints leads SEBI to conduct forensic financial analysis in Sun Pharma</li></ul>', '1596723811', 10, 1),
(11, NULL, '<ul><li>Hindustan Petroleum beats market expecations in earnings call</li><li>Interglobe Aviations announces rights issue of equity shares.</li><li>ONGC conforms to market expecations in its earnings call</li></ul>', '1596723811', 11, 1),
(12, NULL, '<ul><li>Central government approves RBI proposal to provide moratoriums on loan payments</li><li>Reliance announces at AGM to enter into the retail sector, stake in Avenue Supermarts to be acquired</li><li>IT sector beats street expectations with higher client retention rates in the adverse scenario</li><li>Government announces GST rate reduction on FMCG products by 6% to boost demands.</li><li>Auto sector shows improvement with  factories at 60% operational levels</li><li>US Pharma company Gilead\'s vaccine for Covid 19 tests successful(more tests to follow); Sun Pharma to be sole distributor of Gilead in India.</li><li>FMCG sector shows strong signs of revival backed by rural demand</li></ul>', '1596723811', 12, 1),
(13, NULL, '<ul><li>Oil and Gas industry shows a lower volume order book of fuels by 10% post opening of lockdown ( compared to volume demanded during lockdown).</li><li>Acquisition talks break down due to promoter disagreements</li><li>Impact of Covid-19 on USA weakens American dollar to the lowest in recent history against INR at Rs 74.</li><li>Sequioa Capital in talks to buy <10% stake in Eicher over the next 4-5 months</li><li>LIC exits certain holdings by selling its stake at a 10% discount to market price</li></ul>', '1596723811', 13, 1),
(14, NULL, '<ul><li>French energy co Total to buy 37.4% stake in Adani Gas</li><li>Reliance launches JioMart, a department store chain. </li><li>Eicher order book impacted due to lack of commercial orders</li><li>ONGC lowers jet fuel(ATF) prices by 2.6% given surplus storage and low supply.</li><li>India Cements defaults on corporate bonds tranche for Q2.</li><li>Maruti announces a change in leadership to \"meet the challenging times\"</li><li>Big shot investor chooses Polycab as one of his top 3 picks in mid-caps. </li></ul>', '1596723811', 14, 1),
(15, NULL, '<ul><li>Government increases VAT on oil and gas for consumers and commercial purposes</li><li>Famous bull investor calls Future Retail as the industry  leader for the future</li><li>Angel Broking gives a bearish view to commercial vehicle manufacturers</li><li>Shiv Nadar steps down as HCL chairman. </li><li>Yes Bank announces liquidity infusion by a consortium of banks led by ICICI</li><li>India Cements issues statement about delayed receivables leading to the default on bonds, says company is still robust.</li><li>Interglobe Aviation successfully renegotiaties provision of jet fuel at prices lower by 2% with Hindustan Petroleum.</li><li>Gold price shoots amid USD crisis, Muthoot finance and Mannapuram Finance bold amid the crisis</li><li>TCS launches EdTech platform, competing with Byju\'s, Upgrad, etc. </li></ul>', '1596723811', 15, 1),
(16, NULL, '<ul><li>Second wave of Covid-19 virus causes a market crash</li></ul>', '1596723811', 16, 1),
(17, NULL, '<ul><li>Robinhood investor surge in markets carry momentum for growth</li></ul>', '1596723811', 17, 1),
(18, NULL, '<ul><li>PLEASE SELL ALL YOUR OPEN TRADES</li></ul>', '1596723811', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_sessions`
--

CREATE TABLE `sm_sessions` (
  `sess_id` int(255) NOT NULL,
  `sess_gen_rel_lum_id` int(255) NOT NULL,
  `sess_gen_dnt` varchar(698) NOT NULL,
  `sess_from` varchar(698) NOT NULL,
  `sess_till` varchar(698) NOT NULL,
  `sess_valid` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_sessions`
--

INSERT INTO `sm_sessions` (`sess_id`, `sess_gen_rel_lum_id`, `sess_gen_dnt`, `sess_from`, `sess_till`, `sess_valid`) VALUES
(1, 1, '1596742780', '1596742780', '1596746020', 1),
(2, 1, '1596746157', '1596746157', '1596749397', 1),
(3, 1, '1596801687', '1596801687', '1596804927', 1),
(4, 1, '1596805480', '1596805480', '1596808720', 0),
(5, 1, '1596808910', '1596808910', '1596812150', 1),
(6, 1, '1596825567', '1596825567', '1596828807', 1),
(7, 1, '1596830381', '1596830381', '1596833621', 1),
(8, 1, '1597062680', '1597062680', '1597065920', 0),
(9, 1, '1597063099', '1597063099', '1597066339', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_stocks`
--

CREATE TABLE `sm_stocks` (
  `stock_id` int(255) NOT NULL,
  `stock_name` varchar(698) NOT NULL,
  `stock_img_src` varchar(698) NOT NULL DEFAULT 'stock_images/default.png',
  `stock_price_1` varchar(125) NOT NULL,
  `stock_price_2` varchar(125) NOT NULL,
  `stock_price_3` varchar(125) NOT NULL,
  `stock_price_4` varchar(125) NOT NULL,
  `stock_price_5` varchar(125) NOT NULL,
  `stock_price_6` varchar(125) NOT NULL,
  `stock_price_7` varchar(125) NOT NULL,
  `stock_price_8` varchar(125) NOT NULL,
  `stock_price_9` varchar(125) NOT NULL,
  `stock_price_10` varchar(125) NOT NULL,
  `stock_price_11` varchar(125) NOT NULL,
  `stock_price_12` varchar(125) NOT NULL,
  `stock_price_13` varchar(125) NOT NULL,
  `stock_price_14` varchar(125) NOT NULL,
  `stock_price_15` varchar(125) NOT NULL,
  `stock_price_16` varchar(125) NOT NULL,
  `stock_price_17` varchar(125) NOT NULL,
  `stock_price_18` varchar(125) NOT NULL,
  `stock_valid` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sm_stocks`
--

INSERT INTO `sm_stocks` (`stock_id`, `stock_name`, `stock_img_src`, `stock_price_1`, `stock_price_2`, `stock_price_3`, `stock_price_4`, `stock_price_5`, `stock_price_6`, `stock_price_7`, `stock_price_8`, `stock_price_9`, `stock_price_10`, `stock_price_11`, `stock_price_12`, `stock_price_13`, `stock_price_14`, `stock_price_15`, `stock_price_16`, `stock_price_17`, `stock_price_18`, `stock_valid`) VALUES
(1, 'Adani Gas', 'stock_images/adani.png', '148.65', '150.43', '135.54', '132.42', '132.42', '132.42', '132.42', '132.42', '132.42', '132.42', '132.42', '132.42', '136.39', '135.99', '143.20', '140.94', '133.89', '147.28', 1),
(2, 'Avenue Supermarts', 'stock_images/avenue.png', '1983.00', '2018.69', '1964.19', '1928.83', '1951.98', '1951.97', '1951.97', '1951.97', '2045.66', '2209.32', '2152.54', '2152.54', '2217.12', '2152.54', '2100.83', '2085.49', '1981.22', '2179.34', 1),
(3, 'Divis Labs', 'stock_images/divis.png', '2264.00', '2338.71', '2371.45', '2433.11', '2443.11', '2443.11', '2443.11', '2443.11', '2404.02', '2404.02', '2404.02', '2404.02', '2476.14', '2404.02', '2404.02', '2404.02', '2283.82', '2512.20', 1),
(4, 'Dr Reddys', 'stock_images/drreddy.png', '4119.00', '4189.02', '4327.26', '4327.20', '4327.20', '4327.20', '4327.20', '4327.20', '4318.55', '4318.55', '4318.55', '4318.55', '4448.11', '4318.55', '4318.55', '4318.55', '4102.62', '4512.88', 1),
(5, 'Eicher', 'stock_images/eicher.png', '18875.50', '19234.13', '19234.13', '19234.13', '19234.13', '19234.13', '19234.13', '19234.13', '18157.02', '18157.02', '18157.02', '18157.02', '18701.73', '19119.34', '18367.24', '18077.49', '17173.62', '18890.98', 1),
(6, 'HCL', 'stock_images/hcl.png', '624.70', '679.05', '666.83', '680.83', '680.82', '680.82', '680.82', '680.82', '663.12', '685.66', '649.60', '649.60', '669.09', '639.35', '639.35', '613.78', '583.09', '641.40', 1),
(7, 'Hindustan Petroleum', 'stock_images/hp.png', '224.00', '224.00', '229.38', '236.95', '230.78', '230.78', '230.78', '230.78', '233.55', '233.55', '233.55', '236.78', '238.74', '231.78', '237.75', '233.46', '221.79', '243.97', 1),
(8, 'Hindustan Uniliever', 'stock_images/hu.png', '2332.35', '2127.10', '2127.10', '2276.00', '2276.00', '2276.00', '2276.00', '2276.00', '2321.52', '2549.03', '2549.03', '2549.03', '2625.50', '2574.52', '2497.28', '2497.28', '2372.42', '2609.66', 1),
(9, 'ICICI', 'stock_images/icici.png', '354.60', '354.60', '320.56', '329.21', '329.21', '329.21', '329.21', '329.21', '334.48', '334.48', '334.48', '334.48', '325.88', '325.88', '325.88', '365.59', '347.31', '382.04', 1),
(10, 'India Cements', 'stock_images/indiacement.png', '117.80', '113.91', '113.91', '113.91', '113.91', '117.65', '117.65', '113.91', '105.82', '105.82', '105.82', '105.82', '108.99', '107.49', '101.47', '111.61', '106.03', '116.63', 1),
(11, 'Infosys', 'stock_images/infosys.png', '905.65', '887.54', '875.11', '874.16', '874.16', '874.15', '874.15', '874.15', '847.93', '860.64', '860.64', '860.64', '886.46', '834.05', '834.05', '834.05', '792.35', '871.58', 1),
(12, 'Interglobe Aviations (Indigo)', 'stock_images/indigo.png', '992.00', '1004.90', '989.82', '989.82', '989.82', '989.82', '989.82', '989.82', '1014.57', '1014.57', '1002.49', '1102.49', '1135.56', '1068.42', '1101.33', '1202.90', '1142.75', '1257.03', 1),
(13, 'Reliance', 'stock_images/reliance.png', '1916.00', '1916.00', '2011.80', '2011.80', '2011.80', '2011.80', '2011.80', '2011.80', '2114.40', '2157.66', '2109.92', '2109.92', '2173.22', '2107.81', '2128.00', '2128.00', '2021.60', '2223.76', 1),
(14, 'LIC', 'stock_images/lic.png', '266.30', '266.30', '257.38', '275.39', '275.39', '275.39', '275.39', '275.39', '275.39', '275.39', '275.39', '275.39', '283.65', '275.39', '275.39', '285.55', '271.27', '298.40', 1),
(15, 'Mahindra', 'stock_images/mahindra.png', '587.55', '587.55', '607.53', '614.21', '617.58', '621.22', '621.22', '651.65', '592.64', '622.28', '583.69', '583.69', '601.20', '565.60', '565.60', '565.60', '537.32', '591.05', 1),
(16, 'Mannapuram Finance', 'stock_images/manappuram.png', '160.80', '160.80', '150.51', '155.17', '155.17', '155.17', '155.17', '155.17', '162.00', '162.00', '162.00', '162.00', '155.75', '155.75', '155.75', '179.20', '170.24', '187.26', 1),
(17, 'Maruti', 'stock_images/maruti.png', '5931.50', '6121.31', '6317.19', '6405.63', '6207.06', '6207.05', '6207.05', '6257.63', '5878.08', '6113.20', '6113.20', '6113.20', '6296.60', '6111.67', '5940.36', '5940.36', '5643.34', '6207.68', 1),
(18, 'Muthoot Finance', 'stock_images/muthoot.png', '1204.45', '1204.45', '1133.39', '1165.12', '1165.12', '1165.12', '1165.12', '1165.12', '1218.72', '1218.72', '1218.72', '1218.72', '1200.59', '1200.59', '1200.59', '1238.41', '1176.49', '1294.14', 1),
(19, 'ONGC', 'stock_images/ongc.png', '80.60', '82.05', '82.05', '80.33', '82.09', '82.09', '82.09', '82.09', '82.99', '81.83', '81.83', '82.96', '88.95', '85.35', '91.68', '87.55', '83.17', '91.49', 1),
(20, 'Polycab', 'stock_images/polycab.png', '822.00', '836.80', '818.39', '818.38', '818.38', '830.45', '830.45', '830.45', '830.45', '830.45', '830.45', '830.45', '855.36', '830.45', '843.81', '843.81', '801.62', '881.78', 1),
(21, 'Sun Pharma', 'stock_images/sunpharma.png', '504.05', '510.10', '510.09', '510.09', '510.09', '510.09', '510.09', '510.09', '505.15', '517.51', '500.95', '500.95', '515.98', '515.95', '515.95', '515.95', '490.15', '539.17', 1),
(22, 'Tata', 'stock_images/tata.png', '106.35', '109.65', '112.39', '114.97', '116.47', '116.47', '125.32', '125.32', '133.02', '133.02', '133.02', '133.02', '137.55', '140.03', '140.03', '145.75', '138.46', '152.31', 1),
(23, 'TCS', 'stock_images/tcs.png', '2207.90', '2139.46', '2100.45', '2335.79', '2335.79', '2335.79', '2335.79', '2335.79', '2279.73', '2382.32', '2415.67', '2415.67', '2488.14', '2387.70', '2387.70', '2418.29', '2297.38', '2527.11', 1),
(24, 'TVS', 'stock_images/tvs.png', '390.40', '399.77', '406.57', '406.56', '406.56', '406.56', '406.56', '406.56', '380.13', '389.64', '389.64', '389.64', '401.33', '377.59', '377.59', '377.59', '358.71', '394.58', 1),
(25, 'Wipro', 'stock_images/wipro.png', '261.65', '257.99', '251.80', '257.84', '257.83', '257.83', '257.83', '257.83', '250.61', '260.54', '260.54', '260.54', '268.36', '253.26', '253.36', '253.36', '240.69', '264.76', 1),
(26, 'Yes Bank', 'stock_images/yesb.png', '19.90', '19.90', '18.95', '18.95', '18.95', '18.95', '18.95', '18.95', '19.18', '20.98', '20.98', '20.98', '15.55', '23.16', '19.69', '15.75', '14.96', '16.46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_transactions`
--

CREATE TABLE `sm_transactions` (
  `tr_id` int(255) NOT NULL,
  `tr_rel_sess_id` int(255) NOT NULL,
  `tr_rel_lum_id` int(255) NOT NULL,
  `tr_rel_stock_id` int(255) NOT NULL,
  `tr_sess_count` varchar(25) NOT NULL,
  `tr_qty` varchar(698) NOT NULL,
  `tr_buy_price` varchar(698) NOT NULL,
  `tr_sell_price` varchar(698) DEFAULT NULL,
  `tr_dnt` varchar(698) NOT NULL,
  `tr_ip` varchar(698) NOT NULL,
  `tr_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sm_transactions`
--

INSERT INTO `sm_transactions` (`tr_id`, `tr_rel_sess_id`, `tr_rel_lum_id`, `tr_rel_stock_id`, `tr_sess_count`, `tr_qty`, `tr_buy_price`, `tr_sell_price`, `tr_dnt`, `tr_ip`, `tr_valid`) VALUES
(1, 1, 2, 4, '1', '500', '4119.00', '4327.20', '1596742820', '73.232.30.155', 1),
(2, 1, 2, 1, '1', '10000', '148.65', '132.42', '1596742862', '73.232.30.155', 1),
(3, 1, 2, 12, '2', '220', '1004.90', '1068.42', '1596743004', '73.232.30.155', 1),
(4, 1, 2, 6, '2', '2000', '679.05', '680.82', '1596743032', '73.232.30.155', 1),
(5, 1, 2, 24, '2', '500', '399.77', '389.64', '1596743115', '73.232.30.155', 1),
(6, 1, 2, 18, '3', '200', '1133.39', '1218.72', '1596743200', '73.232.30.155', 1),
(7, 1, 2, 3, '5', '200', '2443.11', '2404.02', '1596743574', '73.232.30.155', 1),
(8, 1, 2, 15, '5', '6000', '617.58', '621.22', '1596743610', '73.232.30.155', 1),
(9, 1, 2, 22, '6', '20000', '116.47', '125.32', '1596743774', '73.232.30.155', 1),
(10, 1, 2, 1, '14', '50000', '135.99', '143.20', '1596745237', '94.203.255.182', 1),
(11, 1, 2, 12, '14', '1000', '1068.42', '1202.90', '1596745282', '94.203.255.182', 1),
(12, 1, 2, 1, '17', '50000', '133.89', '147.28', '1596745757', '94.203.255.182', 1),
(13, 1, 2, 19, '17', '47647', '83.17', '91.49', '1596745782', '94.203.255.182', 1),
(14, 3, 3, 1, '1', '10', '148.65', '143.20', '1596801731', '27.7.246.82', 1),
(15, 3, 3, 2, '1', '10', '1983.00', '1964.19', '1596801762', '27.7.246.82', 1),
(16, 3, 3, 12, '1', '100', '992.00', '1014.57', '1596801785', '27.7.246.82', 1),
(17, 3, 3, 3, '1', '50', '2264.00', '2371.45', '1596801799', '27.7.246.82', 1),
(18, 3, 3, 4, '1', '50', '4119.00', '4327.26', '1596801809', '27.7.246.82', 1),
(19, 3, 3, 21, '1', '50', '504.05', '517.51', '1596801820', '27.7.246.82', 1),
(20, 3, 3, 13, '2', '100', '1916.00', '2011.80', '1596801931', '27.7.246.82', 1),
(21, 3, 3, 24, '2', '50', '399.77', '401.33', '1596801954', '27.7.246.82', 1),
(22, 3, 3, 9, '3', '100', '320.56', '329.21', '1596802120', '27.7.246.82', 1),
(23, 3, 3, 14, '3', '150', '257.38', '275.39', '1596802139', '27.7.246.82', 1),
(24, 3, 3, 6, '3', '100', '666.83', '680.82', '1596802166', '27.7.246.82', 1),
(25, 3, 3, 11, '3', '500', '875.11', '886.46', '1596802174', '27.7.246.82', 1),
(26, 3, 3, 23, '3', '500', '2100.45', '2335.79', '1596802188', '27.7.246.82', 1),
(27, 3, 3, 3, '3', '500', '2371.45', '2433.11', '1596802205', '27.7.246.82', 1),
(28, 3, 3, 2, '4', '500', '1928.83', '1951.97', '1596802292', '27.7.246.82', 1),
(29, 3, 3, 13, '4', '500', '2011.80', '2157.66', '1596802303', '27.7.246.82', 1),
(30, 3, 3, 10, '5', '1000', '113.91', '117.65', '1596802426', '27.7.246.82', 1),
(31, 3, 3, 22, '6', '5000', '116.47', '125.32', '1596802601', '27.7.246.82', 1),
(32, 3, 3, 10, '7', '1000', '117.65', '117.65', '1596802788', '27.7.246.82', 1),
(33, 3, 3, 15, '7', '5000', '621.22', '651.65', '1596802813', '27.7.246.82', 1),
(34, 3, 3, 17, '7', '800', '6207.05', '6257.63', '1596802835', '27.7.246.82', 1),
(35, 3, 3, 12, '8', '500', '989.82', '1014.57', '1596802992', '27.7.246.82', 1),
(36, 3, 3, 26, '9', '100000', '19.18', '20.98', '1596803150', '27.7.246.82', 1),
(37, 3, 3, 2, '9', '500', '2045.66', '2209.32', '1596803165', '27.7.246.82', 1),
(38, 3, 3, 15, '9', '1000', '592.64', '622.28', '1596803180', '27.7.246.82', 1),
(39, 3, 3, 17, '9', '818', '5878.08', '6113.20', '1596803192', '27.7.246.82', 1),
(40, 3, 3, 23, '9', '2', '2279.73', '2382.32', '1596803212', '27.7.246.82', 1),
(41, 3, 3, 26, '9', '14', '19.18', '20.98', '1596803222', '27.7.246.82', 1),
(42, 3, 3, 23, '10', '4425', '2382.32', '2415.67', '1596803425', '27.7.246.82', 1),
(43, 3, 3, 7, '11', '45778', '233.55', '238.74', '1596803516', '27.7.246.82', 1),
(44, 3, 3, 5, '13', '609', '18701.73', '19119.34', '1596803901', '27.7.246.82', 1),
(45, 3, 3, 20, '14', '5000', '830.45', '843.81', '1596804068', '27.7.246.82', 1),
(46, 3, 3, 13, '14', '2500', '2107.81', '2128.00', '1596804082', '27.7.246.82', 1),
(47, 3, 3, 1, '14', '16361', '135.99', '143.20', '1596804104', '27.7.246.82', 1),
(48, 3, 3, 12, '15', '3500', '1101.33', '1202.90', '1596804270', '27.7.246.82', 1),
(49, 3, 3, 10, '15', '50000', '101.47', '111.61', '1596804297', '27.7.246.82', 1),
(50, 3, 3, 16, '15', '9700', '155.75', '179.20', '1596804316', '27.7.246.82', 1),
(51, 3, 3, 18, '15', '1203', '1200.59', '1238.41', '1596804327', '27.7.246.82', 1),
(52, 3, 3, 10, '15', '2', '101.47', '111.61', '1596804345', '27.7.246.82', 1),
(53, 3, 3, 5, '17', '758', '17173.62', '18890.98', '1596804591', '27.7.246.82', 1),
(54, 3, 3, 15, '17', '2', '537.32', '591.05', '1596804608', '27.7.246.82', 1),
(55, 3, 3, 26, '17', '20', '14.96', '16.46', '1596804633', '27.7.246.82', 1),
(56, 5, 5, 2, '1', '200', '1983.00', '1983.00', '1596808945', '109.246.32.98', 1),
(57, 5, 5, 2, '1', '150', '1983.00', '1983.00', '1596808971', '109.246.32.98', 1),
(58, 5, 5, 7, '1', '1000', '224.00', '224.00', '1596808997', '109.246.32.98', 1),
(59, 5, 5, 7, '1', '50', '224.00', '224.00', '1596809008', '109.246.32.98', 1),
(60, 5, 8, 4, '1', '200', '4119.00', '4327.20', '1596809040', '122.179.250.234', 1),
(61, 5, 4, 3, '1', '400', '2264.00', '2404.02', '1596809047', '122.176.211.207', 1),
(62, 5, 5, 21, '1', '15', '504.05', '510.09', '1596809056', '109.246.32.98', 1),
(63, 5, 5, 1, '1', '1500', '148.65', '150.43', '1596809064', '109.246.32.98', 1),
(64, 5, 4, 2, '2', '45', '2018.69', '1928.83', '1596809105', '122.176.211.207', 1),
(65, 5, 7, 7, '2', '4464', '224.00', '236.95', '1596809168', '122.179.244.18', 1),
(66, 5, 4, 6, '2', '5', '679.05', '680.82', '1596809195', '122.176.211.207', 1),
(67, 5, 8, 6, '2', '200', '679.05', '680.82', '1596809203', '122.179.250.234', 1),
(68, 5, 5, 8, '2', '150', '2127.10', '2276.00', '1596809205', '109.246.32.98', 1),
(69, 5, 5, 2, '2', '150', '2018.69', '1951.98', '1596809212', '109.246.32.98', 1),
(70, 5, 5, 5, '2', '19', '19234.13', '19234.13', '1596809237', '109.246.32.98', 1),
(71, 5, 8, 3, '3', '17', '2371.45', '2443.11', '1596809319', '122.179.250.234', 1),
(72, 5, 5, 12, '3', '50', '989.82', '989.82', '1596809382', '109.246.32.98', 1),
(73, 5, 5, 9, '3', '50', '320.56', '329.21', '1596809391', '109.246.32.98', 1),
(74, 5, 5, 1, '3', '200', '135.54', '132.42', '1596809397', '109.246.32.98', 1),
(75, 5, 5, 3, '3', '100', '2371.45', '2443.11', '1596809407', '109.246.32.98', 1),
(76, 5, 5, 4, '3', '10', '4327.26', '4327.20', '1596809416', '109.246.32.98', 1),
(77, 5, 3, 1, '4', '200', '132.42', NULL, '1596809503', '94.203.255.182', 1),
(78, 5, 3, 1, '4', '123', '132.42', '132.42', '1596809509', '94.203.255.182', 1),
(79, 5, 3, 7, '4', '2333', '236.95', NULL, '1596809519', '94.203.255.182', 1),
(80, 5, 5, 15, '4', '43', '614.21', '617.58', '1596809520', '109.246.32.98', 1),
(81, 5, 8, 4, '4', '200', '4327.20', '4327.20', '1596809591', '122.179.250.234', 1),
(82, 5, 8, 10, '5', '200', '113.91', '117.65', '1596809689', '122.179.250.234', 1),
(83, 5, 7, 21, '5', '800', '510.09', '510.09', '1596809722', '122.179.244.18', 1),
(84, 5, 5, 23, '5', '437', '2335.79', '2335.79', '1596809725', '109.246.32.98', 1),
(85, 5, 7, 6, '5', '400', '680.82', '663.12', '1596809784', '122.179.244.18', 1),
(86, 5, 5, 21, '6', '2003', '510.09', '510.09', '1596809846', '109.246.32.98', 1),
(87, 5, 7, 23, '6', '100', '2335.79', '2335.79', '1596809969', '122.179.244.18', 1),
(88, 5, 7, 4, '6', '33', '4327.20', '4318.55', '1596809985', '122.179.244.18', 1),
(89, 5, 4, 5, '7', '2', '19234.13', '19234.13', '1596810007', '122.176.211.207', 1),
(90, 5, 4, 24, '7', '50', '406.56', '406.56', '1596810022', '122.176.211.207', 1),
(91, 5, 7, 22, '7', '8', '125.32', '125.32', '1596810038', '122.179.244.18', 1),
(92, 5, 5, 3, '7', '418', '2443.11', '2404.02', '1596810046', '109.246.32.98', 1),
(93, 5, 8, 17, '7', '168', '6207.05', '6257.63', '1596810066', '122.179.250.234', 1),
(94, 5, 4, 12, '8', '40', '989.82', '1014.57', '1596810265', '122.176.211.207', 1),
(95, 5, 8, 13, '8', '200', '2011.80', '2107.81', '1596810277', '122.179.250.234', 1),
(96, 5, 7, 13, '8', '180', '2011.80', '2157.66', '1596810296', '122.179.244.18', 1),
(97, 5, 7, 14, '8', '760', '275.39', '275.39', '1596810308', '122.179.244.18', 1),
(98, 5, 8, 17, '9', '100', '5878.08', '6113.20', '1596810436', '122.179.250.234', 1),
(99, 5, 4, 5, '9', '1', '18157.02', '18157.02', '1596810443', '122.176.211.207', 1),
(100, 5, 4, 24, '9', '40', '380.13', '389.64', '1596810459', '122.176.211.207', 1),
(101, 5, 8, 26, '9', '500', '19.18', '20.98', '1596810471', '122.179.250.234', 1),
(102, 5, 4, 2, '9', '8', '2045.66', '2209.32', '1596810472', '122.176.211.207', 1),
(103, 5, 8, 21, '9', '100', '505.15', '517.51', '1596810494', '122.179.250.234', 1),
(104, 5, 7, 8, '9', '144', '2321.52', '2497.28', '1596810495', '122.179.244.18', 1),
(105, 5, 4, 23, '10', '400', '2382.32', '2415.67', '1596810565', '122.176.211.207', 1),
(106, 5, 5, 8, '10', '394', '2549.03', '2574.52', '1596810569', '109.246.32.98', 1),
(107, 5, 8, 23, '10', '200', '2382.32', '2415.67', '1596810664', '122.179.250.234', 1),
(108, 5, 7, 17, '10', '87', '6113.20', '6296.60', '1596810708', '122.179.244.18', 1),
(109, 5, 8, 7, '11', '2000', '233.55', '231.78', '1596810767', '122.179.250.234', 1),
(110, 5, 4, 7, '11', '200', '233.55', '231.78', '1596810794', '122.176.211.207', 1),
(111, 5, 4, 19, '11', '200', '81.83', '82.96', '1596810819', '122.176.211.207', 1),
(112, 5, 8, 19, '11', '2000', '81.83', '82.96', '1596810836', '122.179.250.234', 1),
(113, 5, 8, 17, '12', '111', '6113.20', '6296.60', '1596810982', '122.179.250.234', 1),
(114, 5, 7, 21, '12', '330', '500.95', '515.95', '1596810989', '122.179.244.18', 1),
(115, 5, 4, 13, '12', '200', '2109.92', '2109.92', '1596810995', '122.176.211.207', 1),
(116, 5, 4, 2, '12', '300', '2152.54', '2217.12', '1596811028', '122.176.211.207', 1),
(117, 5, 7, 1, '12', '341', '132.42', '140.94', '1596811064', '122.179.244.18', 1),
(118, 5, 4, 21, '12', '800', '500.95', '515.95', '1596811068', '122.176.211.207', 1),
(119, 5, 7, 11, '13', '400', '886.46', '834.05', '1596811208', '122.179.244.18', 1),
(120, 5, 8, 5, '13', '37', '18701.73', '19119.34', '1596811211', '122.179.250.234', 1),
(121, 5, 6, 14, '13', '100', '283.65', '275.39', '1596811245', '94.204.53.131', 1),
(122, 5, 4, 20, '14', '800', '830.45', '843.81', '1596811293', '122.176.211.207', 1),
(123, 5, 6, 1, '14', '100', '135.99', '143.20', '1596811303', '94.204.53.131', 1),
(124, 5, 8, 13, '14', '200', '2107.81', '2223.76', '1596811337', '122.179.250.234', 1),
(125, 5, 5, 1, '14', '11', '135.99', NULL, '1596811343', '94.203.255.182', 1),
(126, 5, 6, 22, '14', '10', '140.03', '145.75', '1596811346', '94.204.53.131', 1),
(127, 5, 4, 13, '14', '8', '2107.81', '2128.00', '1596811352', '183.83.214.174', 1),
(128, 5, 5, 1, '14', '7300', '135.99', NULL, '1596811355', '94.203.255.182', 1),
(129, 5, 8, 1, '14', '5000', '135.99', '143.20', '1596811355', '122.179.250.234', 1),
(130, 5, 8, 20, '14', '40', '830.45', '843.81', '1596811378', '122.179.250.234', 1),
(131, 5, 7, 1, '14', '1800', '135.99', NULL, '1596811382', '122.179.244.18', 1),
(132, 5, 7, 22, '14', '500', '140.03', '145.75', '1596811420', '122.179.244.18', 1),
(133, 5, 4, 26, '15', '16669', '19.69', '15.75', '1596811478', '183.83.214.174', 1),
(134, 5, 6, 1, '15', '1000', '143.20', '143.20', '1596811513', '94.204.53.131', 1),
(135, 5, 4, 23, '15', '37', '2387.70', '2418.29', '1596811513', '183.83.214.174', 1),
(136, 5, 8, 23, '15', '100', '2387.70', '2418.29', '1596811552', '122.179.250.234', 1),
(137, 5, 8, 12, '15', '400', '1101.33', '1257.03', '1596811565', '122.179.250.234', 1),
(138, 5, 7, 1, '15', '1700', '143.20', '140.94', '1596811569', '122.179.244.18', 1),
(139, 5, 8, 26, '15', '3000', '19.69', '15.75', '1596811584', '122.179.250.234', 1),
(140, 5, 4, 12, '15', '400', '1101.33', '1202.90', '1596811597', '183.83.214.174', 1),
(141, 5, 6, 1, '17', '1000', '133.89', '147.28', '1596811831', '94.204.53.131', 1),
(142, 5, 4, 13, '17', '200', '2021.60', '2223.76', '1596811859', '183.83.214.174', 1),
(143, 5, 7, 13, '17', '300', '2021.60', NULL, '1596811859', '122.179.244.18', 1),
(144, 5, 6, 26, '17', '1000', '14.96', '16.46', '1596811870', '94.204.53.131', 1),
(145, 5, 4, 13, '17', '200', '2021.60', '2223.76', '1596811870', '183.83.214.174', 1),
(146, 5, 6, 7, '17', '1000', '221.79', '243.97', '1596811898', '94.204.53.131', 1),
(147, 5, 7, 23, '17', '100', '2297.38', NULL, '1596811962', '122.179.244.18', 1),
(148, 6, 10, 8, '1', '40', '2332.35', '2549.03', '1596825689', '94.203.255.182', 1),
(149, 6, 10, 21, '1', '100', '504.05', '517.51', '1596825714', '94.203.255.182', 1),
(150, 6, 10, 21, '2', '50', '510.10', '510.09', '1596825860', '94.203.255.182', 1),
(151, 6, 10, 6, '2', '100', '679.05', '685.66', '1596825879', '94.203.255.182', 1),
(152, 6, 10, 24, '2', '1000', '399.77', '406.56', '1596825909', '94.203.255.182', 1),
(153, 6, 10, 14, '3', '500', '257.38', '275.39', '1596826024', '94.203.255.182', 1),
(154, 6, 10, 7, '3', '50', '229.38', '236.95', '1596826065', '94.203.255.182', 1),
(155, 6, 10, 2, '4', '50', '1928.83', '2209.32', '1596826200', '94.203.255.182', 1),
(156, 6, 10, 2, '5', '20', '1951.98', '2209.32', '1596826399', '94.203.255.182', 1),
(157, 6, 10, 22, '6', '500', '116.47', '133.02', '1596826511', '94.203.255.182', 1),
(158, 6, 10, 22, '6', '200', '116.47', '133.02', '1596826622', '94.203.255.182', 1),
(159, 6, 10, 5, '7', '1', '19234.13', '19234.13', '1596826672', '94.203.255.182', 1),
(160, 6, 10, 15, '7', '20', '621.22', '651.65', '1596826707', '94.203.255.182', 1),
(161, 6, 10, 17, '7', '1', '6207.05', '6257.63', '1596826719', '94.203.255.182', 1),
(162, 6, 10, 24, '7', '10', '406.56', '406.56', '1596826737', '94.203.255.182', 1),
(163, 6, 10, 7, '7', '5', '230.78', '233.55', '1596826762', '94.203.255.182', 1),
(164, 6, 10, 26, '7', '10', '18.95', '20.98', '1596826776', '94.203.255.182', 1),
(165, 6, 10, 6, '9', '500', '663.12', '685.66', '1596827050', '94.203.255.182', 1),
(166, 6, 10, 26, '9', '5000', '19.18', '20.98', '1596827107', '94.203.255.182', 1),
(167, 6, 10, 26, '9', '1000', '19.18', '20.98', '1596827149', '94.203.255.182', 1),
(168, 6, 10, 11, '9', '2', '847.93', '860.64', '1596827167', '94.203.255.182', 1),
(169, 6, 10, 23, '10', '250', '2382.32', '2415.67', '1596827301', '94.203.255.182', 1),
(170, 7, 7, 1, '1', '6000', '148.65', NULL, '1596830437', '94.203.255.182', 1),
(171, 9, 13, 3, '1', '441', '2264.00', '2338.71', '1597063164', '49.207.199.53', 1),
(172, 9, 13, 1, '1', '10', '148.65', '135.99', '1597063185', '49.207.199.53', 1),
(173, 9, 11, 2, '1', '100', '1983.00', '1983.00', '1597063190', '103.205.175.239', 1),
(174, 9, 14, 3, '1', '20', '2264.00', '2433.11', '1597063198', '146.196.34.209', 1),
(175, 9, 11, 1, '1', '100', '148.65', '132.42', '1597063229', '103.205.175.239', 1),
(176, 9, 14, 8, '1', '50', '2332.35', '2549.03', '1597063252', '146.196.34.209', 1),
(177, 9, 11, 6, '1', '100', '624.70', '680.82', '1597063263', '103.205.175.239', 1),
(178, 9, 14, 6, '2', '100', '679.05', '685.66', '1597063354', '146.196.34.209', 1),
(179, 9, 13, 13, '2', '538', '1916.00', '2011.80', '1597063361', '49.207.199.53', 1),
(180, 9, 14, 6, '2', '250', '679.05', '685.66', '1597063365', '146.196.34.209', 1),
(181, 9, 14, 13, '2', '100', '1916.00', '2011.80', '1597063436', '146.196.34.209', 1),
(182, 9, 12, 2, '3', '250', '1964.19', '1951.97', '1597063493', '171.79.111.28', 1),
(183, 9, 12, 25, '3', '100', '251.80', '257.83', '1597063526', '171.79.111.28', 1),
(184, 9, 14, 22, '3', '100', '112.39', '125.32', '1597063549', '146.196.34.209', 1),
(185, 9, 11, 9, '3', '2878', '320.56', '329.21', '1597063569', '103.205.175.239', 1),
(186, 9, 13, 11, '3', '1237', '875.11', '874.15', '1597063571', '49.207.199.53', 1),
(187, 9, 12, 3, '3', '100', '2371.45', '2443.11', '1597063595', '171.79.111.28', 1),
(188, 9, 14, 2, '3', '10', '1964.19', '2209.32', '1597063634', '146.196.34.209', 1),
(189, 9, 12, 10, '5', '100', '113.91', '113.91', '1597063844', '171.79.111.28', 1),
(190, 9, 12, 10, '5', '1000', '113.91', '113.91', '1597063855', '171.79.111.28', 1),
(191, 9, 11, 10, '5', '8318', '113.91', '117.65', '1597063862', '103.205.175.239', 1),
(192, 9, 14, 10, '5', '2500', '113.91', '117.65', '1597063924', '146.196.34.209', 1),
(193, 9, 12, 22, '6', '522', '116.47', '125.32', '1597064040', '171.79.111.28', 1),
(194, 9, 11, 2, '6', '543', '1951.97', '1951.97', '1597064073', '103.205.175.239', 1),
(195, 9, 12, 22, '6', '500', '116.47', '125.32', '1597064106', '171.79.111.28', 1),
(196, 9, 14, 22, '6', '500', '116.47', '125.32', '1597064121', '146.196.34.209', 1),
(197, 9, 11, 8, '7', '465', '2276.00', '2276.00', '1597064217', '103.205.175.239', 1),
(198, 9, 12, 22, '7', '1000', '125.32', '125.32', '1597064222', '171.79.111.28', 1),
(199, 9, 12, 15, '7', '200', '621.22', '651.65', '1597064253', '171.79.111.28', 1),
(200, 9, 14, 15, '7', '200', '621.22', '651.65', '1597064301', '146.196.34.209', 1),
(201, 9, 11, 2, '8', '543', '1951.97', '2045.66', '1597064445', '103.205.175.239', 1),
(202, 9, 12, 8, '9', '250', '2321.52', '2549.03', '1597064575', '171.79.111.28', 1),
(203, 9, 14, 26, '9', '1000', '19.18', '20.98', '1597064581', '146.196.34.209', 1),
(204, 9, 11, 11, '9', '1310', '847.93', '860.64', '1597064602', '103.205.175.239', 1),
(205, 9, 12, 2, '9', '100', '2045.66', '2209.32', '1597064617', '171.79.111.28', 1),
(206, 9, 14, 21, '9', '300', '505.15', '517.51', '1597064619', '146.196.34.209', 1),
(207, 9, 12, 15, '9', '300', '592.64', '622.28', '1597064649', '171.79.111.28', 1),
(208, 9, 14, 5, '9', '20', '18157.02', '18701.73', '1597064673', '146.196.34.209', 1),
(209, 9, 12, 21, '9', '100', '505.15', '517.51', '1597064677', '171.79.111.28', 1),
(210, 9, 14, 17, '9', '10', '5878.08', '6113.20', '1597064707', '146.196.34.209', 1),
(211, 9, 14, 23, '10', '150', '2382.32', '2415.67', '1597064781', '146.196.34.209', 1),
(212, 9, 11, 9, '10', '3370', '334.48', '334.48', '1597064800', '103.205.175.239', 1),
(213, 9, 12, 23, '10', '100', '2382.32', '2415.67', '1597064825', '171.79.111.28', 1),
(214, 9, 13, 23, '10', '454', '2382.32', '2415.67', '1597064829', '49.207.199.53', 1),
(215, 9, 12, 22, '10', '1000', '133.02', '133.02', '1597064835', '171.79.111.28', 1),
(216, 9, 14, 23, '10', '100', '2382.32', '2415.67', '1597064870', '146.196.34.209', 1),
(217, 9, 14, 7, '11', '2000', '233.55', '236.78', '1597064954', '146.196.34.209', 1),
(218, 9, 11, 10, '11', '10655', '105.82', '105.82', '1597064968', '103.205.175.239', 1),
(219, 9, 12, 12, '11', '300', '1002.49', '1102.49', '1597064975', '171.79.111.28', 1),
(220, 9, 12, 7, '11', '1200', '233.55', '236.78', '1597064991', '171.79.111.28', 1),
(221, 9, 13, 7, '11', '4696', '233.55', '236.78', '1597065019', '49.207.199.53', 1),
(222, 9, 14, 19, '11', '500', '81.83', '82.96', '1597065075', '146.196.34.209', 1),
(223, 9, 13, 21, '12', '2220', '500.95', '515.98', '1597065120', '49.207.199.53', 1),
(224, 9, 14, 13, '12', '300', '2109.92', '2173.22', '1597065127', '146.196.34.209', 1),
(225, 9, 12, 13, '12', '300', '2109.92', '2173.22', '1597065135', '171.79.111.28', 1),
(226, 9, 12, 23, '12', '100', '2415.67', '2488.14', '1597065149', '171.79.111.28', 1),
(227, 9, 12, 8, '12', '30', '2549.03', '2625.50', '1597065167', '171.79.111.28', 1),
(228, 9, 12, 2, '12', '30', '2152.54', '2217.12', '1597065180', '171.79.111.28', 1),
(229, 9, 14, 6, '12', '118', '649.60', '669.09', '1597065183', '146.196.34.209', 1),
(230, 9, 11, 2, '12', '523', '2152.54', '2217.12', '1597065192', '103.205.175.239', 1),
(231, 9, 12, 21, '12', '249', '500.95', '515.98', '1597065200', '171.79.111.28', 1),
(232, 9, 12, 5, '13', '62', '18701.73', '19119.34', '1597065354', '171.79.111.28', 1),
(233, 9, 14, 5, '13', '55', '18701.73', '19119.34', '1597065357', '146.196.34.209', 1),
(234, 9, 11, 3, '13', '468', '2476.14', '2404.02', '1597065388', '103.205.175.239', 1),
(235, 9, 14, 5, '13', '4', '18701.73', '19119.34', '1597065410', '146.196.34.209', 1),
(236, 9, 14, 1, '14', '4000', '135.99', '143.20', '1597065465', '146.196.34.209', 1),
(237, 9, 14, 13, '14', '200', '2107.81', '2128.00', '1597065478', '146.196.34.209', 1),
(238, 9, 11, 1, '14', '8291', '135.99', '143.20', '1597065491', '103.205.175.239', 1),
(239, 9, 12, 20, '14', '300', '830.45', '843.81', '1597065495', '171.79.111.28', 1),
(240, 9, 12, 1, '14', '3000', '135.99', '143.20', '1597065505', '171.79.111.28', 1),
(241, 9, 12, 13, '14', '257', '2107.81', '2128.00', '1597065518', '171.79.111.28', 1),
(242, 9, 14, 20, '14', '197', '830.45', '843.81', '1597065528', '146.196.34.209', 1),
(243, 9, 11, 23, '15', '497', '2387.70', '2418.29', '1597065679', '103.205.175.239', 1),
(244, 9, 12, 23, '15', '200', '2387.70', '2418.29', '1597065715', '171.79.111.28', 1),
(245, 9, 12, 16, '15', '2000', '155.75', '179.20', '1597065735', '171.79.111.28', 1),
(246, 9, 14, 26, '15', '30000', '19.69', '16.46', '1597065741', '146.196.34.209', 1),
(247, 9, 12, 26, '15', '10000', '19.69', '15.75', '1597065751', '171.79.111.28', 1),
(248, 9, 14, 12, '15', '500', '1101.33', '1202.90', '1597065761', '146.196.34.209', 1),
(249, 9, 12, 12, '15', '222', '1101.33', '1202.90', '1597065790', '171.79.111.28', 1),
(250, 9, 11, 1, '16', '8532', '140.94', '133.89', '1597065970', '103.205.175.239', 1),
(251, 9, 12, 1, '17', '943', '133.89', '147.28', '1597065998', '171.79.111.28', 1),
(252, 9, 11, 2, '17', '576', '1981.22', '2179.34', '1597066006', '103.205.175.239', 1),
(253, 9, 12, 2, '17', '57', '1981.22', '2179.34', '1597066012', '171.79.111.28', 1),
(254, 9, 12, 6, '17', '176', '583.09', '641.40', '1597066030', '171.79.111.28', 1),
(255, 9, 12, 8, '17', '40', '2372.42', '2609.66', '1597066044', '171.79.111.28', 1),
(256, 9, 12, 13, '17', '41', '2021.60', '2223.76', '1597066054', '171.79.111.28', 1),
(257, 9, 12, 15, '17', '193', '537.32', '591.05', '1597066064', '171.79.111.28', 1),
(258, 9, 12, 22, '17', '465', '138.46', '152.31', '1597066076', '171.79.111.28', 1),
(259, 9, 12, 23, '17', '75', '2297.38', '2527.11', '1597066089', '171.79.111.28', 1),
(260, 9, 12, 25, '17', '170', '240.69', '264.76', '1597066098', '171.79.111.28', 1),
(261, 9, 12, 18, '17', '31', '1176.49', '1294.14', '1597066111', '171.79.111.28', 1),
(262, 9, 12, 24, '17', '100', '358.71', '394.58', '1597066124', '171.79.111.28', 1),
(263, 9, 14, 11, '17', '789', '792.35', '871.58', '1597066128', '146.196.34.209', 1),
(264, 9, 12, 9, '17', '847', '347.31', '382.04', '1597066136', '171.79.111.28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_user_logs`
--

CREATE TABLE `sm_user_logs` (
  ` ul_id` int(255) NOT NULL,
  `ul_session_hash` varchar(700) NOT NULL,
  `ul_rel_usr_id` int(255) NOT NULL,
  `ul_ins_dnt` varchar(698) NOT NULL,
  `ul_database` varchar(700) NOT NULL DEFAULT 'a_stk_mktmck',
  `ul_table` varchar(700) NOT NULL,
  `ul_content` text NOT NULL,
  `ul_querytype` varchar(700) NOT NULL,
  `ul_valid` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_wallet_funds`
--

CREATE TABLE `sm_wallet_funds` (
  `wf_id` int(255) NOT NULL,
  `wf_rel_lum_id` int(255) NOT NULL,
  `wf_gen_rel_lum_id` int(255) NOT NULL,
  `wf_val` varchar(698) NOT NULL,
  `wf_valid` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_wallet_funds`
--

INSERT INTO `sm_wallet_funds` (`wf_id`, `wf_rel_lum_id`, `wf_gen_rel_lum_id`, `wf_val`, `wf_valid`) VALUES
(1, 2, 1, '10000000', 1),
(2, 3, 1, '10000000', 1),
(3, 4, 1, '1000000', 1),
(4, 5, 1, '1000000', 1),
(5, 6, 1, '1000000', 1),
(6, 7, 1, '1000000', 1),
(7, 8, 1, '1000000', 1),
(8, 10, 1, '1000000', 1),
(9, 11, 1, '1000000', 1),
(10, 12, 1, '1000000', 1),
(11, 13, 1, '1000000', 1),
(12, 14, 1, '1000000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_views`
--
ALTER TABLE `ms_views`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `pg_click`
--
ALTER TABLE `pg_click`
  ADD PRIMARY KEY (`href_id`);

--
-- Indexes for table `sm_logins`
--
ALTER TABLE `sm_logins`
  ADD UNIQUE KEY `lum_id` (`lum_id`);

--
-- Indexes for table `sm_modules`
--
ALTER TABLE `sm_modules`
  ADD PRIMARY KEY (`mo_id`);

--
-- Indexes for table `sm_news`
--
ALTER TABLE `sm_news`
  ADD PRIMARY KEY (`nw_id`);

--
-- Indexes for table `sm_sessions`
--
ALTER TABLE `sm_sessions`
  ADD PRIMARY KEY (`sess_id`);

--
-- Indexes for table `sm_stocks`
--
ALTER TABLE `sm_stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `sm_transactions`
--
ALTER TABLE `sm_transactions`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `sm_user_logs`
--
ALTER TABLE `sm_user_logs`
  ADD PRIMARY KEY (` ul_id`);

--
-- Indexes for table `sm_wallet_funds`
--
ALTER TABLE `sm_wallet_funds`
  ADD PRIMARY KEY (`wf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_views`
--
ALTER TABLE `ms_views`
  MODIFY `log_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `pg_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pg_click`
--
ALTER TABLE `pg_click`
  MODIFY `href_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_logins`
--
ALTER TABLE `sm_logins`
  MODIFY `lum_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sm_modules`
--
ALTER TABLE `sm_modules`
  MODIFY `mo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sm_news`
--
ALTER TABLE `sm_news`
  MODIFY `nw_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sm_sessions`
--
ALTER TABLE `sm_sessions`
  MODIFY `sess_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sm_stocks`
--
ALTER TABLE `sm_stocks`
  MODIFY `stock_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sm_transactions`
--
ALTER TABLE `sm_transactions`
  MODIFY `tr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `sm_user_logs`
--
ALTER TABLE `sm_user_logs`
  MODIFY ` ul_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_wallet_funds`
--
ALTER TABLE `sm_wallet_funds`
  MODIFY `wf_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

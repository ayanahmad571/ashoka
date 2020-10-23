<?php
die();
$masterString = 'Zerodha records a record 3.4 million new retail investors on its platform. These investors build up the robinhood surge that is driving monumental growth in the stock market, as reported by Bodhi Times

Government increases taxes on coal-based energy in private sector as a way to promote other means of energy extraction
FMCG companies expand production by 20% more than pre-pandemic levels.
Pharma sector R&D shows positive outlook
Google mobility data reports that consumer footfall in marketplaces has been steadily increasing
Aviation sector pulls out business from IT services sector, due to loss of business due to the pandemic.

CEO of Adani Gas resigns during the lockdown citing corporate governance issues
Commodity prices fall sharply amidst reports of China dumping its reserves in the foreign economy
HCL Tech and Google cloud announce a digital partnership, where google is the offical partner of HCL for its cloud transformation IT services.
Moody\'s rating agency changes India\'s sovereign rating from Baa3 to Baa2, declare banking sector to be unstable.
Warren Buffet decreases Berkshire Hathaway\'s investments in airline sector by 40%, no statement on whether the move is startegic or menat to book profits
L-Catteron, worlds largest consumer focused PE firm, invests in JIO platforms in the 10th investment round
Automotive Sales reduce due to the hit in demand

Chinese commodity exports at an all time high
Avenue Supermarket issues bonds
Divis Labs Palampur unit cleared by USFDA authorities after 3 years of being sealed off. Company is back to being able to compete with other competitors

Avenue Supermarts announces search for strategic investor
Oil prices expected to fall by 40% due to a price war within OPEC+
Infoysys faces a racial discrimination suit by a middle-level manager who was fired in March 2020.
New smart helmet technology is incorporated by TVS bikes under their "Safer Roads" campaign

Governemnt allows resumption of public and private construction activity across the country
Yes Bank announces a new CEO
Explosion at ONGC factory leaves 20 dead
Microsoft invests in IT service firms citing them as the most profitable industry for the foreseeable future, to promote recovery in businesses affected by the pandemic

Starbucks India reports 21% growth in 2019-20 with TCPL investing 53 cr in the joint venture
Due to lack of trucks running on road, average freight and goods transported across country shows a 30% dip compared to same period last year

DGCA allows for air travel to resume as part of a phased unlock procedure
A good monsoon gives a boost to rural automotibile demand

Human trials for vaccine delayed by ICMR citing development of an unexplained illness in one of the patients
Trump tweets about suspending H1B Visa for 2 years.
Record number of households shift to natural gas to fulfill domestic requirements as a result of new government subsidy
Interglobe aviation resovles the dispute between promoters in a closed door settlement
Labour unions of auto companies engage in negotiation for revised pay

FMCG shows increase in demand as a result of recent lockdown relaxation in urban areas
Government announces tax benefits for auto industry in order to preserve their liquidity
Sun pharma shows records highest growth in international operations

TCS wins the government contract to develop the National Health Mission program beating HCL for the bid
Avenue Supermarket comes short of market expectations for earnings call, debt situation is worsening
Indigo pilots union goes on strike over a higher pay cut than the company executives
Reliance stake sale to Saudi Aramco delayed due to bureaucratic concerns
Whistleblower complaints lead SEBI to conduct forensic financial analysis of a major cements company

Hindustan Petroleum beats market expecations in earnings call
ONGC conforms to market expecations in its earnings call
US State Department clarifies that no change for H1B visa holders
Mahindra &cMahindra faces worker strike following breakdown of labour negotiations between union and management
The Supreme Court extended the loan moratorium period asking banks not to declare as NPAs the accounts that are unable to make repayments
Media reports confirm that the cement company going through forensic financial analysis is Indian Cements

Reliance announces at AGM to enter into the retail sector, stake in Avenue Supermarts to be acquired
IT sector beats street expectations with higher client retention rates in the adverse scenario
Government announces GST rate reduction on FMCG products by 6% to boost demands.
Auto sector shows improvement with  factories at 60% operational levels following successful resolution with labour unions
US Pharma company Gilead\'s vaccine for Covid 19 tests successful (more tests to follow); Dr Reddys and Divis Labs to be distributors for Gilead in India.

Oil and Gas industry shows a lower volume order book of fuels by 10% post opening of lockdown ( compared to volume demanded during lockdown).
Reliance-Avenue talks prolonged due to promoter disagreements over fair valuation
Construction and materials industry avail special loans allowed by RBI
Eicher order book impacted due to lack of commercial orders
LIC exits certain holdings by selling its stake at a 10% discount to market price
Interglobe Aviations announces rights issue of equity shares.

French energy co. Total to buy 37.4% stake in Adani Gas
Reliance finally completes purchase of Avenue Supermarts at 27000 cr. Avenue Supermarts to be integrated with Jio Mart.
ONGC lowers jet fuel(ATF) prices by 2.6% given surplus storage and low supply. Hindustan petroleum to follow suit.
India Cements defaults on corporate bonds tranche for Q2.
Maruti announces a change in leadership, appointing industry veternan Hardik Arora, to "meet the challenging times"
Big shot investor, Tarush Awasthi, chooses Polycab as one of his top 3 picks in mid-caps.
Bodhi Capital purchases a 10% stake in Muthoot Finance

Government increases VAT on oil and gas for consumers and commercial purposes
Famous bull investor, Garvit Zalani, calls Jio Mart as industry leader of the future
AIC Broking gives a bearish view to commercial vehicle manufacturers
Shiv Nadar steps down as HCL chairman.
Yes Bank announces liquidity infusion by a consortium of banks led by ICICI
India Cements issues statement about delayed receivables leading to the default on bonds, says company is still robust.
Gold price shoots amid USD crisis, Muthoot finance and Mannapuram Finance bold amid the crisis
TCS launches EdTech platform, competing with Byju\'s, Upgrad, etc.

AstraZenica vaccine trials abruptly stop. No announcemnts from any of the players involved in the project.

PLEASE SELL ALL YOUR OPEN TRADES';

$masterRows = explode('

',$masterString);

$updateNo = 1;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a_stk_mktmck";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


foreach($masterRows as $Row){
	echo '<h1>'.$updateNo.'</h1>';
	$allNews = explode('
',$Row);
$toGive = '';
		foreach($allNews as $news){
			$toGive .= $conn->escape_string('<li>'.$news.'</li>');
		}

		$sql = "INSERT INTO `sm_news`(  `nw_text`, `nw_dnt`, `nw_up_pos`) VALUES (
		'<ul>".$toGive."</ul>',
		'".time()."',
		'".$updateNo."'
		);";
		echo $sql;
		/*
		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		*/
	$updateNo++;
}


$conn->close();

?>
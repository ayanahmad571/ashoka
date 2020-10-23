<?php
die();
$masterString = 'Government increases taxes on coal-based energy in private sector as a way to promote other means of energy extraction
FMCG companies expand production by 20% more than pre-pandemic levels.
Pharma sector R&D shows positive outlook
 Consumer-facing companies to have positive earnings growth
Aviation sector pulls out business from IT services sector, due to loss of business due to the pandemic.
Infoysys faces a racial discrimination suit by a middle-level manager who was fired in March 2020.
Aviation sector pulls out business from IT services sector, due to loss of business due to the pandemic.

CEO of Adani Gas resigns during the lockdown, declares that there is no future for unsustainable power.
Nationwide movement in india to ban the use of chinese products and services. The protestors also demand boycotting of companies using chinese imports as their raw materials and resale items.
Commodity prices fall sharply amidst fear of another wave of genetically modified COVID 19 during Unlock 1.0
HCL Tech and Google cloud announce a digital partnership, where google is the offical partner of HCL for its cloud transformation IT services.
Moody\'s rating agency changes India\'s sovereign rating from Baa3 to Baa2, declare banking sector to be unstable.
Warren Buffet decreases Berkshire Hathaway\'s investments in airline sector by 40%
L-Catteron, worlds largest consumer focused PE firm, invests in JIO platforms in the 10th investment round
Hyundai further loses 20% of its market share during lockdown, primarily due to lack of receptiveness to changes in the lockdow
New smart helmet technology is incorporated by TVS bikes under their "Safer Roads" campaign

Commodity prices show continued fall
Avenue Supermarket issues bonds
Divis Labs Palampur unit cleared by USFDA authorities after 3 years of being sealed off.
Microsoft invests in IT service firms, to promote recovery in businesses affected by the pandemic
Nationwide movement in india to ban the use of chinese products and services. The protestors also demand boycotting of companies using chinese imports as their raw materials and resale items.

Avenue Supermarts announces search for strategic investor
Oil prices expected to fall by 40% due to a price war between OPEC and Russia.

Infra Sector shows sign of recovery

Starbucks India reports 21% growth in 2019-20 with TCPL investing 53 cr in the joint venture

Demand affected by hampered supply chains
Automotive sector shows recovery with rise in rural demand

Rakesh Jhunjhunwala predicts India to have a mother of all bull runs, analysts at other funds call him a "crazed bull."
Human trials for vaccine delayed by ICMR
Trump tweets about suspending H1B Visa for 2 years.
Supply chain plagues ability to supply
Interglobe aviation resovles the dispute between promoters in a closed door settlement
Adverse monsoon is predicted and might affect auto sales

Apple launches the new Macbook, priced at an exorbitant-than-ever $3500.
US State Department clarifies that no change for H1B visa holders
FMCG shows increase in demand with lockdown relaxation in urban areas
Government announces tax benefits for auto industry
Explosion at ONGC factory leaves 20 dead
Sun pharma shows better performance in overseas operation
Yes Bank announces a new CEO

TCS wins the government contract to develop the National Health Mission program, beats HCL 
Avenue Supermarket comes short of market expectations for earnings
Pilots union goes on strike to reduce the cut in their pay
Reliance stake sale to Saudi Aramco delayed
M&M faces worker strike following breakdown of labour negotiations between union and management
Whistleblower complaints leads SEBI to conduct forensic financial analysis in Sun Pharma

Hindustan Petroleum beats market expecations in earnings call
Interglobe Aviations announces rights issue of equity shares.
ONGC conforms to market expecations in its earnings call

Central government approves RBI proposal to provide moratoriums on loan payments
Reliance announces at AGM to enter into the retail sector, stake in Avenue Supermarts to be acquired
IT sector beats street expectations with higher client retention rates in the adverse scenario
Government announces GST rate reduction on FMCG products by 6% to boost demands.
Auto sector shows improvement with  factories at 60% operational levels
US Pharma company Gilead\'s vaccine for Covid 19 tests successful(more tests to follow); Sun Pharma to be sole distributor of Gilead in India.
FMCG sector shows strong signs of revival backed by rural demand

Oil and Gas industry shows a lower volume order book of fuels by 10% post opening of lockdown ( compared to volume demanded during lockdown).
Acquisition talks break down due to promoter disagreements
Impact of Covid-19 on USA weakens American dollar to the lowest in recent history against INR at Rs 74.
Sequioa Capital in talks to buy <10% stake in Eicher over the next 4-5 months
LIC exits certain holdings by selling its stake at a 10% discount to market price

French energy co Total to buy 37.4% stake in Adani Gas
Reliance launches JioMart, a department store chain. 
Eicher order book impacted due to lack of commercial orders
ONGC lowers jet fuel(ATF) prices by 2.6% given surplus storage and low supply.
India Cements defaults on corporate bonds tranche for Q2.
Maruti announces a change in leadership to "meet the challenging times"
Big shot investor chooses Polycab as one of his top 3 picks in mid-caps. 

Government increases VAT on oil and gas for consumers and commercial purposes
Famous bull investor calls Future Retail as the industry  leader for the future
Angel Broking gives a bearish view to commercial vehicle manufacturers
Shiv Nadar steps down as HCL chairman. 
Yes Bank announces liquidity infusion by a consortium of banks led by ICICI
India Cements issues statement about delayed receivables leading to the default on bonds, says company is still robust.
Interglobe Aviation successfully renegotiaties provision of jet fuel at prices lower by 2% with Hindustan Petroleum.
Gold price shoots amid USD crisis, Muthoot finance and Mannapuram Finance bold amid the crisis
TCS launches EdTech platform, competing with Byju\'s, Upgrad, etc. 

Second wave of Covid-19 virus causes a market crash

Robinhood investor surge in markets carry momentum for growth

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
		)";
		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}


	$updateNo++;
}


$conn->close();

?>
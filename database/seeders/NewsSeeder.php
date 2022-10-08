<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            // America
            [
                'id' => 1,
                'status' => 1,
                'country_id' => 11,
                'category_id' => 1,
                'source_id' => 1,
                'title' => 'Porsche shares rise in landmark Frankfurt debut',
                'description' => 'The original range for the non-voting preferred shares was set between 76.50 euros',
                'content' => '<h1>Porsche</h1>
                <p><br>&nbsp;shares rose in their stock market debut Thursday, in one of the biggest public offerings in Europe ever.<br>&nbsp;<br>Shares of the iconic sports car brand initially traded at 84 euros ($81) on Thursday morning after they had been priced at the top end of their range late Wednesday, at 82.50 euros. It values the company at roughly 75 billion euros.<br>By 9:30 a.m. London time Thursday shares had steadied at 84.50 euros. Parent company Volkswagen<br>&nbsp;is offering 911 million shares, a reference to Porsche&rsquo;s famous 911 model.<br>&nbsp;<br>&ldquo;Today is a great day for Porsche and a great day for Volkswagen,&rdquo; Arno Antlitz, Volkswagen&rsquo;s chief financial officer told CNBC&rsquo;s &ldquo;Squawk Box Europe&rdquo; Thursday.<br>&nbsp;<br>The organization knew the IPO would be successful, according to Antlitz, citing &ldquo;strong financials&rdquo; and &ldquo;a very convincing strategy for the future.&rdquo;<br>&nbsp;<br><strong>&ldquo;We were convinced despite the challenging environment this IPO would prove successful, and we were right,&rdquo; </strong>he told CNBC&rsquo;s Annette Weisbach.<br>Before trading started reactions were positive, with cornerstone investors having already claimed around 40% of the shares on offer, according to Reuters. Until now the sole owner of Porsche AG, Volkswagen is reducing its stake in the sports car firm, with a 12.5% slice being listed.<br>&nbsp;<br>Listing shares should give Porsche a financial boost of 19.5 billion euros, giving the company more financial flexibility in terms of electric vehicles, according to Volkswagen.<br>&nbsp;<br>The landmark listing comes at a time of market choppiness as the auto industry continues to feel the effects of the war in Ukraine, and valuations of other luxury carmakers including Aston Martin, Ferrari<br>, BMW<br>&nbsp;and Mercedes-Benz<br>&nbsp;have all dropped in recent months.<br>&nbsp;<br>&ldquo;The Porsche AG has completely decoupled itself from the negative market trends,&rdquo; one investor told Reuters, translated by CNBC. Companies are thought to be delaying going public because of current market conditions.&nbsp;<br>The IPO isn&rsquo;t set to be a trailblazer for other companies to follow suit however, as Porsche remains a particularly strong brand with a unique market position. Volkswagen initially announced its plans for Porsche to go public on Sept. 5.<br>&nbsp;<br><em>Antlitz also addressed the ongoing semiconductor shortages, which will continue to be an issue this year.</em><br><em>&nbsp;</em><br>&ldquo;We expect a better supply in 2023, but we expect an easing of the shortage to kick in in 2024,&rdquo; Antlitz told CNBC.<br>&nbsp;</p>
                <p>&nbsp;</p>',
                'author' => 'Hannah Ward-Glenton',
                'url' => 'https://www.cnbc.com/2022/09/29/porsche-shares-rise-in-frankfurt-market-debut.html',
                'image' => 'porche.webp',
                'published_at' => '2022-08-01 00:00:00',
            ],
            [
                'id' => 2,
                'status' => 1,
                'country_id' => 32,
                'category_id' => 2,
                'source_id' => 1,
                'title' => 'What its like to visit Saudi Arabia now',
                'description' => 'Saudis change is deliberate, deep-reaching and dramatic',
                'content' => '<h4>(CNN)</h4>
                <h2>&nbsp;&mdash; I have seen countries change before, but I dont think Ive ever seen anything quite like the change taking place in Saudi Arabia. It is not like the fall of Soviet Europe, nor the upheaval recently witnessed in Sri Lanka. Saudis change is deliberate, deep-reaching and dramatic.<br>It is difficult to visit Saudi Arabia without a host of preconceived ideas, stereotypes and prejudices creeping into what one expects. After all, the country has spent the last five decades shielding itself from the outside world -- and until recently -- making it very difficult for anyone to visit, unless they were on religious pilgrimage to Mecca.</h2>
                <p><br>Weve all heard about how women must be fully covered and veiled, no mixing of the sexes and a religious police force that is draconian and uncompromising. Frankly, it would be surprising if Western tourists wanted to go on vacation there -- its hard to have a good time in that oppressive environment.<br>So the decision by the nations leadership to blow hurricanes of fresh air through the country has turned the whole place on its head. As part of this change, Saudi is spending obscene sums of money creating new cities and tourist attractions -- long-term planning for the post-oil world. In todays Saudi there is only one constant: change at breakneck speed.<br>It would be silly to go further without talking about the man behind these changes -- Crown Prince Mohammed Bin Salman, better known simply as MBS. And no discussion of MBS can take place without reference to the controversy he generates.</p>
                <p>MBS is the architect of Saudi Arabias reforms. He is modernizing the economy at a phenomenal speed, and creating massive opportunities within the country, but he is also heavily criticized for Saudi Arabias human rights record.</p>
                <p><br><strong>Many say hes been selective in his reforms. </strong></p>
                <p>While he famously changed laws allowing women to drive, critics say that there is still very little room for public dissent.<br>The murder of Saudi dissident journalist Jamal Khashoggi makes the point: A US intelligence report says MBS was behind the killing in the Saudi embassy in Istanbul. MBS has consistently and resolutely denied ordering the murder but has said he bears responsibility as Saudi leader.<br>I raise this now because it is the core of the contradiction that is Saudi today: MBS is lauded for making societal and economic reforms, giving new freedoms to millions of ordinary Saudis, yet there is this dark side to the reforms that offends Western values and prevents full-throated endorsement.<br>US President Joe Biden experienced this contradiction when he visited Saudi in July, balancing needs for Saudi oil and economic force with trying to not appear too cozy with the man his office of national intelligence says approved the killing. It is a contradiction to be witnessed in so many ways by anyone visiting this amazing country<br>The genie is out of the bottle<br>There is one fact that everyone here reminds me of with a frequency bordering on a mantra: The majority of people in Saudi Arabia are under 30 (just over 40% are under 25!). Nowhere showcases that better than The Boulevard.<br>This is a new entertainment district in the city, where young women can openly socialize with men and women can veil or not -- their choice. (Yes I know, tradition and social pressure can force you to do things you dont want to do, but we are talking about progress and societal progress is never neat and tidy.)<br>In Saudi, I never expected to see men and women mixing together, DJs pumping out loud tunes and crowds swaying to the music.<br>Yet there it is in front of my eyes.<br>"This only happened in the past five years," explains Rajaa Alsanea. A dentist by training, Alsanea is also the author of "Girls of Riyadh," a fictional tale of four women and their complicated love lives which has been dubbed the Saudi "Sex and the City."</p>
                <p>&nbsp;</p>',
                'author' => 'Richard Quest',
                'url' => 'https://edition.cnn.com/travel/article/saudi-arabia-quest-visit-now/index.html',
                'image' => 'saudi_now.webp',
                'published_at' => '2022-08-02 00:00:00',
            ],
            [
                'id' => 3,
                'status' => 1,
                'country_id' => 40,
                'category_id' => 3,
                'source_id' => 1,
                'title' => 'Italys right-wing, led by Meloni',
                'description' => 'A right-wing alliance led by Giorgia Melonis Brothers of Italy party',
                'content' => '<h1>ROME (Reuters) &ndash; A right-wing alliance led by Giorgia Meloni&rsquo;s Brothers of Italy party was on course for a clear majority in the next parliament, giving the country its most right-wing government since World War Two.</h1>
                <p>Meloni, as leader of the largest coalition party, was also likely to become Italy&rsquo;s first woman prime minister.</p>
                <p>Meloni, 45, plays down her party&rsquo;s post-fascist roots and portrays it as a mainstream conservative group. She has pledged to support Western policy on Ukraine and not take undue risks with the third largest economy in the euro zone.</p>
                <p>However, the outcome is likely to ring alarm bells in European capitals and on financial markets, given the desire to preserve unity in confronting Russia and concerns over Italy&rsquo;s daunting debt mountain.</p>
                <p>An exit poll for state broadcaster RAI said the bloc of conservative parties, that also includes Matteo Salvini&rsquo;s League and Silvio Berlusconi&rsquo;s Forza Italia party, won between 41% and 45%, enough to guarantee control of both houses of parliament.</p>
                <p>&ldquo;Centre-right clearly ahead both in the lower house and the Senate! It&rsquo;ll be a long night but even now I want to say thanks,&rdquo; Salvini said on Twitter.</p>
                <p>Italy&rsquo;s electoral law favours groups that manage to create pre-ballot pacts, giving them an outsized number of seats by comparison with their vote tally.</p>
                <p>RAI said the right-wing alliance would win between 227 and 257 of the 400 seats in the lower house of parliament, and 111-131 of the 200 Senate seats.</p>
                <p>Full results are expected by early Monday.</p>
                <h2>Record low turnout</h2>
                <p><br>The result caps a remarkable rise for Meloni, whose party won only 4% of the vote in the &mdash; national election in 2018, but this time around was forecast to emerge as Italy&rsquo;s largest group on around 22-26%.</p>
                <p>But it was not a ringing endorsement, with provisional data pointing to turnout of just 64.1% against 74% four years ago &mdash; a record low number in a country that has historically enjoyed a high level of voter participation.</p>
                <p>Although heavy storms in the south appeared to have deterred many from voting there, participation fell across a swathe of northern and central cities, where the weather was calmer.</p>
                <p>Italy has a history of political instability and the next prime minister will lead the country&rsquo;s 68th government since 1946 and face a host of problems, notably soaring energy costs and growing economic headwinds.</p>
                <p>Initial market reaction is likely to be muted given that opinion polls had forecast the result accurately.</p>
                <p>&ldquo;I don&rsquo;t expect a big impact although it&rsquo;s not necessarily the case that Italian assets will do particularly well tomorrow (Monday) given how the market is starting to treat Europe and countries with worrisome public finances and exposure to the crisis and Ukraine,&rdquo; said Giuseppe Sersale, fund manager and strategist at Anthilia in Milan.</p>
                <p>Italy&rsquo;s first autumn national election in over a century was triggered by party infighting that brought down Prime Minister Mario Draghi&rsquo;s broad national unity government in July.</p>
                <p>The new, slimmed-down parliament will not meet until Oct. 13, at which point the head of state will summon party leaders and decide on the shape of the new government.</p>
                <p>&nbsp;</p>',
                'author' => 'Reuters',
                'url' => 'https://japannews.yomiuri.co.jp/world/europe/20220926-60613/',
                'image' => 'meloni_italy.webp',
                'published_at' => '2022-08-03 00:00:00',
            ],
            [
                'id' => 4,
                'status' => 1,
                'country_id' => 57,
                'category_id' => 4,
                'source_id' => 1,
                'title' => 'Kishida took initiative in holding state funeral',
                'description' => 'A state funeral for former Prime Minister Shinzo Abe was held Tuesday.',
                'content' => '<h2>Prime minister&rsquo;s determination</h2>
                <p>&ldquo;Here today to mourn your passing are participants from every quarter of Japanese society as well as countries and regions around the globe,&rdquo; Kishida said in his eulogy, while looking at Abe&rsquo;s picture on an altar decorated with flowers that resembled the majestic Mt. Fuji, which Abe was said to have loved.</p>
                <p>During his tenure as prime minister, Abe had many achievements in diplomacy and national security, including deepening the Japan-U.S. alliance. Kishida praised this leadership and pledged to carry on the &ldquo;Abe line,&rdquo; including in domestic politics, as he concluded his remarks.</p>
                <p>It was Kishida who took the initiative on holding a state funeral for Abe. Soon after Abe was fatally shot on July 8 during a roadside speech for the House of Councillors election, Kishida openly showed his anger. &ldquo;It&rsquo;s like a gun being leveled at the entire nation,&rdquo; he said to those around him.</p>
                <p>Two days later, Kishida summoned senior government officials to the Prime Minister&rsquo;s Office and said: &ldquo;The people are also upset. We should make [Abe&rsquo;s funeral proceedings] as close to a state funeral as possible.&rdquo; He instructed them to consider the matter immediately.</p>
                <p>Kishida insisted on holding a state funeral for Abe partly in consideration of the Abe faction, the largest faction in the Liberal Democratic Party. Both Kishida and Abe were also elected to the House of Representatives for the first time in 1993.</p>
                <h2>Controversial links</h2>
                <p><br>The state funeral for former Prime Minister Shigeru Yoshida was held 11 days after his death on October 20, 1967. Then Prime Minister Eisaku Sato is said to have considered it essential to gain the understanding of the Japan Socialist Party, which was the largest opposition party, and instructed his LDP to do so in advance behind the scenes.</p>
                <p>This time, there was brief consideration within the government of providing an explanation in advance to the opposition parties, and going through the process of obtaining approval from the Diet. In the end, however, Kishida decided this was unnecessary. The atmosphere within the government and the ruling party was such that a state funeral was taken for granted, since &ldquo;all of society is in mourning,&rdquo; as people around Kishida expressed it.</p>
                <p>The Cabinet Legislation Bureau supported the decision, saying, &ldquo;There is no problem with the government making the decision.&rdquo;</p>
                <p>Six days after the incident, Kishida announced at a press conference that a state funeral would be held. But the situation did not develop as anticipated, due to the controversy unfolding in connection with the Family Federation for World Peace and Unification, formerly known as the Unification Church.</p>
                <p>The opposition parties, including the Constitutional Democratic Party of Japan, sought to damage the administration by pursuing Abe&rsquo;s ties to the former Unification Church.</p>
                <p>Many within the LDP argued that it was inappropriate to link the controversy to the pros and cons of holding a state funeral for Abe, but opposition parties went on the offensive, not only calling into question Abe&rsquo;s links to the former Unification Church but also claiming that the cost of holding the funeral was unclear.</p>
                <p>In a public opinion poll conducted by the Yomiuri Shimbun from Sept. 2 to 4, 56% of respondents disapproved of the government&rsquo;s decision to hold a state funeral, while only 38% approved. In the Yomiuri&rsquo;s Aug 5-7 survey, 49% approved of the government&rsquo;s decision, and 46% disapproved.</p>
                <p>Kishida did not explain to the Diet the reasons for holding a state funeral until as recently as Sept. 8. Among other things, he said Abe had assumed the heavy responsibility of prime minister for eight years and eight months, the longest on record. However, his explanation before the Diet came nearly two months after his initial announcement and some within the ruling and opposition parties said Kishida only repeated the same explanation that he made earlier. This failed to sufficiently deepen the parties&rsquo; understanding regarding a state funeral, they said.</p>
                <h2><br>The Yomiuri Shimbun</h2>
                <p><br>Avoiding &lsquo;the people&rsquo;<br>In his memorial address, Kishida refrained as much as possible from saying &ldquo;the people,&rdquo; as he was apparently conscious of the split in public opinion. This was to avoid any misunderstanding that he was forcing the people to express condolences.</p>
                <p>At the state funeral for Yoshida, where the people were asked to express condolences, then Prime Minister Sato said, &ldquo;Mr. Yoshida&rsquo;s love for his country and his broad perspective is alive among the people, in feelings of respect and admiration for him.&rdquo; Kishida&rsquo;s eulogy stood in stark contrast to the one delivered by Sato, which emphasized &ldquo;the condolences of the people.&rdquo;</p>
                <p>A senior LDP official said, &ldquo;If [Kishida] had not neglected to lay the groundwork for obtaining opposition parties&rsquo; prior approval and had shown himself committed to providing a careful explanation from the start, he could have sent Mr. Abe off in a more tranquil environment.&rdquo;</p>
                <p>&nbsp;</p>',
                'author' => 'Koichiro Ashikaga',
                'url' => 'https://japannews.yomiuri.co.jp/politics/politics-government/20220928-61091/',
                'image' => 'state_funeral.webp',
                'published_at' => '2022-08-04 00:00:00',
            ],
            [
                'id' => 5,
                'status' => 1,
                'country_id' => 236,
                'category_id' => 5,
                'source_id' => 1,
                'title' => 'Ukrainians told to be ready to fight for Russia',
                'description' => 'The BBC is given rare access to the front line near Kherson where Ukraine is pushing back.',
                'content' => '<h1>Ukraines progress in the southern regions of Kherson and Zaporizhzhia has been far more limited than its successes in the north-east. Front line positions come under regular fire as both Russia and Ukraine attempt to push forward. The BBCs Abdujalil Abdurasulov gained rare access to the front line in Kherson, a region where Ukrainian men have been told they could be drafted to fight for the Russian army.</h1>
                <p>An old Soviet self-propelled howitzer called Gvozdika or "Carnation" is rolled out in an open field and put into position. Its barrel tilts up. "Fire!" comes the command.</p>
                <p>The gunners hastily move away after the last shot, acting quickly.</p>
                <p>Although the advance of Ukrainian forces in the south is very slow, their artillery units remain busy.</p>
                <p>Stus, commander of the gunners, explains that the Russians target his infantry and they respond in order to silence them.</p>
                <p>Their job is very much felt at the front line. Soldiers walk across the vast field under the cover of a line of trees. They pay no attention to the sound of missiles flying above their head nor the thud of explosions. The fighters say a Russian observation post is 500m away and they might be within the range of small arms.</p>
                <p>The Ukrainians move quickly to reach a destroyed farm building that they took back just a week ago. Now, they are digging trenches and carrying sandbags in order to fortify their new position.</p>
                <p>Stus, commander of the gunners standing next to the &ldquo;Gvozdika&rdquo; howitzer<br>Image caption,<br>Stus, commander of the gunners, says troops <strong><em>"shouldnt underestimate our enemy"</em></strong><br>But Ukraines advancement in the south is moving slowly.</p>
                <p>All talk about counter-offensive here helps to deceive Russians and achieve gains in the East, laughs Vasyl, a deputy commander of the regiment.</p>
                <p>"But we have some success here as well. We continue liberating villages with small steps but its very difficult - every victory we have is covered with blood," he adds.</p>
                <p>Many Ukrainians who remain behind the Russian front line, in the occupied territories, are anxiously waiting for this counter-offensive.</p>
                <p><em><strong>"Were euphoric when Ukraine hits the occupied territories,"</strong></em> says Iryna, a resident of Melitopol in the south. <em><strong>"It means that Ukraine has not forgotten us. We all know that living near military infrastructure and buildings is not safe, so most civilians have moved out from those locations."</strong></em></p>
                <p>But for people in the occupied territories, the longer they wait, the harder it is to survive. Many believed that the counter-offensive would happen in August. But when that didnt happen, people started to flee towards Ukrainian controlled territories and areas further to the West.</p>
                <p>Among them was Tatyana Kumok from Melitopol. The Israeli citizen was visiting her hometown when the Russian invasion started in February. She stayed in the city and distributed aid to residents but in September, she and her family decided to leave. One of the main reasons for leaving was Russias promise to hold a so-called referendum.</p>
                <p>"As soon as its done, the Russians will introduce new bans according to their laws and try to legitimise the occupation," she says.</p>
                <p>With the city turned into a giant military base, she says it is clear that Russian troops wont abandon the city easily.</p>
                <p>"It was obvious the city wont be liberated this fall," she adds.</p>
                <p>Tatyana Kumok helping distribute aid<br>Even a silent resistance to Russian occupation is getting dangerous now.</p>
                <p>In September many families were forced to send their children to Russian-administered schools even though their children would be exposed to the Kremlins propaganda.</p>
                <p>"If you dont send your child to school, its a litmus test for you - it means you have pro-Ukrainian views," explains Ms Kumok. "I know parents who had to tell their seven-year-old child not to talk about things discussed at home with anyone at school. Otherwise the child could be taken away. That was really awful."</p>
                <p>A picture taken during a visit to Berdyansk organized by the Russian military shows children at a newly opened kindergarten in Berdyansk, Zaporizhia region<br>IMAGE SOURCE,EPA<br>Image caption,<br>Children at a newly opened nursery in Russian occupied Berdyansk of Zaporizhia region<br>The crackdown on people who do not support Russian rule is rising.</p>
                <p>"There is a sharp increase of arrests since August following the successful Ukrainian air strikes," says Bohdan who is still living in Kherson. He spoke with the BBC via a messenger app and his real name is not being revealed for his safety.</p>
                <p>Bohdan says that earlier detentions were based on a list of names that the Russian military had. But now anyone can be arrested and thrown into a basement for interrogation.</p>
                <p>Russian soldiers recently came to the house of Hanna (not her real name) in Nova-Kakhovka, a city in Kherson region, to check who was living there.</p>
                <p>"They didnt go inside the house but it was still scary. I dont even walk with my phone now," she said via a messenger app.</p>
                <p>A woman casts her ballot during voting in a so-called referendum on the joining of Russian-controlled regions of Ukraine to Russia, in a hospital in Berdyansk, Zaporizhzhia region<br>IMAGE SOURCE,EPA<br>Image caption,<br>A woman in Russian occupied Zaporizhzhia casts her ballot during voting in a so-called referendum<br>The self-styled referendum is bringing a new threat to the local population - mobilisation. Many men could be drafted to fight for the Russian army.</p>
                <p>Russian soldiers are already going house to house in some villages and writing down the names of male residents, local residents say. They claim soldiers have told them to be ready for a call-up after the referendum.</p>
                <p>Men aged 18-35 are reportedly not allowed to leave the occupied territories any more.</p>
                <p>Iryna left on 23 September, the first day of the so-called referendum, with her husband and two children. They wanted to stay in order to look after her paralysed 92-year-old grandmother.</p>
                <p><em><strong>"But when Putin announced the call-up, and we already knew about the referendum, it was clear there would be a mass mobilization and men would be detained right on the street irrespective of their age,"</strong></em> she says.</p>
                <p>"We could survive without gas and electricity, we could find solutions for that. But not for this. That was our red line," says Iryna.</p>
                <p>Vasyl, a deputy commander of the regiment in uniform smiling at the camera<br>Image caption,<br>Vasyl, a deputy commander in the Ukrainian army says "every victory we have is covered with blood"<br>The Russian call-up will pose more challenges for the Ukrainian counter-offensive.</p>
                <p>It will certainly escalate the war and more people will die, Ukrainian soldiers say.</p>
                <p>"We shouldnt underestimate our enemy," says Stus, commander of the gunners. <em><strong>"Those new recruited Russian soldiers will have guns and grenades, so they will pose a threat, which we will have to eliminate"</strong></em>.</p>
                <p>As the gunners wait for new tasks with their howitzer hidden in the bushes, Russian troops hit a nearby Ukrainian village with Grad missiles. The gunners are silent as they listen to the series of explosions.</p>
                <p>That terrifying sound was just another reminder that the success of the Ukrainian troops will depend on how quickly they can make Russian artillery and rocket launchers go silent.</p>',
                'author' => 'Abdujalil Abdurasulov',
                'url' => 'https://www.bbc.com/news/world-europe-63049386',
                'image' => 'Ukraine_war.webp',
                'published_at' => '2022-08-05 00:00:00',
            ],

            // [
            //     'id' => 1,
            //     'country_id' => 11,
            //     'category_id' => 1,
            //     'source_id' => 1,
            //     'title' => 'Lorem ipsum dolor sit amet',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
            //     'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
            //     'author' => 'author1',
            //     'url' => 'aaa.com',
            //     'image' => 'argentina.webp',
            //     'published_at' => '2022-08-01 00:00:00',
            // ],
            // [
            //     'id' => 2,
            //     'country_id' => 32,
            //     'category_id' => 2,
            //     'source_id' => 1,
            //     'title' => 'Lorem ipsum dolor sit amet',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
            //     'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
            //     'author' => 'author2',
            //     'url' => 'bbb.com',
            //     'image' => 'brazil.webp',
            //     'published_at' => '2022-08-02 00:00:00',
            // ],
            // [
            //     'id' => 3,
            //     'country_id' => 40,
            //     'category_id' => 3,
            //     'source_id' => 1,
            //     'title' => 'Lorem ipsum dolor sit amet',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
            //     'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
            //     'author' => 'author3',
            //     'url' => 'ccc.com',
            //     'image' => 'canada.webp',
            //     'published_at' => '2022-08-03 00:00:00',
            // ],
            // [
            //     'id' => 4,
            //     'country_id' => 57,
            //     'category_id' => 4,
            //     'source_id' => 1,
            //     'title' => 'Lorem ipsum dolor sit amet',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
            //     'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
            //     'author' => 'author4',
            //     'url' => 'ddd.com',
            //     'image' => 'cuba.webp',
            //     'published_at' => '2022-08-04 00:00:00',
            // ],
            // [
            //     'id' => 5,
            //     'country_id' => 236,
            //     'category_id' => 5,
            //     'source_id' => 1,
            //     'title' => 'Lorem ipsum dolor sit amet',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
            //     'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
            //     'author' => 'author5',
            //     'url' => 'eee.com',
            //     'image' => 'america.webp',
            //     'published_at' => '2022-08-05 00:00:00',
            // ],

            // Asia
            [
                'id' => 6,
                'status' => 1,
                'country_id' => 46,
                'category_id' => 6,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author6',
                'url' => 'fff.com',
                'image' => 'china.webp',
                'published_at' => '2022-08-06 00:00:00',
            ],
            [
                'id' => 7,
                'status' => 1,
                'country_id' => 103,
                'category_id' => 1,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author7',
                'url' => 'ggg.com',
                'image' => 'india.webp',
                'published_at' => '2022-08-07 00:00:00',
            ],
            [
                'id' => 8,
                'status' => 1,
                'country_id' => 112,
                'category_id' => 2,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'japan.webp',
                'published_at' => '2022-08-08 00:00:00',
            ],
            [
                'id' => 9,
                'status' => 1,
                'country_id' => 175,
                'category_id' => 2,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'philippines.webp',
                'published_at' => '2022-08-09 00:00:00',
            ],
            [
                'id' => 10,
                'status' => 1,
                'country_id' => 109,
                'category_id' => 2,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'israel.webp',
                'published_at' => '2022-08-10 00:00:00',
            ],

            // Europe
            [
                'id' => 11,
                'status' => 1,
                'country_id' => 76,
                'category_id' => 2,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'france.webp',
                'published_at' => '2022-08-11 00:00:00',
            ],
            [
                'id' => 12,
                'status' => 1,
                'country_id' => 166,
                'category_id' => 2,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'norway.webp',
                'published_at' => '2022-08-12 00:00:00',
            ],
            [
                'id' => 13,
                'status' => 1,
                'country_id' => 183,
                'category_id' => 2,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'russia.webp',
                'published_at' => '2022-08-13 00:00:00',
            ],
            [
                'id' => 14,
                'status' => 1,
                'country_id' => 209,
                'category_id' => 2,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'spain.webp',
                'published_at' => '2022-08-14 00:00:00',
            ],
            [
                'id' => 15,
                'status' => 1,
                'country_id' => 235,
                'category_id' => 2,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'uk.webp',
                'published_at' => '2022-08-15 00:00:00',
            ],

            // Africa
            [
                'id' => 16,
                'status' => 1,
                'country_id' => 66,
                'category_id' => 2,
                'source_id' => 4,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'egypt.webp',
                'published_at' => '2022-08-16 00:00:00',
            ],
            [
                'id' => 17,
                'status' => 1,
                'country_id' => 116,
                'category_id' => 2,
                'source_id' => 4,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'kenya.webp',
                'published_at' => '2022-08-17 00:00:00',
            ],
            [
                'id' => 18,
                'status' => 1,
                'country_id' => 206,
                'category_id' => 2,
                'source_id' => 4,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'southafrica.webp',
                'published_at' => '2022-08-18 00:00:00',
            ],
            [
                'id' => 19,
                'status' => 1,
                'country_id' => 205,
                'category_id' => 2,
                'source_id' => 4,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => '',
                'published_at' => '2022-08-19 00:00:00',
            ],
            [
                'id' => 20,
                'status' => 1,
                'country_id' => 211,
                'category_id' => 2,
                'source_id' => 4,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => '',
                'published_at' => '2022-08-20 00:00:00',
            ],

            // Oceania
            [
                'id' => 21,
                'status' => 1,
                'country_id' => 14,
                'category_id' => 2,
                'source_id' => 5,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'australia.webp',
                'published_at' => '2022-08-21 00:00:00',
            ],
            [
                'id' => 22,
                'status' => 1,
                'country_id' => 159,
                'category_id' => 2,
                'source_id' => 5,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => '',
                'published_at' => '2022-08-22 00:00:00',
            ],
            [
                'id' => 23,
                'status' => 1,
                'country_id' => 14,
                'category_id' => 2,
                'source_id' => 5,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'australia.webp',
                'published_at' => '2022-08-23 00:00:00',
            ],
            [
                'id' => 24,
                'status' => 1,
                'country_id' => 159,
                'category_id' => 2,
                'source_id' => 5,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => '',
                'published_at' => '2022-08-24 00:00:00',
            ],
            [
                'id' => 25,
                'status' => 1,
                'country_id' => 14,
                'category_id' => 2,
                'source_id' => 5,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'australia.webp',
                'published_at' => '2022-08-25 00:00:00',
            ],
        ]);
    }
}

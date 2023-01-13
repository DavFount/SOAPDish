<?php

namespace Database\Seeders;

use App\Models\Bible;
use App\Models\Book;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Orchestra\Parser\Xml\Facade as XmlParser;

class BibleSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            'english',
            'ukrainian',
            'russian',
        ];

        $bibles = [
            ['name' => 'English Simplified Version', 'abbreviation' => 'esv', 'language_id' => 1,],
            ['name' => 'Holman Christian Standard Bible', 'abbreviation' => 'hcsb', 'language_id' => 1,],
            ['name' => 'New King James Version', 'abbreviation' => 'nkjv', 'language_id' => 1,],
            ['name' => 'New Living Translation', 'abbreviation' => 'nlt', 'language_id' => 1,],
            ['name' => 'Today\'s New International Version', 'abbreviation' => 'tniv', 'language_id' => 1,],
            ['name' => 'Russian Synodal Bible', 'abbreviation' => 'rst', 'language_id' => 3,],
            ['name' => 'Біблія в пер. Івана Огієнка', 'abbreviation' => 'ubio', 'language_id' => 2,],
        ];

        $books = [
            ['title' => ' Genesis', 'number' => 1, 'testament' => 'Old Testament', 'description' => 'Genesis speaks of beginnings and is foundational to the understanding of the rest of the Bible. It is supremely a book that speaks about relationships, highlighting those between God and his creation, between God and humankind, and between human beings.'],
            ['title' => 'Exodus', 'number' => 2, 'testament' => 'Old Testament', 'description' => 'Exodus describes the history of the Israelites leaving Egypt after slavery. The book lays a foundational theology in which God reveals his name, his attributes, his redemption, his law and how he is to be worshiped.'],
            ['title' => 'Leviticus', 'number' => 3, 'testament' => 'Old Testament', 'description' => 'Leviticus receives its name from the Septuagint (the pre-Christian Greek translation of the Old Testament) and means "concerning the Levites" (the priests of Israel). It serves as a manual of regulations enabling the holy King to set up his earthly throne among the people of his kingdom. It explains how they are to be his holy people and to worship him in a holy manner.'],
            ['title' => 'Numbers', 'number' => 4, 'testament' => 'Old Testament', 'description' => 'Numbers relates the story of Israel\'s journey from Mount Sinai to the plains of Moab on the border of Canaan. The book tells of the murmuring and rebellion of God\'s people and of their subsequent judgment.'],
            ['title' => 'Deuteronomy', 'number' => 5, 'testament' => 'Old Testament', 'description' => 'Deuteronomy ("repetition of the Law") serves as a reminder to God\'s people about His covenant. The book is a "pause" before Joshua\'s conquest begins and a reminder of what God required.'],
            ['title' => 'Joshua', 'number' => 6, 'testament' => 'Old Testament', 'description' => 'Joshua is a story of conquest and fulfillment for the people of God. After many years of slavery in Egypt and 40 years in the desert, the Israelites were finally allowed to enter the land promised to their fathers.'],
            ['title' => 'Judges', 'number' => 7, 'testament' => 'Old Testament', 'description' => 'The book of Judges depicts the life of Israel in the Promised Land—from the death of Joshua to the rise of the monarchy. It tells of urgent appeals to God in times of crisis and apostasy, moving the Lord to raise up leaders (judges) through whom He throws off foreign oppressors and restores the land to peace.'],
            ['title' => 'Ruth', 'number' => 8, 'testament' => 'Old Testament', 'description' => 'The book of Ruth has been called one of the best examples of short narrative ever written. It presents an account of the remnant of true faith and piety in the period of the judges through the fall and restoration of Naomi and her daughter-in-law Ruth (an ancestor of King David and Jesus).'],
            ['title' => '1 Samuel', 'number' => 9, 'testament' => 'Old Testament', 'description' => 'Samuel relates God\'s establishment of a political system in Israel headed by a human king. Through Samuel\'s life, we see the rise of the monarchy and the tragedy of its first king, Saul.'],
            ['title' => '2 Samuel', 'number' => 10, 'testament' => 'Old Testament', 'description' => 'After the failure of King Saul, 2 Samuel depicts David as a true (though imperfect) representative of the ideal theocratic king. Under David\'s rule the Lord caused the nation to prosper, to defeat its enemies, and to realize the fulfillment of His promises.'],
            ['title' => '1 Kings', 'number' => 11, 'testament' => 'Old Testament', 'description' => '1 Kings continues the account of the monarchy in Israel and God\'s involvement through the prophets. After David, his son Solomon ascends the throne of a united kingdom, but this unity only lasts during his reign. The book explores how each subsequent king in Israel and Judah answers God\'s call—or, as often happens, fails to listen.'],
            ['title' => '2 Kings', 'number' => 12, 'testament' => 'Old Testament', 'description' => '2 Kings carries the historical account of Judah and Israel forward. The kings of each nation are judged in light of their obedience to the covenant with God. Ultimately, the people of both nations are exiled for disobedience.'],
            ['title' => '1 Chronicles', 'number' => 13, 'testament' => 'Old Testament', 'description' => 'Just as the author of Kings had organized and interpreted Israel\'s history to address the needs of the exiled community, so the writer of 1 Chronicles wrote for the restored community another history.'],
            ['title' => '2 Chronicles', 'number' => 14, 'testament' => 'Old Testament', 'description' => '2 Chronicles continues the account of Israel\'s history with an eye for restoration of those who had returned from exile.'],
            ['title' => 'Ezra', 'number' => 15, 'testament' => 'Old Testament', 'description' => 'The book of Ezra relates how God\'s covenant people were restored from Babylonian exile to the covenant land as a theocratic (kingdom of God) community even while continuing under foreign rule.'],
            ['title' => 'Nehemiah', 'number' => 16, 'testament' => 'Old Testament', 'description' => 'Closely related to the book of Ezra, Nehemiah chronicles the return of this "cupbearer to the king" and the challenges he and the other Israelites face in their restored homeland.'],
            ['title' => 'Esther', 'number' => 17, 'testament' => 'Old Testament', 'description' => 'Esther records the institution of the annual festival of Purim through the historical account of Esther, a Jewish girl who becomes queen of Persia and saves her people from destruction.'],
            ['title' => 'Job', 'number' => 18, 'testament' => 'Old Testament', 'description' => 'Through a series of monologues, the book of Job relates the account of a righteous man who suffers under terrible circumstances. The book\'s profound insights, its literary structures, and the quality of its rhetoric display the author\'s genius.'],
            ['title' => 'Psalms', 'number' => 19, 'testament' => 'Old Testament', 'description' => 'The Psalms are collected songs and poems that represent centuries worth of praises and prayers to God on a number of themes and circumstances. The Psalms are impassioned, vivid and concrete; they are rich in images, in simile and metaphor.'],
            ['title' => 'Proverbs', 'number' => 20, 'testament' => 'Old Testament', 'description' => 'Proverbs was written to give "prudence to the simple, knowledge and discretion to the young," and to make the wise even wiser. The frequent references to "my son(s)" emphasize instructing the young and guiding them in a way of life that yields rewarding results.'],
            ['title' => 'Ecclesiastes', 'number' => 21, 'testament' => 'Old Testament', 'description' => 'The author of Ecclesiastes puts his powers of wisdom to work to examine the human experience and assess the human situation. His perspective is limited to what happens "under the sun" (as is that of all human teachers).'],
            ['title' => 'Songs of Songs/Solomon', 'number' => 22, 'testament' => 'Old Testament', 'description' => 'In ancient Israel everything human came to expression in words: reverence, gratitude, anger, sorrow, suffering, trust, friendship, commitment. In the Song of Solomon, it is love that finds words–inspired words that disclose its exquisite charm and beauty as one of God\'s choicest gifts.'],
            ['title' => 'Isaiah', 'number' => 23, 'testament' => 'Old Testament', 'description' => 'Isaiah son of Amoz is often thought of as the greatest of the writing prophets. His name means "The Lord saves." Isaiah is a book that unveils the full dimensions of God\'s judgment and salvation.'],
            ['title' => 'Jeremiah', 'number' => 24, 'testament' => 'Old Testament', 'description' => 'This book preserves an account of the prophetic ministry of Jeremiah, whose personal life and struggles are shown to us in greater depth and detail than those of any other Old Testament prophet.'],
            ['title' => 'Lamentations', 'number' => 25, 'testament' => 'Old Testament', 'description' => 'Lamentations consists of a series of poetic and powerful laments over the destruction of Jerusalem (the royal city of the Lord\'s kingdom) in 586 B.C.'],
            ['title' => 'Ezekiel', 'number' => 26, 'testament' => 'Old Testament', 'description' => 'The Old Testament in general and the prophets in particular presuppose and teach God\'s sovereignty over all creation and the course of history. And nowhere in the Bible are God\'s initiative and control expressed more clearly and pervasively than in the book of the prophet Ezekiel.'],
            ['title' => 'Daniel', 'number' => 27, 'testament' => 'Old Testament', 'description' => 'Daniel captures the major events in the life of the prophet Daniel during Israel\'s exile. His life and visions point to God\'s plans of redemption and sovereign control of history.'],
            ['title' => 'Hosea', 'number' => 28, 'testament' => 'Old Testament', 'description' => 'The prophet Hosea son of Beeri lived in the tragic final days of the northern kingdom. His life served as a parable of God\'s faithfulness to an unfaithful Israel.'],
            ['title' => 'Joel', 'number' => 29, 'testament' => 'Old Testament', 'description' => 'The prophet Joel warned the people of Judah about God\'s coming judgment—and the coming restoration and blessing that will come through repentance.'],
            ['title' => 'Amos', 'number' => 30, 'testament' => 'Old Testament', 'description' => 'Amos prophesied during the reigns of Uzziah over Judah (792-740 B.C.) and Jeroboam II over Israel (793-753).'],
            ['title' => 'Obadiah', 'number' => 31, 'testament' => 'Old Testament', 'description' => 'The prophet Obadiah warned the proud people of Edom about the impending judgment coming upon them.'],
            ['title' => 'Jonah', 'number' => 32, 'testament' => 'Old Testament', 'description' => 'Jonah is unusual as a prophetic book in that it is a narrative account of Jonah\'s mission to the city of Nineveh, his resistance, his imprisonment in a great fish, his visit to the city, and the subsequent outcome.'],
            ['title' => 'Micah', 'number' => 33, 'testament' => 'Old Testament', 'description' => 'Micah prophesied sometime between 750 and 686 B.C. during the reigns of Jotham, Ahaz, and Hezekiah, kings of Judah. Israel was in an apostate condition. Micah predicted the fall of her capital, Samaria, and also foretold the inevitable desolation of Judah.'],
            ['title' => 'Nahum', 'number' => 34, 'testament' => 'Old Testament', 'description' => 'The book contains the "vision of Nahum," whose name means "comfort." The focal point of the entire book is the Lord\'s judgment on Nineveh for her oppression, cruelty, idolatry, and wickedness.'],
            ['title' => 'Habakkuk', 'number' => 35, 'testament' => 'Old Testament', 'description' => 'Little is known about Habakkuk except that he was a contemporary of Jeremiah and a man of vigorous faith. The book bearing his name contains a dialogue between the prophet and God concerning injustice and suffering.'],
            ['title' => 'Zephaniah', 'number' => 36, 'testament' => 'Old Testament', 'description' => 'The prophet Zephaniah was evidently a person of considerable social standing in Judah and was probably related to the royal line. The intent of the author was to announce to Judah God\'s approaching judgment.'],
            ['title' => 'Haggai', 'number' => 37, 'testament' => 'Old Testament', 'description' => 'Haggai was a prophet who, along with Zechariah, encouraged the returned exiles to rebuild the temple. His prophecies clearly show the consequences of disobedience. When the people give priority to God and his house, they are blessed.'],
            ['title' => 'Zechariah', 'number' => 38, 'testament' => 'Old Testament', 'description' => 'Like Jeremiah and Ezekiel, Zechariah was not only a prophet, but also a member of a priestly family. The chief purpose of Zechariah (and Haggai) was to rebuke the people of Judah and to encourage and motivate them to complete the rebuilding of the temple.'],
            ['title' => 'Malachi', 'number' => 39, 'testament' => 'Old Testament', 'description' => 'Malachi, whose name means "my messenger," spoke to the Israelites after their return from exile. The theological message of the book can be summed up in one sentence: The Great King will come not only to judge his people, but also to bless and restore them.'],
            ['title' => 'Matthew', 'number' => 40, 'testament' => 'New Testament', 'description' => 'Matthew\'s main purpose in writing his Gospel (the "good news") is to prove to his Jewish readers that Jesus is their Messiah. He does this primarily by showing how Jesus in his life and ministry fulfilled the Old Testament Scriptures.'],
            ['title' => 'Mark', 'number' => 41, 'testament' => 'New Testament', 'description' => 'Since Mark\'s Gospel (the "good news") is traditionally associated with Rome, it may have been occasioned by the persecutions of the Roman church in the period c. A.D. 64-67. Mark may be writing to prepare his readers for such suffering by placing before them the life of our Lord.'],
            ['title' => 'Luke', 'number' => 42, 'testament' => 'New Testament', 'description' => 'Luke\'s Gospel (the "good news") was written to strengthen the faith of all believers and to answer the attacks of unbelievers. It was presented to debunk some disconnected and ill-founded reports about Jesus. Luke wanted to show that the place of the Gentile (non-Jewish) Christian in God\'s kingdom is based on the teaching of Jesus.'],
            ['title' => 'John', 'number' => 43, 'testament' => 'New Testament', 'description' => 'John\'s Gospel (the "good news") is rather different from the other three, highlighting events not detailed in the others. The author himself states his main purpose clearly in 20:31: "that you may believe that Jesus is the Christ, the Son of God, and that by believing you may have life in his name."'],
            ['title' => 'Acts', 'number' => 44, 'testament' => 'New Testament', 'description' => 'The book of Acts provides a bridge for the writings of the New Testament. As a second volume to Luke\'s Gospel, it joins what Jesus "began to do and to teach" as told in the Gospels with what he continued to do and teach through the apostles\' preaching and the establishment of the church.'],
            ['title' => 'Romans', 'number' => 45, 'testament' => 'New Testament', 'description' => 'Paul\'s primary theme in Romans is presenting the gospel (the "good news"), God\'s plan of salvation and righteousness for all humankind, Jew and non-Jew alike.'],
            ['title' => '1 Corinthians', 'number' => 46, 'testament' => 'New Testament', 'description' => 'The first letter to the Corinthians revolves around the theme of problems in Christian conduct in the church. It thus has to do with progressive sanctification, the continuing development of a holy character. Obviously Paul was personally concerned with the Corinthians\' problems, revealing a true pastor\'s (shepherd\'s) heart.'],
            ['title' => '2 Corinthians', 'number' => 47, 'testament' => 'New Testament', 'description' => 'Because of the occasion that prompted this letter, Paul had a number of purposes in mind: to express the comfort and joy Paul felt because the Corinthians had responded favorably to his painful letter; to let them know about the trouble he went through in the province of Asia; and to explain to them the true nature (its joys, sufferings and rewards) and high calling of Christian ministry.'],
            ['title' => 'Galatians', 'number' => 48, 'testament' => 'New Testament', 'description' => 'Galatians stands as an eloquent and vigorous apologetic for the essential New Testament truth that people are justified by faith in Jesus Christ—by nothing less and nothing more—and that they are sanctified not by legalistic works but by the obedience that comes from faith in God\'s work for them.'],
            ['title' => 'Ephesians', 'number' => 49, 'testament' => 'New Testament', 'description' => 'Written to the church in Ephesus during Paul\'s first imprisonment, Ephesians covers a variety of subjects including the gift of grace, love and how to walk as fruitful followers of Jesus. '],
            ['title' => 'Philippians', 'number' => 50, 'testament' => 'New Testament', 'description' => 'Paul\'s primary purpose in writing this letter was to thank the Philippians for the gift they had sent him upon learning of his detention at Rome. However, he makes use of this occasion to fulfill several other desires: (1) to report on his own circumstances; (2) to encourage the Philippians to stand firm in the face of persecution and rejoice regardless of circumstances; and (3) to exhort them to humility and unity.'],
            ['title' => 'Colossians', 'number' => 51, 'testament' => 'New Testament', 'description' => 'Paul\'s purpose is to refute the Colossian heresy. To accomplish this goal, he exalts Christ as the very image of God, the Creator, the preexistent sustainer of all things, the head of the church, the first to be resurrected, the fullness of deity (God) in bodily form, and the reconciler.'],
            ['title' => '1 Thessalonians', 'number' => 52, 'testament' => 'New Testament', 'description' => 'Although the thrust of the letter is varied, the subject of eschatology (doctrine of last things) seems to be predominant in both Thessalonian letters. Every chapter of 1 Thessalonians ends with a reference to the second coming of Christ.'],
            ['title' => '2 Thessalonians', 'number' => 53, 'testament' => 'New Testament', 'description' => 'Since the situation in the Thessalonian church has not changed substantially, Paul\'s purpose in writing is very much the same as in his first letter to them. He writes (1) to encourage persecuted believers, (2) to correct a misunderstanding concerning the Lord\'s return, and (3) to exhort the Thessalonians to be steadfast and to work for a living.'],
            ['title' => '1 Timothy', 'number' => 54, 'testament' => 'New Testament', 'description' => 'During his fourth missionary journey, Paul had instructed Timothy to care for the church at Ephesus while he went on to Macedonia. When he realized that he might not return to Ephesus in the near future, he wrote this first letter to Timothy to develop the charge he had given his young assistant. This is the first of the "Pastoral Epistles."'],
            ['title' => '2 Timothy', 'number' => 55, 'testament' => 'New Testament', 'description' => 'Paul was concerned about the welfare of the churches during this time of persecution under Nero, and he admonishes Timothy to guard the gospel, to persevere in it, to keep on preaching it, and, if necessary, to suffer for it. This is the second "Pastoral Epistle."'],
            ['title' => 'Titus', 'number' => 56, 'testament' => 'New Testament', 'description' => 'Apparently Paul introduced Christianity in Crete when he and Titus visited the island, after which he left Titus there to organize the converts. Paul sent the letter with Zenas and Apollos, who were on a journey that took them through Crete, to give Titus personal authorization and guidance in meeting opposition, instructions about faith and conduct, and warnings about false teachers. This is the last of the "Pastoral Epistles."'],
            ['title' => 'Philemon', 'number' => 57, 'testament' => 'New Testament', 'description' => 'To win Philemon\'s willing acceptance of the runaway slave Onesimus, Paul writes very tactfully and in a lighthearted tone, which he creates with wordplay. The appeal is organized in a way prescribed by ancient Greek and Roman teachers: to build rapport, to persuade the mind, and to move the emotions.'],
            ['title' => 'Hebrews', 'number' => 58, 'testament' => 'New Testament', 'description' => 'The theme of Hebrews is the absolute supremacy and sufficiency of Jesus Christ as revealer and as mediator of God\'s grace. A striking feature of this presentation of the gospel is the unique manner in which the author employs expositions of eight specific passages of the Old Testament Scriptures.'],
            ['title' => 'James', 'number' => 59, 'testament' => 'New Testament', 'description' => 'Characteristics that make the letter distinctive are: (1) its unmistakably Jewish nature; (2) its emphasis on vital Christianity, characterized by good deeds and a faith that works (genuine faith must and will be accompanied by a consistent lifestyle); (3) its simple organization; (4) and its familiarity with Jesus\' teachings preserved in the Sermon on the Mount.'],
            ['title' => '1 Peter', 'number' => 60, 'testament' => 'New Testament', 'description' => 'Although 1 Peter is a short letter, it touches on various doctrines and has much to say about Christian life and duties. It is not surprising that different readers have found it to have different principal themes. For example, it has been characterized as a letter of separation, of suffering and persecution, of suffering and glory, of hope, of pilgrimage, of courage, and as a letter dealing with the true grace of God.'],
            ['title' => '2 Peter', 'number' => 61, 'testament' => 'New Testament', 'description' => 'In his first letter Peter feeds Christ\'s sheep by instructing them how to deal with persecution from outside the church; in this second letter he teaches them how to deal with false teachers and evildoers who have come into the church.'],
            ['title' => '1 John', 'number' => 62, 'testament' => 'New Testament', 'description' => 'John\'s readers were confronted with an early form of Gnostic teaching of the Cerinthian variety. This heresy was also libertine, throwing off all moral restraints. Consequently, John wrote this letter with two basic purposes in mind: (1) to expose false teachers and (2) to give believers assurance of salvation.'],
            ['title' => '2 John', 'number' => 63, 'testament' => 'New Testament', 'description' => 'During the first two centuries the gospel was taken from place to place by traveling evangelists and teachers. Believers customarily took these missionaries into their homes and gave them provisions for their journey when they left. Since Gnostic teachers also relied on this practice, 2 John was written to urge discernment in supporting traveling teachers'],
            ['title' => '3 John', 'number' => 64, 'testament' => 'New Testament', 'description' => 'Itinerant teachers sent out by John were rejected in one of the churches in the province of Asia by a dictatorial leader, Diotrephes, who even excommunicated members who showed hospitality to John\'s messengers. John wrote this letter to commend Gaius for supporting the teachers and, indirectly, to warn Diotrephes.'],
            ['title' => 'Jude', 'number' => 65, 'testament' => 'New Testament', 'description' => 'Although Jude was very eager to write to his readers about salvation, he felt that he must instead warn them about certain immoral men circulating among them who were perverting the grace of God. Apparently these false teachers were trying to convince believers that being saved by grace gave them license to sin since their sins would no longer be held against them.'],
            ['title' => 'Revelation', 'number' => 66, 'testament' => 'New Testament', 'description' => 'John writes to encourage the faithful to resist staunchly the demands of emperor worship. He informs his readers that the final showdown between God and Satan is imminent. Satan will increase his persecution of believers, but they must stand fast, even to death. They are sealed against any spiritual harm and will soon be vindicated when Christ returns, when the wicked are forever destroyed, and when God\'s people enter an eternity of glory and blessedness.'],

        ];

        foreach ($languages as $language) {
            Language::create([
                'name' => $language
            ]);
        }

        foreach ($bibles as $bible) {
            Bible::create([
                'language_id' => Language::find($bible['language_id'])->id,
                'name' => $bible['name'],
                'abbreviation' => $bible['abbreviation']
            ]);
        }

        foreach ($bibles as $bible) {
            foreach ($books as $book) {
                Book::create([
                    'bible_id' => Bible::firstWhere('name', $bible['name'])->id,
                    'title' => $book['title'],
                    'number' => $book['number'],
                    'testament' => $book['testament'],
                    'description' => $book['description'],
                ]);
            }
        }

//        $path = 'storage/bibles/bible_english_esv.xml';
//        $xml = XmlParser::load($path);
//
//        $bible = $xml->parse([
//            'book' => ['uses' => 'BIBLEBOOK'],
//            'name' => ['uses' => 'BIBLEBOOK::bname']
//        ]);
//
//        dd($bible['book']['@attributes']);
    }
}

<?php namespace App\Http\Controllers;

use Elvish,
    Input,
    Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'types' => $this->getContentTypes()
        ]);
    }

    public function doContent()
    {
        if (Input::has('type')) {
            return Redirect::route('content', Input::except('_token'));
        }
        return Redirect::route('home');
    }

    public function showContent($type, $count = 5)
    {
        return view('content', [
            'type' => $type,
            'count' => $count,
            'link' => Input::has('link'),
            'types' => $this->getContentTypes(),
            'content' => $this->getContentByTypeAndCount($type, $count)
        ]);
    }

    public function doDefine()
    {
        $keyword = Input::get('keyword');
        return Redirect::route('define', ['keyword' => $keyword]);
    }

    public function showDefine($keyword = null)
    {
        return view('define', [
            'types' => $this->getContentTypes(),
            'keyword' => $keyword,
            'definition' => $this->defineElvish($keyword)
        ]);
    }

    private function getContentByTypeAndCount($type, $count)
    {
        switch ($type) {
            case 'paragraphs':
                return Elvish::getParagraphs($count);
            case 'sentences':
                return Elvish::getSentences($count);
            case 'words':
            default:
                return Elvish::getWords($count);
        }
    }

    private function getContentTypes()
    {
        return [
            'paragraphs' => 'paragraphs',
            'sentences' => 'sentences',
            'words' => 'words'
        ];
    }

    private function defineElvish($keyword = null)
    {
        if ($keyword) {
            $dictionary = $this->getElvishDictionary();
            if (isset($dictionary[$keyword])) {
                return $dictionary[$keyword];
            }
            foreach ($dictionary as $word => $definition) {
                if (strpos(strtolower($word), strtolower($keyword)) !== false) {
                    return $definition;
                }
            }
        }
        return null;
    }

    private function getElvishDictionary()
    {
        return array(
            "Aaye, Aiya" => "Quenya word which means 'Hail'.",
            "Adan" => "'Father of Man' (Sindarin, from the Quenya Atan, Atani) The Elves' name for those Men who first crossed the Blue Mountains (Ered Luin) during the First Age. Plural is Edain",
            "Aelin" => "'lake, pool' in Aelin-uial.",
            "Adanedhel" => "'elf-man'.",
            "Aduial" => "Eventide, twilight, 'Star-opening' Sindarin, from the Quenya Undomë.",
            "Aglarond" => "'Halls-of-Glory' The Sindarin name for the Glittering Caves of Helm's Deep.",
            "Aha" => "Quenya word for rage.",
            "Ai" => "Sindarin word for 'Ah'.",
            "Aina" => "'holy' in Aniur, Ainulindale.",
            "Ainu" => "Quenya Tengwar word meaning Holy One. The plural is Ainur and refers to the primordial spirits created by Ilúvatar.",
            "Aiglos" => "Sindarin for 'Icicle' The Spear of Gil-galad, last of the Elven Kings in Middle-earth.",
            "Alda" => "Quenya word for 'Tree'.",
            "Aldalómë" => "Combination of Quenya words meaning 'tree-shadow' used by Treebeard the Ent.",
            "Alqua" => "Sindarin word for 'swan'.",
            "Amandil" => "Sindarin word for 'Priest'.",
            "Amarth" => "Sindarin word for 'Doom'.",
            "Ambarona" => "Combination of Quenya words meaning 'Worlds-birth' used by Treebeard the Ent.",
            "Amon" => "Sindarin word meaning 'Mountain' or 'Hill'.",
            "Ampa" => "Quenya word for 'Hook'.",
            "An" => "'long'.",
            "Anarya" => "Quenya meaning 'Sun's-day'. The second day of the Elvish week.",
            "Anca" => "Quenya word for 'Jaws'.",
            "And" => "'long'.",
            "Ando" => "Quenya word for 'Gate'.",
            "Andúril" => "'Flame-of-the-West' (Quenya), the sword of Aragorn formerly know as 'Narsil'.",
            "Andúnë" => "'sunset, west'.",
            "Anga" => "Quenya word for 'Iron'.",
            "Ann-thannath" => "Combination of Sindarin words meaning 'The-Gift-of-Words'. A mode of verse and song, among the Elves of Beleriand.",
            "Anna" => "Sindarin word for 'gift'.",
            "Anod" => "'Ent'. Sindarin word referring to the ancient race of tree guardians",
            "Anto" => "Quenya word for 'Mouth'.",
            "Arda" => "Quenya word for 'Region' or 'Realm' According to the lore of the High-Elves, Arda was the name given by The One to the World as he created it.",
            "Áre" => "Quenya word for 'Sunlight'.",
            "Asca" => "Means 'Hurry'.",
            "Atan, Atani" => "Quenya for 'Father-of-Man. See Adan.",
            "Avari" => "Quenya for 'The Unwilling.' See page Avari.",
            "Áze" => "See Áre.",
            "Balrog" => "Sindarin word for 'demon of might'.",
            "Band" => "Sindarin word meaning 'prison, duress'.",
            "Bar" => "Sindarin for 'dwelling'.",
            "Barad" => "Meaning 'tower'.",
            "Beleg" => "Meaning 'mighty'.",
            "Bragol" => "'Sudden'.",
            "Bregalad" => "'Quickbeam', also is the nickname of an ent in the Two Towers.",
            "Brethil" => "'silver birch', also the name of an entwife.",
            "Brith" => "'gravel'.",
            "Calen" => "Sindarin word for 'green'.",
            "Calma" => "Quenya word for 'Lamp'.",
            "Carca" => "Quenya word for 'fang'.",
            "Celeb" => "Quenya word for silver",
            "Certar" => "Quenya word for 'Runes', referring in particular to the 'Alphabet of Daeron'.",
            "Certhas" => "Sindarin. See Certar",
            "Cirth" => "Sindarin word referring to the system of runes as a whole. See also Certar.",
            "Coirë" => "The season of the year known in the Elves' calendar system know as 'stirring'. It was the last of the six seasons observed by the Elves, falling between winter (Hrivë) and spring (Tuilë). It is one of the Elven Seasons.",
            "Coranar" => "Quenya word meaning 'Sun-round'. The solar year as recorded by the Elves. Also called a Loa.",
            "Cormallen" => "Sindarin word meaning 'Ring-bearers'.",
            "Cormarë" => "Quenya word meaning 'Ring-day'. The birthday of Frodo and Bilbo Baggins.",
            "Coron" => "'mound'.",
            "Craban, Crebain" => "Sindarin word referring to an unfriendly species of black crows.",
            "Cú" => "'bow'.",
            "Cuivie" => "'awaking'.",
            "Dae" => "'shadow'.",
            "Dagor" => "Sindarin for 'battle'.",
            "Daro" => "Sindarin word meaning 'Descend'.",
            "Del" => "'horror'.",
            "Din" => "'silent'.",
            "Dina" => "Means 'Be silent'.",
            "Dol" => "Meaning 'head', often given to hills and mountains.",
            "Dôr" => "Sindarin for 'land'.",
            "Draug" => "'wolf'.",
            "Drego" => "Sindarin word which means 'Flee'.",
            "Dú" => "Sindaron for 'night, dimness'.",
            "Duin" => "'(long) river'.",
            "Dúnadan, Dúnedain" => "Sindarin for 'Man-of-the-West'. Referring to the Men of Westernesse, or Númenor, and their descendents.",
            "Dûr" => "'dark'.",
            "Ëar" => "Quenya for 'sea'.",
            "Echor" => "'encircling mountains'.",
            "Echuir" => "Sindarin. See Coirë.",
            "Edain" => "See Adan.",
            "Edhel" => "Sindarin for 'elf'.",
            "Edro" => "Sindarin word meaning 'Open'.",
            "Eithel" => "'well'. See kell",
            "Êl, Elin, Elenath" => "Sindarin word for 'Star' (Elenath is the collective plural).",
            "Eldar" => "'People-of-the-Stars' (Quenya), The Elves name for themselves.",
            "Eldarin" => "Quenya word referring to the generic name given to languages spoken by the Elves, Quenya and Sindarin.",
            "Elear" => "Sindarin word for 'Visionary'.",
            "Elen, Eleni, Elenion" => "Quenya word for 'Star' (Elenion is the collective plural).",
            "Elenya" => "'Stars'-day'. The first day of the Elvish week.",
            "Emyn" => "Sindarin word for 'Hills', plural of Amon.",
            "Endari" => "'Middle-day', the middle of the year in the Elvish calendar.",
            "Endóre" => "Quenya word for 'Middle-earth'.",
            "Ennor" => "Sindarin. See Endóre.",
            "Enquië, Enquier" => "'Week', Quenya word referring to the six day Elvish week.",
            "Enyd" => "'Ents'. See Anod.",
            "Er" => "'one, alone'.",
            "Ered" => "Quenya word for 'Mountain'.",
            "Ereg" => "'thorn, holly",
            "Eryn" => "Sindarin word for 'Wood' or 'Forest'.",
            "Esgal" => "'screen, hiding'.",
            "Esse" => "Quenya word for 'Name'.",
            "Estel" => "Sindarin word for 'Hope'.",
            "Estellio" => "'trust'",
            "Ethuil" => "'Spring', the first season of the Elvish year.",
            "Falas" => "'shore, line of surf'.",
            "Faroth" => "'hunt, pursue'.",
            "Faug" => "'gape'.",
            "Fëa" => "'spirit'.",
            "Fin" => "'hair'.",
            "Firith" => "Sindarin word for 'Fading', also the fourth season of the Elvish year.",
            "Formen" => "Quenya word for 'North'.",
            "Forn" => "Sindarin word for 'north'.",
            "Fuin" => "'gloom, darkness'.",
            "Gurth" => "Death",
            "Gaur" => "Werewolf",
            "Gwador" => "brother",
            "Luin" => "Sindarin word for blue. Used in 'Ered Luin' Blue Mountains.",
            "Laer" => "Sindarin word for Summer. lairë Quenya. See Laer.",
            "Mellon" => "The Elvish word for 'Friend.' Used by Gandalf to open the gates to the mines of Moria.",
            "Minas" => "Meaning 'Tower'.",
            "Mithrin" => "Sindarin word for 'Grey'. 'Ered Mithrin'- is the Grey Mountains.",
            "Namáriëor Navaer" => "Sindarin word for 'Farewell'.",
            "Nan" => "Sindarin for 'Vale'. For example, Nan Curunir means 'Saruman's Vale'.",
            "Ndengina" => "Sindarin for 'Kill'.",
            "Nikerym" => "Means 'Captain'.",
            "Nimrais" => "Sindarin for 'White Peaks,' as in Ered Nimrais.",
            "Numen" => "Sindarin for 'West'.",
            "Naugrim" => "Means 'Dwarf'.",
            "Onodrim" => "Sindarin name for the Ents; singular Onod.",
            "Orodruin" => "Sindarin name of Mount Doom. The name likely consists of orod ('mountain') + ruin ('fiery red').",
            "Parma" => "Quenya for 'Book'.",
            "Pelargir" => "is a Sindarin word that meant 'Garth of Royal Ships'.",
            "Palantíri" => "is a Quenyan word that means 'Far seeing'. It is the root of Palantir.",
            "Quendi" => "Quenya word for 'the Speakers.'",
            "Quel re" => "Sindarin phrase for 'Good day'",
            "Silme" => "Quenya for 'Starlight'",
            "Tengwa" => "Quenya word for 'Letter', plural form 'Tengwar' means 'Letters'.",
            "Tinco",
            "tuilë" => "Quenya word for 'spring'",
            "thalias" => "Bravery",
            "Thalin" => "Dauntless",
            "Tar" => "High",
            "Úlairi" => " Quenya word for Nazgul or Ringwraith.",
            "Ulaer" => "Sindarin word for Nazgul or Ringwraith.",
            "Urulóki" => "Quenya word for 'Heat', 'Hot', or 'Fire Serpents', also used as a name for Fire-Drakes.",
            );
    }

}

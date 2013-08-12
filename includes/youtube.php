<?php

if(class_exists('Youtube')) return;

class Youtube {

    var $skip = array('name', 'very', 'through', 'just', 'form', 'sentence', 'great', 'think', 'that'
        , 'help', 'line', 'differ', 'turn', 'cause', 'with', 'much', 'before', 'move', 'they', 'right', 'have', 'same'
        , 'this', 'tell', 'from', 'does', 'want', 'word', 'well', 'also', 'what', 'play', 'some', 'home'
        , 'other', 'read', 'were', 'hand', 'port', 'there', 'when', 'spell', 'even', 'your', 'land', 'here', 'said'
        , 'must', 'each', 'high', 'such', 'which', 'follow', 'their', 'time', 'will', 'change', 'went', 'about', 'light', 'many'
        , 'kind', 'then', 'them', 'need', 'write', 'house', 'would', 'picture', 'like', 'these', 'again', 'point'
        , 'make', 'thing', 'world', 'near', 'build', 'self', 'earth', 'look', 'more', 'head', 'stand', 'could'
        , 'page', 'come', 'should', 'country', 'number', 'found', 'sound', 'answer', 'most', 'grow', 'people', 'study'
        , 'still', 'over', 'learn', 'know', 'plant', 'water', 'cover', 'than', 'food', 'call', 'first', 'between', 'state'
        , 'down', 'keep', 'side', 'been', 'never', 'last', 'find', 'thought', 'city', 'work', 'tree', 'part', 'cross', 'take'
        , 'place', 'start', 'made', 'might', 'live', 'story', 'where', 'after', 'back', 'draw', 'only', 'left', 'round'
        , 'late', 'year', 'came', 'while', 'show', 'press', 'every', 'close', 'good', 'night', 'real', 'give', 'life', 'under', 'north'
        , 'open', 'seem', 'simple', 'together', 'several', 'next', 'vowel', 'white', 'toward', 'children', 'begin', 'against', 'walk'
        , 'pattern', 'example', 'slow', 'ease', 'center', 'paper', 'love', 'group', 'person', 'always', 'money', 'music', 'serve', 'those'
        , 'appear', 'both', 'road', 'mark', 'often', 'rain', 'letter', 'rule', 'until', 'govern', 'mile', 'pull', 'river', 'cold', 'notice'
        , 'voice', 'care', 'unit', 'second', 'power', 'book', 'town', 'carry', 'fine', 'took', 'certain', 'science', 'fall', 'room'
        , 'lead', 'began', 'dark', 'idea', 'machine', 'fish', 'note', 'mountain', 'wait', 'stop', 'plan', 'once', 'figure', 'base'
        , 'star', 'hear', 'horse', 'noun', 'field', 'sure', 'rest', 'watch', 'correct', 'color', 'able', 'face', 'pound', 'wood', 'done', 'main'
        , 'beauty', 'enough', 'drive', 'plain', 'stood', 'girl', 'contain', 'usual', 'front', 'young', 'teach', 'ready', 'week', 'above', 'final'
        , 'ever', 'gave', 'green', 'list', 'though', 'quick', 'feel', 'develop', 'talk', 'ocean', 'bird', 'warm', 'soon', 'free', 'body', 'minute'
        , 'strong', 'family', 'special', 'direct', 'mind', 'pose', 'behind', 'leave', 'clear', 'song', 'tail', 'measure', 'produce', 'door', 'fact'
        , 'product', 'street', 'inch', 'short', 'multiply', 'numeral', 'nothing', 'class', 'course', 'wind', 'stay', 'question', 'wheel'
        , 'happen', 'full', 'complete', 'force', 'ship', 'blue', 'area', 'object', 'half', 'decide', 'rock', 'surface', 'order', 'deep', 'fire'
        , 'moon', 'south', 'island', 'problem', 'foot', 'piece', 'system', 'told', 'busy', 'knew', 'test', 'pass', 'record', 'since', 'boat'
        , 'common', 'whole', 'gold', 'king', 'possible', 'space', 'plane', 'heard', 'stead', 'best', 'hour', 'wonder', 'better', 'laugh'
        , 'thousand', 'during', 'hundred', 'five', 'check', 'remember', 'game', 'step', 'shape', 'early', 'equate', 'hold', 'west', 'miss'
        , 'ground', 'brought', 'interest', 'heat', 'reach', 'snow', 'fast', 'tire', 'verb', 'bring', 'sing', 'listen', 'distant', 'fill'
        , 'table', 'east', 'travel', 'paint', 'less', 'language', 'morning', 'among', 'grand', 'ball', 'century', 'consider', 'wave', 'type'
        , 'drop', 'heart', 'coast', 'present', 'copy', 'heavy', 'phrase', 'dance', 'silent', 'engine', 'tall', 'position', 'sand', 'soil', 'wide'
        , 'roll', 'sail', 'temperature', 'material', 'finger', 'size', 'industry', 'vary', 'value', 'settle', 'fight', 'speak', 'weight'
        , 'beat', 'general', 'excite', 'natural', 'matter', 'view', 'circle', 'sense', 'pair', 'include', 'else', 'divide', 'quite', 'syllable'
        , 'broke', 'felt', 'case', 'perhaps', 'middle', 'pick', 'kill', 'sudden', 'count', 'lake', 'square', 'moment', 'reason', 'scale', 'length'
        , 'loud', 'represent', 'spring', 'observe', 'subject', 'child', 'region', 'straight', 'energy', 'consonant', 'hunt', 'nation', 'probable'
        , 'dictionary', 'milk', 'brother', 'speed', 'method', 'ride', 'organ', 'cell', 'believe', 'fraction', 'section', 'forest', 'dress', 'cloud'
        , 'race', 'surprise', 'window', 'quiet', 'store', 'stone', 'summer', 'tiny', 'train', 'climb', 'sleep', 'cool', 'prove', 'design', 'lone'
        , 'poor', 'exercise', 'experiment', 'wall', 'bottom', 'catch', 'mount', 'iron', 'wish', 'single', 'stick', 'board', 'flat', 'twenty'
        , 'winter', 'skin', 'smile', 'written', 'crease', 'wild', 'hole', 'instrument', 'trade', 'kept', 'melody', 'glass', 'trip', 'grass'
        , 'office', 'receive', 'edge', 'mouth', 'sign', 'exact', 'visit', 'symbol', 'past', 'soft', 'least', 'trouble', 'bright', 'shout'
        , 'except', 'weather', 'wrote', 'month', 'seed', 'million', 'tone', 'bear', 'join', 'finish', 'suggest', 'happy', 'clean', 'hope'
        , 'break', 'flower', 'lady', 'clothe', 'yard', 'strange', 'rise', 'gone', 'jump', 'blow', 'baby', 'eight', 'blood', 'village', 'touch'
        , 'meet', 'grew', 'root', 'cent', 'raise', 'team', 'solve', 'wire', 'metal', 'cost', 'whether', 'lost', 'push', 'brown', 'seven', 'wear'
        , 'paragraph', 'garden', 'third', 'equal', 'shall', 'sent', 'held', 'choose', 'hair', 'fell', 'describe', 'cook', 'flow', 'floor', 'fair'
        , 'either', 'bank', 'result', 'collect', 'burn', 'save', 'hill', 'control', 'safe', 'decimal', 'gentle', 'truck', 'woman', 'noise', 'captain'
        , 'level', 'practice', 'chance', 'separate', 'gather', 'difficult', 'shop', 'doctor', 'stretch', 'please', 'throw', 'protect', 'shine', 'noon'
        , 'property', 'whose', 'column', 'locate', 'molecule', 'ring', 'select', 'character', 'wrong', 'insect', 'gray', 'caught', 'repeat', 'period'
        , 'require', 'indicate', 'broad', 'radio', 'prepare', 'spoke', 'salt', 'atom', 'nose', 'human', 'plural', 'history', 'anger', 'effect', 'claim'
        , 'electric', 'continent', 'expect', 'oxygen', 'crop', 'sugar', 'modern', 'death', 'element', 'pretty', 'skill', 'student', 'women', 'corner'
        , 'season', 'party', 'solution', 'supply', 'magnet', 'bone', 'silver', 'rail', 'thank', 'imagine', 'branch', 'provide', 'match', 'agree', 'suffix'
        , 'thus', 'especially', 'capital', 'afraid', 'chair', 'huge', 'danger', 'sister', 'fruit', 'steel', 'rich', 'discuss', 'thick', 'forward', 'soldier'
        , 'similar', 'process', 'guide', 'operate', 'experience', 'guess', 'score', 'necessary', 'apple', 'sharp', 'bought', 'wing', 'create', 'pitch'
        , 'neighbor', 'coat', 'wash', 'mass', 'card', 'rather', 'band', 'crowd', 'rope', 'corn', 'slip', 'compare', 'poem', 'dream', 'string', 'evening'
        , 'bell', 'condition', 'depend', 'feed', 'meat', 'tool', 'tube', 'basic', 'famous', 'smell', 'dollar', 'valley', 'stream', 'fear', 'double', 'sight'
        , 'seat', 'thin', 'arrive', 'triangle', 'master', 'planet', 'track', 'hurry', 'parent', 'chief', 'shore', 'colony', 'division', 'clock', 'sheet'
        , 'mine', 'substance', 'favor', 'enter', 'connect', 'major', 'post', 'fresh', 'spend', 'search', 'chord', 'send', 'yellow', 'glad', 'original'
        , 'allow', 'share', 'print', 'station', 'dead', 'spot', 'bread', 'desert', 'charge', 'suit', 'proper', 'current', 'lift', 'offer', 'rose', 'segment'
        , 'continue', 'slave', 'block', 'duck', 'chart', 'instant', 'market', 'sell', 'degree', 'success', 'populate', 'company', 'chick', 'subtract', 'dear'
        , 'event', 'enemy', 'particular', 'reply', 'deal', 'drink', 'swim', 'occur', 'term', 'support', 'opposite', 'speech', 'wife', 'nature', 'shoe', 'range'
        , 'shoulder', 'steam', 'spread', 'motion', 'arrange', 'path', 'camp', 'liquid', 'invent', 'cotton', 'meant', 'born', 'quotient', 'determine', 'teeth'
        , 'quart', 'shell', 'nine', 'neck', 'video', 'videos');

    function _makeTags($input) {

        if (preg_match_all('/([A-Za-z]{4,}+)/', $input, $matches)) {
            $matches = $matches[1];
            $matches = array_unique($matches);

            $tags = array();

            foreach ($matches as $match) {
                $match = strtolower($match);
                if (in_array($match, $this->skip))
                    continue;
                $tags[] = $match;
            }

            $tags = array_unique($tags);
            shuffle($tags);

            return $tags;
        }

        return array();
    }

    function videos($keywords, $orderby, $results = 10, $page = 1) {

        $apiPlus = "";
        $apikey = get_option('wpby_apikey');
        if(!empty($apikey)) {
            $apiPlus = '&apikey='.$apikey;
        }
        
        $orderByVocabulary = array('relevance' => 'relevance', 'latest' => 'published', 'popular' => 'viewCount', 'top' => 'rating');

        $start_index = (($page - 1) * $results) + 1;

        $urlorderby = empty($orderby) ? '' : '&orderby=' . $orderByVocabulary[$orderby];

        $feedURL = "http://gdata.youtube.com/feeds/api/videos?vq=$keywords$urlorderby&start-index=$start_index&max-results=$results&format=5&alt=json".$apiPlus;

        $checkWords = explode(',', B_SITE_CATEGORIES);

        $tagA = explode(',', B_SITE_TAGS);
        foreach ($tagA as $tagS) {
            list($tag) = explode('|', $tagS);
            $checkWords[] = $tag;
        }

        $canCache = false;

        $fetch = wp_remote_get($feedURL);
        
        $feed = json_decode($fetch['body'],true);
                
        $rvideos = array();
        
        if(!isset($feed['feed']['entry'])) {
            return false;
        }
        
        $count = $feed['feed']['openSearch$totalResults']['$t'];
        
        if($count > 1000 ) {
            $count = 1000;
        }
        
        foreach($feed['feed']['entry'] as $entry) {
            $video['views'] = $entry['yt$statistics']['viewCount'];
            $video['title'] = $entry['title']['$t']; 
            $video['duration'] = $entry['media$group']['yt$duration']['seconds'];
            $video['description'] = $entry['content']['$t'];
            $thumbnail = $entry['media$group']['media$thumbnail'][0]['url'];
            $video['thumbnail']   = str_replace('0.jpg','',$thumbnail);
            $video['rating']      = $entry['gd$rating']['average'];
            list($d,$id) = explode('videos/',$entry['id']['$t']);
            $video['id'] =  $id;
            $video['count'] = $count;
            $video['tags'] = $this->_makeTags($video['title']);
            $rvideos[] = $video;
        }

        return $rvideos;
    }

    function fetchFeed($feedURL) {
        
        $apiPlus = "";
        $apikey = get_option('wpby_apikey');
        
        if(!empty ($apikey)) {            
             $feedURL .= '&apikey='.$apikey;
        }
             
        $fetch = wp_remote_get($feedURL);
        
        $feed = json_decode($fetch['body'],true);
                
        $rvideos = array();
        
        if(!isset($feed['feed']['entry'])) {
            return false;
        }
        
        $count = $feed['feed']['openSearch$totalResults']['$t'];
        
        if($count > 1000 ) {
            $count = 1000;
        }
        
        foreach($feed['feed']['entry'] as $entry) {
            $video['views'] = $entry['yt$statistics']['viewCount'];
            $video['title'] = $entry['title']['$t']; 
            $video['duration'] = $entry['media$group']['yt$duration']['seconds'];
            $video['description'] = $entry['content']['$t'];
            $thumbnail = $entry['media$group']['media$thumbnail'][0]['url'];
            $video['thumbnail']   = str_replace('0.jpg','',$thumbnail);
            $video['rating']      = $entry['gd$rating']['average'];
            list($d,$id) = explode('videos/',$entry['id']['$t']);
            $video['id'] =  $id;
            $video['count'] = $count;
            $video['tags'] = $this->_makeTags($video['title']);
            $rvideos[] = $video;
        }
        
        return $rvideos;      
        
    }
    function related($id) {
        
        $apiPlus = "";
        $apikey = get_option('wpby_apikey');
        if(!empty($apikey)) {
            $apiPlus = '&apikey='.$apikey;
        }
        
        $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $id . '/related?format=5&alt=json&max-results=10'.$apiPlus;

        $fetch = wp_remote_get($feedURL);
        $feed = $fetch['body'];
        
        $feed = json_decode($fetch['body'],true);
                
        $rvideos = array();
        
        if(!isset($feed['feed']['entry'])) {
            return false;
        }
        
        $count = $feed['feed']['openSearch$totalResults']['$t'];
        
        if($count > 1000 ) {
            $count = 1000;
        }
        
        foreach($feed['feed']['entry'] as $entry) {
            $video['views'] = $entry['yt$statistics']['viewCount'];
            $video['title'] = $entry['title']['$t']; 
            $video['duration'] = $entry['media$group']['yt$duration']['seconds'];
            $video['description'] = $entry['content']['$t'];
            $thumbnail = $entry['media$group']['media$thumbnail'][0]['url'];
            $video['thumbnail']   = str_replace('0.jpg','',$thumbnail);
            $video['rating']      = $entry['gd$rating']['average'];
            list($d,$id) = explode('videos/',$entry['id']['$t']);
            $video['id'] =  $id;
            $video['count'] = $count;
            $video['tags'] = $this->_makeTags($video['title']);
            $rvideos[] = $video;
        }
            
        return $rvideos;
    }

    function video($id) {
        
        $apiPlus = "";
        $apikey = get_option('wpby_apikey');
        if(!empty($apikey)) {
            $apiPlus = '&apikey='.$apikey;
        }
        
        $feedURL = "http://gdata.youtube.com/feeds/api/videos/$id?alt=json".$apiPlus;

        $fetch = wp_remote_get($feedURL);
        $videoFeed = json_decode($fetch['body'],true);
                
        $entry = $videoFeed['entry'];
        
        $video['views'] = $entry['yt$statistics']['viewCount'];
        $video['title'] = $entry['title']['$t']; 
        $video['duration'] = $entry['media$group']['yt$duration']['seconds'];
        $video['description'] = $entry['content']['$t'];
        $thumbnail = $entry['media$group']['media$thumbnail'][0]['url'];
        $video['thumbnail']   = str_replace('0.jpg','',$thumbnail);
        $video['rating']      = $entry['gd$rating']['average'];
        list($d,$id) = explode('videos/',$entry['id']['$t']);
        $video['id'] =  $id;
        $video['count'] = $count;
        $video['tags'] = $this->_makeTags($video['title']);
        $rvideos[] = $video;

        return $video;
    }

    function embed($id, $width = '425', $height = '355', $autostart = false) {
        return '<iframe width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?rel=0' . (($autostart) ? '&autoplay=1' : '') . '" frameborder="0" allowfullscreen></iframe>';
    }
    
    function fetch($link) {

        if (!(preg_match("/v=([a-zA-Z0-9\\_\\-]+)/", $link, $videoID)
                || preg_match("/video_id=([a-zA-Z0-9\\_\\-]+)/", $link, $videoID)
                || preg_match("/youtube\\.com\\/v\\/([a-zA-Z0-9\\_\\-]+)/", $link, $videoID))) {
            return false;
        }

        $video = $this->video($videoID[1]);

        return $video;
    }
    
    /* feed generation functions */ 
    
    function getRegions() {
        return array("AR"=>"Argentina","AU"=>"Australia","AT"=>"Austria","BE"=>"Belgium","BR"=>"Brazil","CA"=>"Canada","CL"=>"Chile","CO"=>"Colombia","CZ"=>"Czech Republic","EG"=>"Egypt","FR"=>"France","DE"=>"Germany","GB"=>"Great Britain","HK"=>"Hong Kong","HU"=>"Hungary","IN"=>"India","IE"=>"Ireland","IL"=>"Israel","IT"=>"Italy","JP"=>"Japan","ID"=>"Country	Region","JO"=>"Jordan","MY"=>"Malaysia","MX"=>"Mexico","MA"=>"Morocco","NL"=>"Netherlands","NZ"=>"New Zealand","PE"=>"Peru","PH"=>"Philippines","PL"=>"Poland","RU"=>"Russia","SA"=>"Saudi Arabia","SG"=>"Singapore","ZA"=>"South Africa","KR"=>"South Korea","ES"=>"Spain","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","AE"=>"United Arab Emirates","US"=>"United States");
    }
    
    function getSorts() {
        return array("top_rated"=>"Top rated","top_favorites"=>"Top favorites","most_shared"=>"Most shared","most_popular"=>"Most popular","most_recent"=>"Most recent","most_discussed"=>"Most discussed","recently_featured"=>"Recently featured","on_the_web"=>"Trending videos","most_viewed"=>"Most viewed","relevance"=>"Relevance ( Search )","published"=>"Published ( Search )","viewCount"=>"Views ( Search )","rating"=>"Rating ( Search )");
    }
    
    
    function getTimeFrames() {
        return array('today'=>"Today",'this_week'=>"This week",'this_month'=>"This Month",'all_time'=>'All Time');
    }
}
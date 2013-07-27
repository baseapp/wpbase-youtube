<?php

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

        $orderByVocabulary = array('relevance' => 'relevance', 'latest' => 'published', 'popular' => 'viewCount', 'top' => 'rating');

        $start_index = (($page - 1) * $results) + 1;

        $urlorderby = empty($orderby) ? '' : '&orderby=' . $orderByVocabulary[$orderby];

        $feedURL = "http://gdata.youtube.com/feeds/api/videos?vq=$keywords$urlorderby&start-index=$start_index&max-results=$results&format=5&alt=rss";

        $checkWords = explode(',', B_SITE_CATEGORIES);

        $tagA = explode(',', B_SITE_TAGS);
        foreach ($tagA as $tagS) {
            list($tag) = explode('|', $tagS);
            $checkWords[] = $tag;
        }

        $canCache = false;


        if (in_array($keywords, $checkWords) && $page < 6) {
            $canCache = true;
            $cache = Cache::get($feedURL);
            if ($cache) {
                return unserialize($cache);
            }
        }


        $fetch = wp_remote_get($feedURL);
        $feed = $fetch['body'];

        $rvideos = array();

        if (preg_match('%<openSearch:totalResults>([0-9]+)</openSearch:totalResults>%s', $feed, $count)) {
            preg_match_all('%<title>(.[^<]*?)</title><desc%s', $feed, $titles);
            preg_match_all('%<yt:duration seconds=\'([0-9]+)\'/>%s', $feed, $durations);
            preg_match_all('%<description>(.*?)</description>%s', $feed, $descs);
            preg_match_all('%<media:keywords>(.*?)</media:keywords>%sm', $feed, $keywords);
            preg_match_all('/<media:thumbnail url=\'(.[^\']*?)1\.jpg\'/s', $feed, $thumbnails);
            preg_match_all('%<link>http://www\.youtube\.com/watch\?v=(.[^&]*?)&%s', $feed, $ids);
            preg_match_all('/viewCount=\'([0-9]+)\'/', $feed, $views);
            preg_match_all('/rating average=\'([0-9.]+)\'/', $feed, $ratings);

            for ($i = 0; $i < count($titles[1]); $i++) {
                $video['count'] = $count[1];
                $video['views'] = isset($views[1][$i]) ? $views[1][$i] : rand(10, 30);
                $video['title'] = $titles[1][$i];
                $video['duration'] = $durations[1][$i];
                //$video['description'] = $descs[1][$i];
                $video['tags'] = $this->_makeTags($titles[1][$i]);
                $video['thumbnail'] = $thumbnails[1][$i];
                $video['id'] = $ids[1][$i];
                $video['rating'] = isset($ratings[1][$i]) ? $ratings[1][$i] : 0;
                $rvideos[] = $video;
                
            }
            
           // var_dump($rvideo);
        }

        if ($canCache && count($rvideos) > 5) {
            Cache::set($feedURL, serialize($rvideos), 60 * 60 * 5);
        }

        return $rvideos;
    }

    function related($id) {
        $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $id . '/related?format=5&alt=rss';

        $fetch = wp_remote_get($feedURL);
        $feed = $fetch['body'];

        //echo $feed;
        $rvideos = array();

        if (preg_match('%<openSearch:totalResults>([0-9]+)</openSearch:totalResults>%s', $feed, $count)) {
            preg_match_all('%<title>(.[^<]*?)</title><desc%s', $feed, $titles);
            preg_match_all('%<yt:duration seconds=\'([0-9]+)\'/>%s', $feed, $durations);
            preg_match_all('%<description>(.*?)</description>%s', $feed, $descs);
            preg_match_all('%<media:keywords>(.*?)</media:keywords>%sm', $feed, $keywords);
            preg_match_all('/<media:thumbnail url=\'(.[^\']*?)1\.jpg\'/s', $feed, $thumbnails);
            preg_match_all('%<link>http://www\.youtube\.com/watch\?v=(.[^&]*?)&%s', $feed, $ids);
            preg_match_all('/viewCount=\'([0-9]+)\'/', $feed, $views);
            preg_match_all('/rating average=\'([0-9.]+)\'/', $feed, $ratings);

            for ($i = 0; $i < count($titles[1]); $i++) {

                $video['count'] = $count[1];
                $video['views'] = isset($views[1][$i]) ? $views[1][$i] : rand(10, 30);
                $video['title'] = $titles[1][$i];
                $video['duration'] = $durations[1][$i];
                //$video['description'] = $descs[1][$i];
                $video['tags'] = $this->_makeTags($titles[1][$i]);
                $video['thumbnail'] = $thumbnails[1][$i];
                $video['id'] = $ids[1][$i];
                $video['rating'] = isset($ratings[1][$i]) ? $ratings[1][$i] : 0;
                $rvideos[] = $video;
            }
        }

        return $rvideos;
    }

    function video($id) {
        $feedURL = "http://gdata.youtube.com/feeds/api/videos/$id";


        $fetch = wp_remote_get($feedURL);
        $video = $fetch['body'];

        $rvideo = false;
        if (strstr($video, 'title')) {

            $rvideo['id'] = $id;

            preg_match('%<title type=\'text\'>(.[^<]*?)</title>%', $video, $title);
            $rvideo['title'] = $title[1];

            preg_match('%<media:description type=\'plain\'>(.[^<]*?)</%s', $video, $description);
            $rvideo['description'] = $description[1];

            preg_match('%<media:keywords>(.[^<]*?)</media:keywords>%', $video, $tags);
            $rvideo['tags'] = $this->_makeTags($title[1]);

            preg_match('/rating average=\'([0-9.]+)\'/', $video, $rating);
            $rvideo['rating'] = $rating[1];

            preg_match('/viewCount=\'([0-9]+)\'/', $video, $views);
            $rvideo['views'] = $views[1];

            preg_match('/favoriteCount=\'([0-9]+)\'/', $video, $favorites);
            $rvideo['favorites'] = $favorites[1];

            preg_match('%<published>(.*?)</published>%', $video, $published);
            $rvideo['published'] = strtotime(str_replace(array('T', 'Z'), ' ', $published[1]));

            preg_match('/<media:player.*?<media:thumbnail url=\'(.[^\']*?)[0-9]+\.jpg\'/s', $video, $thumbnail);
            $rvideo['thumbnail'] = $thumbnail[1];
        }

        return $rvideo;
    }

    function embed($id, $width = '425', $height = '355', $autostart = false) {
        return '<iframe width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?rel=0' . (($autostart) ? '&autoplay=1' : '') . '" frameborder="0" allowfullscreen></iframe>';
    }

}

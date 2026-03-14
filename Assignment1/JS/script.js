// data from html 
const storyParts = {
    nouns1: ["The turkey", "Mom", "Dad", "The dog", "My teacher", "The elephant", "The cat"],
    verbs: ["sat on", "ate", "danced with", "saw", "doesn't like", "kissed"],
    adjectives: ["a funny", "a scary", "a goofy", "a slimy", "a barking", "a fat"],
    nouns2: ["goat", "monkey", "fish", "cow", "frog", "bug", "worm"],
    places: ["on the moon", "in my spaghetti", "in my soup", "on the grass", "in my shoes"]
};
// track current index for each column
let currentIndex = {
    nouns1:0, verbs:0, adjectives:0, nouns2:0, places:0
};
// display elements
const storyOutput = document.getElementById('storyOutput');

const displays = {
    nouns1: document.getElementById('n1Display'),
    verbs: document.getElementById('verbDisplay'),
    adjectives: document.getElementById('adjDisplay'),
    nouns2: document.getElementById('n2Display'),
    places: document.getElementById('placeDisplay')
}
// buttons
const buttons = {
    col1: document.getElementById('btn1'),
    col2: document.getElementById('btn2'),
    col3: document.getElementById('btn3'),
    col4: document.getElementById('btn4'),
    col5: document.getElementById('btn5')
};

const surpriseBtn = document.getElementById('surpriseBtn');
const playbackBtn = document.getElementById('playbackBtn');
const resetBtn = document.getElementById('resetBtn');

// cycle through words in a column
function cycleWord(columnKey){
    const words = storyParts[columnKey];

    currentIndex[columnKey] = (currentIndex[columnKey] + 1) % words.length;

    displays[columnKey].textContent = words[currentIndex[columnKey]];
}
// build the story from current selections
function buildStory(){
    return storyParts.nouns1[currentIndex.nouns1] + " " + storyParts.verbs[currentIndex.verbs] + " " + storyParts.adjectives[currentIndex.adjectives] + " " + storyParts.nouns2[currentIndex.nouns2] + " " + storyParts.places[currentIndex.places];
}
// use web speech api to speak the story generated
function speakStory(text){
    const speech = new SpeechSynthesisUtterance(text);
    speech.lang = "en-US";
    window.speechSynthesis.cancel(); // Stop any ongoing speech
    window.speechSynthesis.speak(speech);
}
// generate a random story by picking random words from each category
function generateRandomStory(){

    for(let key in storyParts){
        const randomIndex = Math.floor(Math.random() * storyParts[key].length);

        currentIndex[key] = randomIndex;
        displays[key].textContent = storyParts[key][randomIndex];
    }
    const story = buildStory();
    storyOutput.textContent = story;
    speakStory(story);
}
// play back the current story
function playbackStory(){
    const story = buildStory();
    storyOutput.textContent = story;
    speakStory(story);
}
// reset the story to it's initial state
function resetStory(){
    for(let key in currentIndex){
        currentIndex[key] = 0;
    }
    displays.nouns1.textContent = "Who?";
    displays.verbs.textContent = "Did?";
    displays.adjectives.textContent = "How?";
    displays.nouns2.textContent = "What?";
    displays.places.textContent = "Where?";

    storyOutput.textContent = "STORYMAKER";
    window.speechSynthesis.cancel();
}
// event listeners for column buttons
buttons.col1.addEventListener('click', () => cycleWord('nouns1'));
buttons.col2.addEventListener('click', () => cycleWord('verbs'));
buttons.col3.addEventListener('click', () => cycleWord('adjectives'));
buttons.col4.addEventListener('click', () => cycleWord('nouns2'));
buttons.col5.addEventListener('click', () => cycleWord('places'));
// event listeners for surprise, playback and reset buttons
surpriseBtn.addEventListener('click', generateRandomStory);
playbackBtn.addEventListener('click', playbackStory);
resetBtn.addEventListener('click', resetStory);

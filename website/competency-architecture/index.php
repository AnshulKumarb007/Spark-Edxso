<?php include "../header.php"; ?>

<style>

  .services-list {

    background-color: #f1f2fa;

    padding: 20px;

    border: 1px solid #ddd;

    border-radius: 5px;

  }



  .checkbox-item {

    display: flex;

    align-items: center;

    border-left: 3px solid transparent;

    padding: 10px 10px;

    margin-bottom: 5px;

    transition: 0.3s ease;

  }



  .checkbox-item input[type="checkbox"] {

    margin-right: 10px;

  }



  .checkbox-item.active {

    font-weight: bold;

    border-left: 3px solid #0f8e8e;

    background: #fff;

    color: #000;

  }



  .member.active {

    border: 2px solid #0f8e8e;

    background-color: #fff;

  }



  .member {

    cursor: pointer;

    padding: 10px;

    text-align: center;

    border: 1px solid #ddd;

    border-radius: 10px;

  }

</style>



<!-- Page Title -->

<div class="page-title">

  <div class="heading">

    <div class="container">

      <div class="row d-flex justify-content-center text-center">

        <div class="col-lg-10">

          <h1>Competency Architecture</h1>

        </div>

      </div>

    </div>

  </div>

  <nav class="breadcrumbs">

    <div class="container">

      <ol>

        <li><a href="../index.php">Home</a></li>

        <li class="current">Competency Architecture</li>

      </ol>

    </div>

  </nav>

</div>



<!-- Subject & Class Section -->

<section id="team" class="team section">

  <div class="container">



    <!-- Subject List -->

    <div class="row gy-4 justify-content-between">

      <?php

      $subjects = [

        "english" => "English",

        "math" => "Mathematics",

        "evs" => "EVS",

        "science" => "Science",

        "india-awareness" => "India Awareness"

      ];

      $images = [

        "english" => "english-img.jpg",

        "math" => "mathamatics-img.jpg",

        "evs" => "evs-img.jpg",

        "science" => "science-img.jpg",

        "india-awareness" => "india-Awareness-img.jpg"

      ];

      foreach ($subjects as $id => $name): ?>

        <div class="col-xl-2 col-md-6 col-6 d-flex six-reasons">

          <div class="member active">

            <img src="../assets/img/subject/<?= $images[$id] ?>" class="img-fluid" alt="<?= $name ?>">

            <h4><?= $name ?></h4>

            <div class="social">

              <input type="checkbox" name="subject" value="<?= $id ?>" class="subject-checkbox" checked>

            </div>

          </div>

        </div>

      <?php endforeach; ?>

    </div>



    <!-- Class Selection & Output -->

    <div class="row gy-4 justify-content-between mt-5">

      <div class="col-lg-4">

        <h4>Select Class</h4>

        <form id="classForm">

          <div class="services-list">

            <div class="checkbox-item active">

              <input type="checkbox" name="class" value="all" class="class-checkbox" id="classAll" checked>

              <label for="classAll">All</label>

            </div>

            <?php for ($i = 1; $i <= 8; $i++): ?>

              <div class="checkbox-item">

                <input type="checkbox" name="class" value="<?= $i ?>" class="class-checkbox class-specific" id="class<?= $i ?>">

                <label for="class<?= $i ?>">Class <?= $i ?></label>

              </div>

            <?php endfor; ?>

          </div>

        </form>

      </div>



      <div class="col-lg-8">

        <h3>SPARK Language Core Competency Framework</h3>

        <div id="contentArea" style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">

          <p>Loading content...</p>

        </div>

      </div>

    </div>

  </div>

</section>



<!-- Subject Label JSON -->

<script>

  const subjectLabels = <?= json_encode($subjects) ?>;

</script>




<!-- Sample Content Data -->

<script>

const contentData = {

  english: {

    1: `
<strong>CG-10: Children develop fluency in reading and writing in a Language.</strong><br><br>

<strong>C-10.1:</strong> Develops phonological awareness and blends phonemes/syllables into words and segments words into phonemes/syllables.<br><br>
<strong>S1 LO A 10.1.1:</strong> The learner will be able to blend individual phonemes and syllables to form familiar words and segment words into individual phonemes and syllables, demonstrating foundational phonological awareness.<br><br>

<strong>C-10.2:</strong> Understands basic structure/format of a book, idea of words in print, and direction in which they are printed, and recognises basic punctuation marks.<br><br>
<strong>S1 LO A 10.2.2:</strong> The learner will be able to recognize simple punctuation marks (full stop, question mark).<br><br>

<strong>C-10.3:</strong> Recognises all the letters of the alphabet of the script and uses this knowledge to read and write words.<br><br>
<strong>S1 LO A 10.3.3:</strong> The learner will be able to recognize all the letters of the alphabet in the script and use this knowledge to read and write words. Can choose the correct spellings of common words.<br><br>
<strong>S1 LO A 10.3.4:</strong> The learner will be able to recognize commonly used sight words (e.g., the, is, are, you, said) and use them to read and construct simple, meaningful sentences.<br><br>
<strong>S1 LO A 10.3.5:</strong> The learner will be able to identify the correct spelling of commonly used CVC (consonant-vowel-consonant) words (e.g., cat, sun, log) from options.<br><br>
<strong>S1 LO A 10.3.6:</strong> The learner will be able to match uppercase and lowercase forms of the same letter in print.<br><br>

<strong>C-10.4:</strong> Reads stories and passages with accuracy and fluency, with appropriate pauses and voice modulation.<br><br>
<strong>S1 LO A 10.4.7:</strong> The learner will be able to interpret punctuation marks (e.g., full stop, comma, question mark, exclamation mark) to identify sentence type, pause, or tone in a short written passage.<br><br>
<strong>S1 LO A 10.4.8:</strong> The learner will be able to choose the correct sentence type (statement, question, or exclamation) based on punctuation and meaning.<br><br>

<strong>C-10.5:</strong> Reads short stories and comprehends their meaning – by identifying characters, storyline, and what the author wanted to say – on their own.<br><br>
<strong>S1 LO A 10.5.9:</strong> The learner will be able to identify main characters, key events (beginning, middle, end), the basic storyline, and the author’s message/purpose in a short age-appropriate story.<br><br>
<strong>S1 LO A 10.5.10:</strong> The learner will be able to infer the meaning of unfamiliar words in short texts using picture cues or the surrounding text.<br><br>
<strong>S1 LO A 10.5.11:</strong> The learner will be able to understand and respond to simple questions based on a short text using question words such as who, what, where, and when.<br><br>

<strong>C-10.6:</strong> Reads short poems and begins to appreciate the poem for its choice of words and imagination.<br><br>
<strong>S1 LO A 10.6.12:</strong> The learner will be able to identify the main idea, rhyming words, and imaginative/descriptive language in a short, age-appropriate poem.<br><br>
<strong>S1 LO A 10.6.13:</strong> The learner will be able to identify rhyming pairs from a set of words.<br><br>

<strong>C-10.7:</strong> Reads and comprehends the meaning of short news items, instructions and recipes, and publicity material.<br><br>
<strong>S1 LO A 10.7.14:</strong> The learner will be able to read short and simple informational texts such as classroom instructions, labels, signs, or recipes, and demonstrate understanding by identifying key details, purpose, and sequence of actions.<br><br>

<strong>C-10.8:</strong> Write a paragraph to express their understanding and experience.<br><br>
<strong>S1 LO A 10.8.15:</strong> The learner will be able to identify complete sentences, arrange sentences in logical order, and choose words or phrases that express simple ideas or personal experiences.<br><br>

`,

2: `
      <strong>CG-10: Children develop fluency in reading and writing in a Language.</strong><br><br>

<strong>C-10.1:</strong> Develops phonological awareness and blends phonemes/syllables into words and segments words into phonemes/syllables.<br><br>
<strong>S1 LO B 10.1.1:</strong> The learner will be able to blend phonemes and syllables to form more complex words, and segment spoken words into individual phonemes and syllables with increased accuracy and fluency.<br><br>
<strong>S1 LO B 10.1.2:</strong> The learner will be able to identify and form common compound words and complete onset-rime patterns in familiar words.<br><br>

<strong>C-10.2:</strong> Understands basic structure/format of a book, idea of words in print, and direction in which they are printed, and recognises basic punctuation marks.<br><br>
<strong>S1 LO B 10.2.3:</strong> The learner will be able to use simple punctuation marks (full stop, question mark) appropriately.<br><br>
<strong>S1 LO B 10.2.4:</strong> The learner will be able to identify capital letters used at the beginning of sentences and names, and recognize the use of commas to separate items in a list.<br><br>
<strong>S1 LO B 10.2.5:</strong> The learner will be able to identify and correct punctuation or capitalisation errors in short sentences.<br><br>

<strong>C-10.3:</strong> Recognises all the letters of the alphabet of the script and uses this knowledge to read and write words.<br><br>
<strong>S1 LO B 10.3.6:</strong> The learner will be able to identify letters and their corresponding sounds, and apply this knowledge to read and write longer and unfamiliar words, including those with blends, digraphs, and common spelling patterns.<br><br>
<strong>S1 LO B 10.3.7:</strong> The learner will be able to choose the correct spelling of age-appropriate unfamiliar words based on familiar sound patterns (e.g., sh-, ch-, -ng, -ck)<br><br>

<strong>C-10.4:</strong> Reads stories and passages with accuracy and fluency, with appropriate pauses and voice modulation.<br><br>
<strong>S1 LO B 10.4.8:</strong> The learner will be able to demonstrate understanding of fluency features such as punctuation, sentence type, and expression by identifying where to pause, how to modulate voice, and what punctuation marks indicate in short written texts.<br><br>

<strong>C-10.5:</strong> Reads short stories and comprehends their meaning – by identifying characters, storyline, and what the author wanted to say – on their own.<br><br>
<strong>S1 LO B 10.5.9:</strong> The learner will be able to independently read short stories with minimal visual support, identify main and supporting characters, setting, and sequence of events, interpret the central idea or plot, and infer the author’s message or intent.<br><br>

<strong>C-10.6:</strong> Reads short poems and begins to appreciate the poem for its choice of words and imagination.<br><br>
<strong>S1 LO B 10.6.10:</strong> The learner will be able to read and understand short poems, identify rhyme schemes and descriptive or imaginative language, and interpret the mood, imagery, and central idea conveyed through the poet’s choice of words.<br><br>

<strong>C-10.7:</strong> Reads and comprehends the meaning of short news items, instructions and recipes, and publicity material.<br><br>
<strong>S1 LO B 10.7.11:</strong> The learner will be able to read and understand short informational texts such as news items, step-by-step instructions, simple recipes, and advertisements, and answer questions by identifying key facts, purpose, sequence, and specific details from the text.<br><br>

<strong>C-10.8:</strong> Write a paragraph to express their understanding and experience.<br><br>
<strong>S1 LO B 10.8.12:</strong> The learner will be able to demonstrate the ability to plan and structure a paragraph by identifying topic sentences, supporting details, logical sequence, and concluding sentences.<br><br>


 `,
 3: `
  <strong>CG-2: Develops the ability to read with comprehension by gaining a basic understanding of different forms of familiar and unfamiliar texts (such as prose and poetry).</strong><br><br>

<strong>C-2.1:</strong> Applies varied comprehension strategies (inferring, predicting, visualising) to understand different texts.<br><br>
<strong>S1 LO C 2.1.1:</strong> The learner will be able to predict what happens next in a short story or poem based on given text clues.<br><br>
<strong>S1 LO C 2.1.2:</strong> The learner will be able to infer the character’s feelings or intentions using their actions or words in a passage.<br><br>

<strong>C-2.2:</strong> Understands main ideas and draws essential conclusions from the material read.<br><br>
<strong>S1 LO C 2.2.3:</strong> The learner will be able to identify the main idea and supporting details in a short paragraph.<br><br>
<strong>S1 LO C 2.2.4:</strong> The learner will be able to choose the most suitable title or heading based on the central theme of a passage.<br><br>

<strong>CG-3: Develops the ability to write simple and compound sentence structures to express their understanding and experiences.</strong><br><br>

<strong>C-3.1:</strong> Uses writing strategies, such as sequencing, identifying headings/sub-headings, the beginning, and ending, and forming paragraphs.<br><br>
<strong>S1 LO C 3.1.5:</strong> The learner will be able to arrange jumbled sentences in the correct sequence to form a meaningful paragraph.<br><br>
<strong>S1 LO C 3.1.6:</strong> The learner will be able to select the most appropriate opening or closing sentence for a short paragraph.<br><br>

<strong>C-3.2:</strong> Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or a reading of a text.<br><br>
<strong>S1 LO C 3.2.7:</strong> The learner will be able to identify the sentence that does not belong in a given paragraph based on topic focus.<br><br>

<strong>C-3.3:</strong> Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.<br><br>
<strong>S1 LO C 3.3.8:</strong> The learner will be able to choose the correct format and content for a given purpose (e.g., a poster, poem, or dialogue) and select the suitable content features for that format.<br><br>

<strong>C-3.4:</strong> Uses appropriate grammar and structure in their writing.<br><br>
<strong>S1 LO C 3.4.9:</strong> The learner will be able to select the correct sentence with proper punctuation and subject–verb agreement from a set of options.<br><br>

<strong>CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.</strong><br><br>

<strong>C-4.1:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.<br><br>
<strong>S1 LO C 4.1.10:</strong> The learner will be able to identify the meaning of a word in context and select its correct synonym or antonym.<br><br>

<strong>C-4.2:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.<br><br>
<strong>S1 LO C 4.2.11:</strong> The learner will be able to match a domain-specific word to its correct meaning in a short passage.<br><br>

   `,
 4: `
 <strong>S1 LO C 3.1.5:</strong> The learner will be able to arrange jumbled sentences in the correct sequence to form a meaningful paragraph.<br><br>
<strong>S1 LO C 3.1.6:</strong> The learner will be able to select the most appropriate opening or closing sentence for a short paragraph.<br><br>

<strong>C-3.2:</strong> Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or a reading of a text.<br><br>
<strong>S1 LO C 3.2.7:</strong> The learner will be able to identify the sentence that does not belong in a given paragraph based on topic focus.<br><br>

<strong>C-3.3:</strong> Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.<br><br>
<strong>S1 LO C 3.3.8:</strong> The learner will be able to choose the correct format and content for a given purpose (e.g., a poster, poem, or dialogue) and select the suitable content features for that format.<br><br>

<strong>C-3.4:</strong> Uses appropriate grammar and structure in their writing.<br><br>
<strong>S1 LO C 3.4.9:</strong> The learner will be able to select the correct sentence with proper punctuation and subject–verb agreement from a set of options.<br><br>

<strong>CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.</strong><br><br>

<strong>C-4.1:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.<br><br>
<strong>S1 LO C 4.1.10:</strong> The learner will be able to identify the meaning of a word in context and select its correct synonym or antonym.<br><br>

<strong>C-4.2:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.<br><br>

<strong>C-3.2:</strong> Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or on a reading of a text.<br><br>
<strong>S1 LO D 3.2.7:</strong> The learner will be able to identify the sentence that does not fit in a paragraph due to a shift in topic or tone.<br><br>

<strong>C-3.3:</strong> Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.<br><br>
<strong>S1 LO D 3.3.8:</strong> The learner will be able to identify the most appropriate format and select suitable content features for a given writing purpose (e.g., invitation, poem, story).<br><br>

<strong>C-3.4:</strong> Uses appropriate grammar and structure in their writing.<br><br>
<strong>S1 LO D 3.4.9:</strong> The learner will be able to identify the sentence that uses correct grammar, punctuation, and sentence structure.<br><br>

<strong>CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.</strong><br><br>

<strong>C-4.1:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.<br><br>
<strong>S1 LO D 4.1.10:</strong> The learner will be able to determine the meaning of a word in context and select its correct synonym or antonym.<br><br>

<strong>C-4.2:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.<br><br>
<strong>S1 LO D 4.2.11:</strong> The learner will be able to identify the meaning of subject- or theme-specific words in a passage.<br><br>


   `,
 5: `
  <strong>CG-2: Develops the ability to read with comprehension by gaining a basic understanding of different forms of familiar and unfamiliar texts (such as prose and poetry).</strong><br><br>

<strong>C-2.1:</strong> Applies varied comprehension strategies (inferring, predicting, visualising) to understand different texts.<br><br>
<strong>S1 LO E 2.1.1:</strong> The learner will be able to predict the most likely outcome in a multi-paragraph narrative using contextual evidence from earlier sections.<br><br>
<strong>S1 LO E 2.1.2:</strong> The learner will be able to infer the unstated cause or motive of a character’s action based on indirect clues in the text.<br><br>

<strong>C-2.2:</strong> Understands main ideas and draws essential conclusions from the material read.<br><br>
<strong>S1 LO E 2.2.3:</strong> The learner will be able to identify the main message or moral of a narrative or poem and select supporting lines or events.<br><br>
<strong>S1 LO E 2.2.4:</strong> The learner will be able to choose a title that reflects the mood, theme, and key event in a multi-paragraph text.<br><br>

<strong>CG-3: Develops the ability to write simple and compound sentence structures to express their understanding and experiences.</strong><br><br>

<strong>C-3.1:</strong> Uses writing strategies, such as sequencing, identifying headings/sub-headings, the beginning, and ending, and forming paragraphs.<br><br>
<strong>S1 LO E 3.1.5:</strong> The learner will be able to arrange a set of jumbled sentences with mixed tenses and varied lengths into a coherent paragraph with appropriate flow.<br><br>
<strong>S1 LO E 3.1.6:</strong> The learner will be able to identify the best opening or closing sentence that sets or sums up the tone and topic of the paragraph.<br><br>

<strong>C-3.2:</strong> Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or a reading of a text.<br><br>
<strong>S1 LO E 3.2.7:</strong> The learner will be able to identify and remove sentences that break coherence due to tense shift, off-topic ideas, or tonal inconsistency.<br><br>

<strong>C-3.3:</strong> Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.<br><br>
<strong>S1 LO E 3.3.8:</strong> The learner will be able to select or improve a written sample based on purpose, audience, and tone.<br><br>

<strong>C-3.4:</strong> Uses appropriate grammar and structure in their writing.<br><br>
<strong>S1 LO E 3.4.9:</strong> The learner will be able to identify grammatically accurate compound and complex sentences with correct punctuation, tense consistency, and conjunctions.<br><br>

<strong>CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.</strong><br><br>

<strong>C-4.1:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.<br><br>
<strong>S1 LO E 4.1.10:</strong> The learner will be able to infer the meaning of unfamiliar words or phrases using context clues such as contrast, example, or explanation.<br><br>

<strong>C-4.2:</strong> Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.<br><br>
<strong>S1 LO E 4.2.11:</strong> The learner will be able to identify and apply the meaning of subject-specific words (e.g., ecosystem, heritage) used in grade-level passages.<br><br>

 

   `,
  6: `
   <strong>CG-1: Develops the capacity for effective communication using Language skills for description, analysis, and response.</strong><br><br>

<strong>C-1.1:</strong> Identifies main points and summarises from a careful listening or reading of the text (news articles, reports, editorials).<br><br>
<strong>S1 LO F 1.1.1:</strong> The learner will be able to identify the main idea of a news article, report, or editorial and distinguish it from supporting details.<br><br>
<strong>S1 LO F 1.1.2:</strong> The learner will be able to select the most appropriate summary of an informational text based on completeness and clarity.<br><br>
<strong>S1 LO F 1.1.3:</strong> The learner will be able to identify off-topic or misleading sentences that weaken the coherence of a summary or paragraph.<br><br>
<strong>S1 LO F 1.1.4:</strong> The learner will be able to arrange key points or arguments from a short article or editorial in a logical sequence.<br><br>
<strong>S1 LO F 1.1.5:</strong> The learner will be able to distinguish between fact, opinion, and reasoned judgement in short informational or argumentative texts.<br><br>

<strong>C-1.2:</strong> Listens to, plans, and conducts different kinds of interviews (structured and unstructured).<br><br>
<strong>S1 LO F 1.2.6:</strong> The learner will be able to identify the features of structured and unstructured interviews based on format, flow, and question type.<br><br>
<strong>S1 LO F 1.2.7:</strong> The learner will be able to select relevant and appropriate interview questions for a given context and identify those that are irrelevant, repetitive, or off-topic.<br><br>
<strong>S1 LO F 1.2.8:</strong> The learner will be able to infer the intent or focus of a question in an interview setting (e.g., to seek a fact, opinion, or feeling).<br><br>

<strong>C-1.3:</strong> Raises probing questions about social experiences using appropriate language (open-ended/closed-ended, formal/informal, relevant to context, with sensitivity).<br><br>
<strong>S1 LO F 1.3.9:</strong> The learner will be able to identify the most appropriate type of question (open-ended or closed-ended) to gather specific information in a given social context.<br><br>
<strong>S1 LO F 1.3.10:</strong> The learner will be able to choose context-appropriate questions based on tone, formality, and sensitivity in social conversations.<br><br>

<strong>C-1.4:</strong> Writes different kinds of letters, essays, and reports using appropriate style and registers for different audiences and purposes.<br><br>
<strong>S1 LO F 1.4.11:</strong> The learner will be able to identify the correct format and structure for different types of writing tasks, such as letters, essays, or reports.<br><br>
<strong>S1 LO F 1.4.12:</strong> The learner will be able to choose the most suitable tone, style, and language for a piece of writing based on audience and purpose.<br><br>

<strong>CG-2: Appreciates the language and literary and cultural heritage in and related to the Language by exploring the various forms of literary devices.</strong><br><br>

<strong>C-2.1:</strong> Identifies and appreciates different forms of literature (prose, poetry, drama) and styles of writing (narrative, descriptive, expository, persuasive) from various cultures and time periods.<br><br>
<strong>S1 LO F 2.1.13:</strong> The learner will be able to identify the form of a literary text (prose, poetry, or drama) and recognize its key structural features.<br><br>
<strong>S1 LO F 2.1.14:</strong> The learner will be able to distinguish between different styles of writing—narrative, descriptive, expository, and persuasive—based on content, structure, and purpose.<br><br>
<strong>S1 LO F 2.1.15:</strong> The learner will be able to identify cultural or contextual clues (names, customs, settings) that reflect the origin or background of a literary text.<br><br>

<strong>C-2.2:</strong> Identifies literary devices [simile, metaphor, personification, hyperbole, alliteration, idioms, proverbs, and riddles] by reading a variety of literature and uses them in writing.<br><br>
<strong>S1 LO F 2.2.16:</strong> The learner will be able to identify and interpret commonly used literary devices such as simile, metaphor, personification, and hyperbole in short literary texts.<br><br>
<strong>S1 LO F 2.2.17:</strong> The learner will be able to recognize and interpret figurative expressions such as alliteration, idioms, proverbs, and riddles, and infer their meaning in context.<br><br>

<strong>CG-3: Develops the ability to recognise basic linguistic aspects (word and sentence structure) and use them in oral and written expression.</strong><br><br>

<strong>C-3.1:</strong> Interprets and understands basic linguistic aspects (rules), such as sentence structure, punctuation, tense, gender, and parts of speech, while reading different forms of literature, and applies them while writing.<br><br>
<strong>S1 LO F 3.1.18:</strong> The learner will be able to identify grammatically correct and complete sentences, including correct use of tense and subject–verb agreement.<br><br>
<strong>S1 LO F 3.1.19:</strong> The learner will be able to identify and correct punctuation errors such as commas, full stops, quotation marks, and apostrophes.<br><br>
<strong>S1 LO F 3.1.20:</strong> The learner will be able to recognise and apply basic parts of speech (nouns, pronouns, verbs, adjectives, adverbs) in context.<br><br>
<strong>S1 LO F 3.1.21:</strong> The learner will be able to identify errors in sentence structure, such as fragments, misplaced modifiers, or word order that affect clarity.<br><br>

<strong>CG-5: Develops an appreciation of the distinctive features of the particular language, including its alphabet and script, sounds, rhymes, puns, and other wordplays and games unique to the language.</strong><br><br>

<strong>C-5.2:</strong> Engages in the use of puns, rhymes, alliteration, and other wordplays in the language to make speech and writing more interesting and enjoyable.<br><br>
<strong>S1 LO F 5.2.22:</strong> The learner will be able to identify and interpret rhyme, alliteration, and simple wordplay (e.g., puns, homophones) in short texts or poems.<br><br>

<strong>C-5.3:</strong> Becomes familiar with some of the major word games in the language (e.g., palindromes, spoonerisms, sentences without given letters or sounds, riddles, jokes, antakshari, anagrams, crosswords).<br><br>
<strong>S1 LO F 5.3.23:</strong> The learner will be able to identify or solve simple language-based word games such as palindromes, anagrams, and riddles that play with written clues related to sound, sequence, or meaning.<br><br>


     `,
  7: `
    <strong>CG-1: Develops the capacity for effective communication using Language skills for description, analysis, and response.</strong><br><br>

<strong>C-1.1:</strong> Identifies main points and summarises from a careful listening or reading of the text (news articles, reports, editorials).<br><br>
<strong>S1 LO G 1.1.1:</strong> The learner will be able to identify implicit main ideas or themes in editorials, reports, or news articles.<br><br>
<strong>S1 LO G 1.1.2:</strong> The learner will be able to evaluate whether a given summary captures the central idea, tone, and logical flow of an informational text.<br><br>
<strong>S1 LO G 1.1.3:</strong> The learner will be able to identify biased or subjective language that affects objectivity in summaries.<br><br>

<strong>C-1.2:</strong> Listens to, plans, and conducts different kinds of interviews (structured and unstructured).<br><br>
<strong>S1 LO G 1.2.4:</strong> The learner will be able to distinguish between factual and opinion-based responses in structured or unstructured interview excerpts.<br><br>
<strong>S1 LO G 1.2.5:</strong> The learner will be able to identify logical inconsistencies, redundancies, or ambiguities in interview questions or responses.<br><br>

<strong>C-1.3:</strong> Raises probing questions about social experiences using appropriate language (open-ended/closed-ended, formal/informal, relevant to context, with sensitivity).<br><br>
<strong>S1 LO G 1.3.6:</strong> The learner will be able to analyse the effectiveness of a question in eliciting information, based on openness, tone, and contextual relevance.<br><br>
<strong>S1 LO G 1.3.7:</strong> The learner will be able to choose the most context-appropriate question to extend a conversation or clarify a point in a social exchange.<br><br>

<strong>C-1.4:</strong> Writes different kinds of letters, essays, and reports using appropriate style and registers for different audiences and purposes.<br><br>
<strong>S1 LO G 1.4.8:</strong> The learner will be able to identify deviations from formal or informal tone in writing.<br><br>
<strong>S1 LO G 1.4.9:</strong> The learner will be able to revise structurally weak writing samples by choosing the most appropriate organisational pattern or transition.<br><br>

<strong>CG-2: Appreciates the language and literary and cultural heritage in and related to the Language by exploring the various forms of literary devices.</strong><br><br>

<strong>C-2.1:</strong> Identifies and appreciates different forms of literature (prose, poetry, drama) and styles of writing (narrative, descriptive, expository, persuasive) from various cultures and time periods.<br><br>
<strong>S1 LO G 2.1.10:</strong> The learner will be able to analyse how the structure and features of prose, poetry, or drama influence meaning or emotional effect.<br><br>
<strong>S1 LO G 2.1.11:</strong> The learner will be able to compare and contrast different styles of writing (e.g., narrative vs. expository) based on purpose, tone, and structure.<br><br>
<strong>S1 LO G 2.1.12:</strong> The learner will be able to identify how cultural context, historical period, or setting influences the content and expression in literary texts.<br><br>

<strong>C-2.2:</strong> Identifies literary devices [simile, metaphor, personification, hyperbole, alliteration, idioms, proverbs, and riddles] by reading a variety of literature and uses them in writing.<br><br>
<strong>S1 LO G 2.2.13:</strong> The learner will be able to distinguish between similar literary devices (e.g., simile vs. metaphor, personification vs. hyperbole) by interpreting their use in context.<br><br>
<strong>S1 LO G 2.2.14:</strong> The learner will be able to analyse the effect of specific literary devices (e.g., idioms, proverbs, riddles) on the tone, humour, or meaning of a literary passage.<br><br>

<strong>CG-3: Develops the ability to recognise basic linguistic aspects (word and sentence structure) and use them in oral and written expression.</strong><br><br>

<strong>C-3.1:</strong> Interprets and understands basic linguistic aspects (rules), such as sentence structure, punctuation, tense, gender, and parts of speech, while reading different forms of literature, and applies them while writing.<br><br>
<strong>S1 LO G 3.1.15:</strong> The learner will be able to identify and correct errors in complex sentence structures, such as tense shifts, faulty parallelism, or misplaced modifiers.<br><br>
<strong>S1 LO G 3.1.16:</strong> The learner will be able to choose the correct punctuation to maintain clarity in compound and complex sentences.<br><br>
<strong>S1 LO G 3.1.17:</strong> The learner will be able to analyse how words or phrases (e.g., participial phrases, subordinating conjunctions) function within a sentence to create meaning or structure.<br><br>

<strong>CG-5: Develops an appreciation of the distinctive features of the particular language, including its alphabet and script, sounds, rhymes, puns, and other wordplays and games unique to the language.</strong><br><br>

<strong>C-5.2:</strong> Engages in the use of puns, rhymes, alliteration, and other wordplays in the language to make speech and writing more interesting and enjoyable.<br><br>
<strong>S1 LO G 5.2.18:</strong> The learner will be able to interpret the meaning and humour created through puns, rhymes, or homophones in short written texts.<br><br>
<strong>S1 LO G 5.2.19:</strong> The learner will be able to identify examples of alliteration and other sound-based devices and explain their impact on tone or mood.<br><br>

<strong>C-5.3:</strong> Becomes familiar with some of the major word games in the language (e.g., palindromes, spoonerisms, sentences without given letters or sounds, riddles, jokes, antakshari, anagrams, crosswords).<br><br>
<strong>S1 LO G 5.3.20:</strong> The learner will be able to identify the underlying word pattern or rule (e.g., letter reversal, sound swap, alphabet sequence) in language-based word games.<br><br>
<strong>S1 LO G 5.3.21:</strong> The learner will be able to solve or interpret palindromes, spoonerisms, riddles, or anagrams based on clues.<br><br>

     `,
    8: `
      <strong>CG-1: Develops the capacity for effective communication using Language skills for description, analysis, and response.</strong><br><br>

<strong>C-1.1:</strong> Identifies main points and summarises from a careful listening or reading of the text (news articles, reports, editorials).<br><br>
<strong>S1 LO H 1.1.1:</strong> The learner will be able to infer the central idea of an editorial or opinion piece even when it is implied or spread across paragraphs.<br><br>
<strong>S1 LO H 1.1.2:</strong> The learner will be able to evaluate multiple summaries and select the one that best preserves logical progression, tone, and core argument.<br><br>
<strong>S1 LO H 1.1.3:</strong> The learner will be able to detect bias or rhetorical slant in how main ideas or facts are framed in journalistic writing.<br><br>
<strong>S1 LO H 1.1.4:</strong> The learner will be able to identify sentences that distort or dilute the main idea when included in a summary.<br><br>

<strong>C-1.2:</strong> Listens to, plans, and conducts different kinds of interviews (structured and unstructured).<br><br>
<strong>S1 LO H 1.2.5:</strong> The learner will be able to analyse the structure and flow of an interview transcript to determine whether it is structured or unstructured.<br><br>
<strong>S1 LO H 1.2.6:</strong> The learner will be able to evaluate the appropriateness of a question in an interview based on tone, clarity, and relevance.<br><br>
<strong>S1 LO H 1.2.7:</strong> The learner will be able to detect shifts in power, emotion, or intent in an interview based on language cues.<br><br>
<strong>S1 LO H 1.2.8:</strong> The learner will be able to revise a given interview excerpt to improve flow, clarity, or neutrality.<br><br>

<strong>C-1.3:</strong> Raises probing questions about social experiences using appropriate language (open-ended/closed-ended, formal/informal, relevant to context, with sensitivity).<br><br>
<strong>S1 LO H 1.3.9:</strong> The learner will be able to evaluate whether a given question is likely to elicit a thoughtful or informative response in a specific social scenario.<br><br>
<strong>S1 LO H 1.3.10:</strong> The learner will be able to revise a poorly framed question to improve its tone, sensitivity, or clarity in a given social or interpersonal context.<br><br>
<strong>S1 LO H 1.3.11:</strong> The learner will be able to differentiate between questions that are appropriate for gathering factual, emotional, or opinion-based responses in diverse social contexts.<br><br>

<strong>C-1.4:</strong> Writes different kinds of letters, essays, and reports using appropriate style and registers for different audiences and purposes.<br><br>
<strong>S1 LO H 1.4.12:</strong> The learner will be able to evaluate whether the tone, style, and structure of a sample letter, essay, or report are appropriate for its intended audience and purpose.<br><br>
<strong>S1 LO H 1.4.13:</strong> The learner will be able to identify logical flaws in the organisation or argument flow of essays and reports, and choose the best revision.<br><br>
<strong>S1 LO H 1.4.14:</strong> The learner will be able to adapt the format and style of a piece of writing to suit a different audience or purpose.<br><br>

<strong>CG-2: Appreciates the language and literary and cultural heritage in and related to the Language by exploring various forms of literary devices.</strong><br><br>

<strong>C-2.1:</strong> Identifies and appreciates different forms of literature and styles of writing (narrative, descriptive, expository, persuasive) from various cultures and time periods.<br><br>
<strong>S1 LO H 2.1.15:</strong> The learner will be able to compare the use of structure and narrative techniques across prose, poetry, and drama to explain how they shape meaning or emotional impact.<br><br>
<strong>S1 LO H 2.1.16:</strong> The learner will be able to evaluate how the choice of writing style (e.g., expository vs. persuasive) affects clarity, impact, or bias in a given passage.<br><br>
<strong>S1 LO H 2.1.17:</strong> The learner will be able to interpret how cultural, historical, or geographical context shapes character, setting, or theme in a literary work.<br><br>

<strong>C-2.2:</strong> Identifies literary devices [simile, metaphor, personification, hyperbole, alliteration, idioms, proverbs, and riddles] by reading a variety of literature and uses them in writing.<br><br>
<strong>S1 LO H 2.2.18:</strong> The learner will be able to analyse how literary devices such as simile, metaphor, personification, or hyperbole contribute to tone, imagery, or theme in literary texts.<br><br>
<strong>S1 LO H 2.2.19:</strong> The learner will be able to evaluate the effectiveness of idioms, proverbs, or figurative expressions in reinforcing meaning, humour, or argument.<br><br>
<strong>S1 LO H 2.2.20:</strong> The learner will be able to identify shifts in meaning or tone created through literary ambiguity, irony, or pun in short texts.<br><br>

<strong>CG-3: Develops the ability to recognise basic linguistic aspects and use them in oral and written expression.</strong><br><br>

<strong>C-3.1:</strong> Interprets and understands basic linguistic aspects (rules), such as sentence structure, punctuation, tense, gender, and parts of speech, while reading different forms of literature, and applies them while writing.<br><br>
<strong>S1 LO H 3.1.21:</strong> The learner will be able to identify and correct errors in advanced sentence constructions, such as dangling modifiers, faulty comparisons, or incorrect tense shifts in multi-clause sentences.<br><br>
<strong>S1 LO H 3.1.22:</strong> The learner will be able to evaluate the appropriateness of punctuation in clarifying meaning in sentences containing direct and indirect speech, parenthetical elements, or complex lists.<br><br>
<strong>S1 LO H 3.1.23:</strong> The learner will be able to analyse the grammatical function and relationship of different sentence elements such as noun phrases, clauses, and conjunctions in context.<br><br>

<strong>CG-5: Develops an appreciation of the distinctive features of the particular language, including its alphabet and script, sounds, rhymes, puns, and other wordplays and games unique to the language.</strong><br><br>

<strong>C-5.2:</strong> Engages in the use of puns, rhymes, alliteration, and other wordplays in the language to make speech and writing more interesting and enjoyable.<br><br>
<strong>S1 LO H 5.2.24:</strong> The learner will be able to interpret layered wordplay (e.g., puns, rhymes, homonyms) in poems, riddles, or short narratives and explain its impact on tone, humour, or meaning.<br><br>
<strong>S1 LO H 5.2.25:</strong> The learner will be able to analyse how sound-based literary devices contribute to mood, rhythm, or emphasis in literary texts.<br><br>

<strong>C-5.3:</strong> Becomes familiar with some of the major word games in the language (e.g., palindromes, spoonerisms, sentences without given letters or sounds, riddles, jokes, antakshari, anagrams, crosswords).<br><br>
<strong>S1 LO H 5.3.26:</strong> The learner will be able to analyse the logic or pattern behind language-based word games (e.g., palindromes, anagrams, spoonerisms, crosswords) and explain the reasoning that makes the game valid or clever.<br><br>
<strong>S1 LO H 5.3.27:</strong> The learner will be able to solve or complete moderately complex word games (e.g., multi-step anagrams, crosswords, or riddles) using clues involving structure, meaning, or alphabetic constraints.<br><br>


       `,

  },

  math: {

     1: `<strong>CG-8: Children develop mathematical understanding and abilities to recognize the world through quantities, shapes, and measures.</strong><br><br>

<strong>C-8.1:</strong> Sorts objects into groups and sub-groups based on more than one property.<br><br>
<strong>S2 LO A 8.1.1:</strong> Sorts objects into 2 groups based on size, length, height, and weight (big-small, Long-short).<br><br>

<strong>C-8.2:</strong> Identifies and extends simple patterns in their surroundings, shapes, and numbers.<br><br>
<strong>S2 LO A 8.2.2:</strong> Fills in missing elements of simple, repeating patterns in different aspects.<br><br>

<strong>C-8.3:</strong> Counts up to 99 both forwards and backwards, and in groups of 10s and 20s.<br><br>
<strong>S2 LO A 8.3.3:</strong> Counts objects beyond 20 but up to 99 using number names and recognizes grouping in tens.<br><br>

<strong>C-8.4:</strong> Arranges numbers up to 99 in ascending and descending order.<br><br>
<strong>S2 LO A 8.4.4:</strong> Arranges the same set of objects in different sequences based on different properties of objects (e.g., by size/length/weight/colour).<br><br>

<strong>C-8.5:</strong> Recognises and uses numerals to represent quantities up to 99 with an understanding of the decimal place value system.<br><br>
<strong>S2 LO A 8.5.5:</strong> Recognizes the symbol zero to represent the absence of an object/thing.<br><br>
<strong>S2 LO A 8.5.6:</strong> Recognizes and writes numerals up to 20 and in words up to 10.<br><br>
<strong>S2 LO A 8.5.7:</strong> Compares two numbers up to 20 and uses vocabulary like bigger than or smaller than.<br><br>

<strong>C-8.6:</strong> Performs addition and subtraction of 2-digit numbers fluently using flexible strategies of composition and decomposition.<br><br>
<strong>S2 LO A 8.6.8:</strong> Uses real-world situations to model and solve addition sums up to 18 using addition facts.<br><br>
<strong>S2 LO A 8.6.9:</strong> Uses real-world situations to model and solve subtraction (e.g., taking away chocolates in a given set) problems up through 9 using subtraction facts.<br><br>
<strong>S2 LO A 8.6.10:</strong> Identifies appropriate operation (addition or subtraction) to solve problems in a familiar situation/context.<br><br>

<strong>C-8.7:</strong> Recognises multiplication as repeated addition and division as equal sharing.<br><br>
<strong>S2 LO A 8.7.11:</strong> Solves small number multiplication problems by grouping.<br><br>
<strong>S2 LO A 8.7.12:</strong> Uses trial and error and sharing into groups for solving division problems.<br><br>

<strong>C-8.8:</strong> Recognises, makes, and classifies basic geometric shapes and their observable properties, and understands and explains the relative relation of objects in space.<br><br>
<strong>S2 LO A 8.8.13:</strong> Uses vocabulary of spatial relationships (e.g., top, bottom, on, under, inside, outside, above, below, near, far, before, after).<br><br>
<strong>S2 LO A 8.8.14:</strong> Sorts, classifies, and describes the objects based on shapes and other observable properties.<br><br>
<strong>S2 LO A 8.8.15:</strong> Observes and describes the physical features of various solids/shapes in his/her language (e.g., a ball rolls, a box slides).<br><br>
<strong>S2 LO A 8.8.16:</strong> Identifies 2D shapes by their names (e.g., square, rectangle, triangle, and circle) and describes their observable characteristics (e.g., the pages of a book are rectangular and have 4 sides, 4 corners).<br><br>

<strong>C-8.9:</strong> Selects appropriate tools and units to perform simple measurements of length, weight, and volume of objects in their immediate environment.<br><br>
<strong>S2 LO A 8.9.17:</strong> Distinguishes between near, far, thin, thick, longer/taller, shorter, high, and low.<br><br>
<strong>S2 LO A 8.9.18:</strong> Compare and place in order from light to heavy objects or vice versa.<br><br>
<strong>S2 LO A 8.9.19:</strong> Estimates volumes of containers using uniform non-standard units like a cup/spoon/mug.<br><br>

<strong>C-8.11:</strong> Performs simple transactions using money up to Rs. 100.<br><br>
<strong>S2 LO A 8.11.20:</strong> Adds up notes and coins to form amounts up to ₹ 20.<br><br>


`,




 2: `
 <strong>CG-8: Children develop mathematical understanding and abilities to recognize the world through quantities, shapes, and measures.</strong><br><br>

<strong>C-8.1:</strong> Sorts objects into groups and sub-groups based on more than one property.<br><br>

<strong>S2 LO B 8.1.1:</strong> Sorts objects into 3 groups based on size, length, height, and weight (smaller sized – big sized – bigger sized).<br><br>
<strong>S2 LO B 8.1.2:</strong> Sorts objects into groups based on attributes they recognize and describes the rule of sorting. (e.g., sort animals that live in the same surrounding - dogs, cats, rats, snakes. Within this are able to classify grass-eating and meat-eating animals).<br><br>
<strong>S2 LO B 8.1.3:</strong> Sorts objects into groups and subgroups (e.g., in a group of blocks, first sorts based on colour, then within the colour, sorts based on shape, then sorts based on size. Sorts between trees and creepers, within that sort fruit bearing and non-fruit bearing, within that edible or non-edible).<br><br>

<strong>C-8.2:</strong> Identifies and extends simple patterns in their surroundings, shapes, and numbers<br><br>

<strong>S2 LO B 8.2.4:</strong> Describes and extends repeating or growing patterns using numbers, shapes, or symbols.<br><br>

<strong>C-8.3:</strong> Counts up to 99 both forwards and backwards and in groups of 10s and 20s.<br><br>

<strong>S2 LO B 8.3.5:</strong> Demonstrates skip counting in 2s or 3s on a number line (graduated).<br><br>
<strong>S2 LO B 8.3.6:</strong> Reads and writes numbers up to 99 in Indian numerals using tens and ones.<br><br>
<strong>S2 LO B 8.3.7:</strong> Recognizes quantities in groups of 2 (e.g., two groups of ten makes 20).<br><br>

<strong>C-8.4:</strong> Arranges numbers up to 99 in ascending and descending order.<br><br>

<strong>S2 LO B 8.4.8:</strong> Arranges numbers from a given set of numbers in ascending and descending order.<br><br>

<strong>C-8.5:</strong> Recognises and uses numerals to represent quantities up to 99 with the understanding of decimal place value system.<br><br>

<strong>S2 LO B 8.5.9:</strong> Recognises, reads, writes number names and numerals up to 99 using place value concept.<br><br>
<strong>S2 LO B 8.5.10:</strong> Forms and compares greatest and smallest 2-digit numbers using given digits (with/without repetition).<br><br>

<strong>C-8.6:</strong> Performs addition and subtraction of 2-digit numbers fluently using flexible strategies of composition and decomposition.<br><br>

<strong>S2 LO B 8.6.11:</strong> Uses flexible strategies and derives combinations of composing (add together) and decomposing numbers (take away for the set).<br><br>
<strong>S2 LO B 8.6.12:</strong> Adds two numbers using place value concept (sum not exceeding 99) and applies them to solve simple daily life problems/ situations.<br><br>
<strong>S2 LO B 8.6.13:</strong> Subtracts two numbers up to 99 using place value and applies them to solve simple daily life problems/ situations.<br><br>
<strong>S2 LO B 8.6.14:</strong> Identifies appropriate operation (addition or subtraction) to solve problems in a familiar situation/context.<br><br>
<strong>S2 LO B 8.6.15:</strong> Solves one-step word problems involving addition or subtraction.<br><br>

<strong>C-8.7:</strong> Recognises multiplication as repeated addition and division as equal sharing.<br><br>
<strong>S2 LO B 8.7.16:</strong> Uses repeated adding to solve simple multiplication problems up to 99.<br><br>
<strong>S2 LO B 8.7.17:</strong> Solves simple sharing problems (division) using equal groups.<br><br>

<strong>C-8.8:</strong> Recognises, makes, and classifies basic geometric shapes and their observable properties, and understands and explains the relative relation of objects in space.<br><br>
<strong>S2 LO B 8.8.18:</strong> Describes features of 2D and 3D shapes using everyday language.<br><br>
<strong>S2 LO B 8.8.19:</strong> Compares shapes based on specific attributes (e.g., length, area, volume).<br><br>
<strong>S2 LO B 8.8.20:</strong> Identifies 3D shapes by their names and describes their observable characteristics.<br><br>

<strong>C-8.9:</strong> Selects appropriate tools and units to perform simple measurements of length, weight, and volume of objects in their immediate environment.<br><br>
<strong>S2 LO B 8.9.21:</strong> Estimates and measures length/ distances and capacities of containers using uniform nonstandard units like a rod/pencil, cup/ spoon/bucket.<br><br>
<strong>S2 LO B 8.9.22:</strong> Chooses the most appropriate non-standard unit to measure volume from a set of pictures.<br><br>

<strong>C-8.11:</strong> Performs simple transactions using money up to Rs. 100.<br><br>
<strong>S2 LO B 8.11.23:</strong> Adds up notes and coins to form amounts up to ₹ 100.<br><br>
<strong>S2 LO B 8.11.24:</strong> Finds how much more is needed to make a given amount.<br><br>




  <strong>Class III (C)</strong><br><br>




  <strong>CG-1:</strong> Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.<br><br>

<strong>C-1.1:</strong> Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.<br><br>
<strong>S2 LO C 1.1.1:Reads and writes numbers up to 1000.</strong> <br><br>
<strong>S2 LO C 1.1.2: Understands the concept of place value for 3-digit numbers.</strong> <br><br>
<strong>S2 LO C 1.1.3:</strong> Identifies and creates the greatest and smallest numbers using given digits (with/without repetition).<br><br>

<strong>Key Focus Area:</strong><br>
Ask students to identify the place <strong> value of a digit</strong>  (e.g., "What is the value of 3 in 738?")<br>
Use <strong> digit manipulation</strong>  for forming numbers (e.g., greatest number using 2, 5, 9)<br><br>

<strong>C-1.2:</strong> Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.<br><br>
<strong>S2 LO C 1.2.4:</strong> Identifies and names unit fractions (e.g., 1/2, 1/4, 1/3).<br><br>
<strong>S2 LO C 1.2.5:</strong> Compares unit fractions using visuals or real-life contexts.<br><br>
  <strong>Key Focus Area:</strong><br>
Use <strong> shaded shapes or collection images </strong> to represent fractions.<br>
Ask for <strong> fraction comparisons</strong>  with equal wholes only.<br><br>

<strong>C-1.3:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade) and applies the four basic operations on whole numbers to solve daily life problems.<br><br>
<strong>S2 LO C 1.3.6: Adds and subtracts 2-digit and 3-digit numbers with and without regrouping.</strong> <br><br>
<strong>S2 LO C 1.3.7:</strong> Makes reasonable estimates of sums and differences.<br><br>
<strong>S2 LO C 1.3.8: Understands multiplication as repeated addition and finds products.</strong> <br><br>
<strong>S2 LO C 1.3.9: Understands division as repeated subtraction or equal sharing and finds quotients and remainders for simple division facts.</strong> <br><br>
<strong>S2 LO C 1.3.10: Solves simple word problems involving addition, subtraction, multiplication, and division within 1000.</strong> <br><br>
<strong>S2 LO C 1.3.11:</strong> Solves 2-step word problems using different operations sequentially.<br><br>

<strong>Key Focus Area:</strong><br>
Use <strong> simple and 2-step word problems </strong> involving all four operations.<br>
Include<strong>  operation identification tasks</strong>  (e.g., “What operation should be used to…?”).<br>
Ask for <strong> estimates</strong>  with rounded numbers.<br>
Include <strong> product/quotient identification</strong>  with small numbers (within 1000).<br><br>

<strong>C-1.4:</strong> Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.<br><br>
<strong>S2 LO C 1.4.12: Classifies numbers as odd or even using real-life contexts.</strong> <br><br>
<strong>S2 LO C 1.4.13: Recognizes and generates number patterns through skip counting by 2s, 5s, and 10s.</strong> <br><br>

<strong>Key Focus Area:</strong><br>
Use <strong> skip counting sequences</strong>  (+2, +5, +10).<br>
Include questions to classify numbers as <strong> odd/even.</strong> <br><br>

<strong>CG-2:</strong> Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.<br><br>

<strong>C-2.1:</strong> Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.<br><br>
<strong>S2 LO C 2.1.14: Identifies and names common 2D shapes (e.g., triangle, square, rectangle, circle).<br><br>
S2 LO C 2.1.15: Describes 2D shapes based on number of sides and vertices.<br><br>
S2 LO C 2.1.16: Identifies and names basic 3D shapes (e.g., cube, cuboid, sphere, cylinder, cone) in surroundings.</strong> <br><br>

<strong>Key Focus Area:</strong><br>
Use <strong> images of real-world objects </strong> to identify shapes.<br>
Include shape classification by<strong>  number of sides, </strong> corners, faces.<br>
Ask “Which shape has 3 corners?” or “Which is a cube?”<br><br>
<strong>C-2.2:</strong> Describes location and movement using both common language and mathematical vocabulary; understands the notion of map (Najri Naksha).<br><br>
<strong>S2 LO C 2.2.17: Describes relative positions of objects using spatial vocabulary (e.g., top, bottom, on, under, inside, outside, above, below, near, far).</strong> <br><br>

<strong>Key Focus Area:</strong><br>
Present object-in-space pictures (e.g., “Where is the cat?” → above/on/under).<br>
Ask for<strong>  positional relationships </strong> using common spatial terms.<br><br>

<strong>C-2.3:</strong> Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.<br><br>
<strong>S2 LO C 2.3.18: Identifies simple lines of symmetry in regular shapes using folding or drawing.</strong> <br><br>
<strong>S2 LO C 2.3.19:</strong> Identifies the mirror reflection using objects or paper-folding (Olympiad Enrichment).<br><br>

<strong>Key Focus Area:</strong><br>
Use images showing<strong>  folded shapes or mirror images.</strong> <br>
Ask for identification of <strong> symmetrical figures or lines of symmetry.</strong> <br>
Use simple visuals like butterfly wings, leaves, or paper folds.<br><br>

<strong>C-2.4:</strong> Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.<br><br>
<strong>S2 LO C 2.4.20:</strong> Recognizes and extends simple patterns involving 2D shapes.<br><br>

<strong>Key Focus Area:</strong><br>
Use patterns involving<strong>  repeating shapes or tiles.</strong> <br>
Ask for the <strong> next shape or color</strong>  in the sequence.<br><br>

<strong>CG-3:</strong> Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.<br><br>

<strong>C-3.1:</strong> Measures in non-standard and standard units and evaluates the need for standard units.<br><br>
<strong>S2 LO C 3.1.21: Measures length using standard units like centimeter (cm) and meter (m) with a ruler or measuring tape.<br><br>
S2 LO C 3.1.22: Compares objects by weight and estimates weight using non-standard and standard units (g, kg).<br><br>
S2 LO C 3.1.23: Compares objects by capacity and estimates capacity using non-standard and standard units (ml, l).</strong> <br><br>

<strong>Key Focus Area:</strong><br>
Use visuals for <strong> unit matching </strong> (e.g., “What unit would you use to measure water in a bottle?”).<br>
Ask for <strong> estimates and comparisons</strong>  (e.g., “Which object is heavier?”).<br><br>

<strong>C-3.2:</strong> Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.<br><br>
<strong>S2 LO C 3.2.24: Tells time to the nearest minute using analogue and digital clocks.</strong> </strong> <br><br>

<strong>Key Focus Area:</strong><br>
Ask for <strong> time-telling </strong> from analog/digital clock images.<br>
Include questions like “What time is shown?” or “What comes after 2:30?”<br><br>

<strong>C-3.3:</strong> Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.<br><br>
<strong>S2 LO C 3.3.25:</strong> Converts larger units to smaller units for length and capacity, e.g., m to cm, l to ml, within simple contexts.<br><br>
<strong>Key Focus Area:</strong><br>
Use simple numeric conversions (e.g., 1 m = 100 cm).<br>
Ask to convert units in small steps (e.g., 2 m = ? cm).<br><br>

<strong>C-3.4:</strong> Understands the definition and formula for the area of a square or rectangle as length times breadth.<br><br>
<strong>S2 LO C 3.4.26: Understands that area is the space covered by a 2D shape by counting unit squares.</strong> <br><br>

<strong>Key Focus Area:</strong><br>
Ask to <strong> count unit squares</strong>  to estimate area in grid-based images.<br>
Avoid formula-based computation; use <strong> visual understanding.</strong> <br><br>

<strong>C-3.5:</strong> Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume and verifies the same using standard units.<br><br>
<strong>S2 LO C 3.5.27: Calculates duration of time in hours and minutes in simple scenarios.</strong> <br><br>
<strong>S2 LO C 3.5.28:</strong> Solves simple elapsed time word problems involving both a.m. and p.m.<br><br>
<strong>S2 LO C 3.5.29:</strong> Measures and compares perimeter of simple shapes informally (e.g., using string).<br><br>

<strong>Key Focus Area:</strong><br>
Include simple <strong> elapsed time problems </strong> (e.g., from 3:00 to 4:30).<br>
Use<strong>  word problems for perimeter comparisons.</strong> <br>
Ask for <strong> duration-based reasoning.</strong> <br><br>



<strong>C-3.6:</strong> Deduces that shapes having equal areas can have different perimeters and shapes having equal perimetres can have different areas.<br>
<strong>S2 LO C 3.6.30:</strong> Explores that different shapes can have the same perimeter using concrete examples.<br>
<strong>Key Focus Area:</strong><br>
Use <strong> visual comparisons of shapes to ask:</strong> “Which shape has the same perimeter but different area?”<br><br>
Focus on<strong> conceptual difference, </strong>not direct computation.<br><br>

<strong>C-3.7:</strong> Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.<br><br>
<strong>S2 LO C 3.7.31:</strong> Demonstrates conservation of length (e.g., string length remains constant regardless of arrangement).<br><br>
<strong>S2 LO C 3.7.32:</strong> Identifies which containers hold the same volume based on visual cues.<br><br>
<strong>Key Focus Area:</strong><br>
Include <strong>visuals showing string or liquid in different containers.</strong><br>
Ask, “Has the amount changed?” to check understanding of conservation.<br><br>

<strong>CG-4:</strong> Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.<br><br>

<strong>C-4.1:</strong> Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).<br><br>
<strong>S2 LO C 4.1.33: Translates simple daily life situations into mathematical problems (e.g., identifying the operation needed).<br><br>
S2 LO C 4.1.34: Uses concrete materials or drawings to help solve problems.</strong><br><br>



<strong>Key Focus Area:</strong><br>
Ask learners to select the correct operation(s) for a given scenario.<br>
Include visual or verbal puzzles like<strong>  “magic total” problems.</strong><br><br>

<strong>C-4.2:</strong> Learns to systematically count and list all possible permutations or combination given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).<br><br>
<strong>S2 LO C 4.2.35:</strong> Collects and organizes data using tally marks for a given set of items.<br><br>
<strong>S2 LO C 4.2.36: Represents data using pictographs (where one symbol represents one unit).</strong><br><br>
<strong>S2 LO C 4.2.37: Interprets simple pictographs to answer questions.</strong><br><br>
<strong>S2 LO C 4.2.38:</strong> Solves simple comparison-based questions from pictographs.<br><br>

<strong>Key Focus Area:</strong><br>
Ask for <strong>pictograph interpretation.</strong><br>
Include questions like “How many more…?” or “Which is the least?”<br>
Use only <strong>1-to-1 symbol pictographs for clarity.</strong><br><br>

<strong>C-4.3:</strong> Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context.<br><br>
<strong>S2 LO C 4.3.39: Assesses the correctness of a solution by relating it to the problem scenario.</strong><br><br>
<strong>S2 LO C 4.3.40:</strong> Estimates the outcome of operations before calculating.<br><br>

<strong>Key Focus Area:</strong><br>
Ask for estimates close to actual computation (e.g., 98 + 24 ≈ ?).<br>
Use MCQs that include rounding logic.<br><br>

<strong>CG-5:</strong> Knows and appreciates the development in India of the decimal place value system that is used around the world today.<br><br>

<strong>C-5.1:</strong> Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology.<br><br>
<strong>S2 LO C 5.1.41:</strong> Recognizes the importance of the Indian number system in daily life and its global contribution.<br><br>

<strong>Key Focus Area:</strong><br>
Ask factual MCQs like: “Who contributed the idea of zero?”<br>
Include<strong> basic contextual history items with clear answer options.</strong><br><br>


  <strong>Class IV (D)</strong><br><br>






  <strong>CG-1:</strong> Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.<br><br>

<strong>C-1.1:</strong> Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.<br><br>
<strong>S2 LO D 1.1.1:</strong> Reads and writes numbers up to 10,000 using place value.</strong><br><br>
<strong>S2 LO D 1.1.2: Compares and orders numbers up to 10,000.</strong><br><br>
<strong>S2 LO D 1.1.3:</strong> Forms greatest/smallest numbers using given digits (with/without repetition).<br><br>

<strong>Key Focus Area:</strong><br>
Ask learners to read/write <strong>4-digit numbers </strong>using Indian place value chart.<br>
Include questions comparing numbers or <strong>placing them in order.</strong><br>
Include <strong>digit arrangement tasks </strong>to form greatest/smallest numbers.<br><br>

<strong>C-1.2:</strong> Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.<br><br>
<strong>S2 LO D 1.2.4: Identifies 1/2, 1/3, 1/4, 3/4 in shapes and collections.<br><br>
S2 LO D 1.2.5: Compares like fractions visually and numerically.<br><br>
S2 LO D 1.2.6: Solves problems involving sharing/partitioning objects in fractional parts.</strong><br><br>
<strong>S2 LO D 1.2.7:</strong> Compares unlike fractions visually with same-sized wholes (Olympiad Enrichment).<br><br>
<strong>S2 LO D 1.2.8:</strong> Demonstrates understanding of equivalent fractions using visuals or number lines (Olympiad Enrichment).<br><br>

<strong>Key Focus Area:</strong><br>
Use shaded<strong> shapes or collections </strong>to show fractions.<br>
Ask to compare like/unlike fractions with the same wholes.<br><br>

<strong>CG-1:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade) and applies the four basic operations on whole numbers to solve daily life problems.<br><br>

<strong>C-1.3:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade) and applies the four basic operations on whole numbers to solve daily life problems.<br><br>
<strong>S2 LO D 1.3.9:</strong> Adds and subtracts 4-digit numbers with and without regrouping.<br><br>
<strong>S2 LO D 1.3.10: Multiplies 2-digit and 3-digit numbers by 1-digit numbers using standard algorithms.<br><br>
S2 LO D 1.3.11: Divides 2-digit numbers by 1-digit numbers using equal grouping or repeated subtraction.<br><br>
S2 LO D 1.3.12: Identifies and applies the correct operation (addition, subtraction, multiplication, or division) to solve contextual problems.</strong><br><br>
<strong>S2 LO D 1.3.13:</strong> Solves multi-step problems involving a combination of operations (Olympiad Enrichment).<br><br>

<strong>Key Focus Area:</strong><br>
Include <strong>single- and multi-step word problems</strong> involving 4-digit addition, subtraction, multiplication (2/3-digit × 1-digit), and division (2-digit ÷ 1-digit).<br>
Ask learners <strong>to identify the correct operation</strong> for a scenario.<br>
Include <strong>problem-solving with missing steps or outputs.</strong><br><br>

<strong>C-1.4:</strong> Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.<br><br>
<strong>S2 LO D 1.4.14: Identifies factors of numbers less than 50 using grouping or array models.</strong><br><br>
<strong>S2 LO D 1.4.15: Lists multiples of 2, 3, 5, 10 up to 50.</strong><br><br>
<strong>S2 LO D 1.4.16:</strong> Reads and writes Roman numerals from I to XX.<br><br>
<strong>S2 LO D 1.4.17:</strong> Compares Roman and Hindu-Arabic numerals (I to XX).<br><br>
<strong>S2 LO D 1.4.18: Identifies, completes, and extends number and shape patterns.</strong><br><br>

<strong>Key Focus Area:<br>
Include pattern extension using multiples (2, 3, 5, 10).<br>
Ask for factor identification using visual arrays or grouping logic.<br>
Introduce Roman numeral recognition (I to XX).</strong><br><br>

<strong>CG-2:</strong> Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.<br><br>

<strong>C-2.1:</strong> Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.<br><br>
<strong>S2 LO D 2.1.19: Identifies and describes properties of squares, rectangles, triangles, circles.</strong><br><br>
<strong>S2 LO D 2.1.20:</strong> Identifies 3D shapes (cube, cuboid, sphere, cone, cylinder) and their features (edges, faces, vertices).<br><br>

<strong>Key Focus Area:</strong><br>
Use images of <strong>shapes and solids; ask about edges, faces, and corners.</strong><br>
Include shape property comparisons (e.g., “Which has 4 equal sides?”).<br><br>

<strong>C-2.2:</strong> Describes location and movement using both common language and mathematical vocabulary; understands the notion of map (Najri Naksha).<br><br>
<strong>S2 LO D 2.2.21: Identifies the top, front, and side views of simple 3D objects.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Use <strong>images of simple objects; ask to identify top, side, or front views.</strong><br>
Match objects with top, side, and front views using images.<br>
Ask for spatial relations using diagrams.<br><br>

<strong>C-2.3:</strong> Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.<br><br>
<strong>S2 LO D 2.3.22: Identifies symmetrical figures and lines of symmetry.</strong><br><br>
<strong>S2 LO D 2.3.23:</strong> Selects shapes that show symmetry from given visual options.<br><br>

<strong>Key Focus Area:</strong><br>
Ask to identify <strong>lines of symmetry</strong> in shapes.<br>
Include <strong>mirror image identification</strong> using pictures.<br><br>

<strong>C-2.4:</strong> Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.<br><br>
<strong>S2 LO D 2.4.24:</strong> Recognizes and extends simple patterns involving 2D shapes.<br><br>

<strong>Key Focus Area:</strong><br>
Use patterns in data (e.g., data tables showing patterns of shapes or colors) and ask learners to recognize or extend patterns.<br><br>

<strong>CG-3:</strong> Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.<br><br>

<strong>C-3.1:</strong> Measures in non-standard and standard units and evaluates the need for standard units.<br><br>
<strong>S2 LO D 3.1.25:</strong> Measures length using standard units like centimeter (cm) and meter (m) with a ruler or measuring tape.<br><br>
<strong>S2 LO D 3.1.26: Compares objects by weight and estimates weight using non-standard and standard units (g, kg).<br><br>
S2 LO D 3.1.27: Compares objects by capacity and estimates capacity using non-standard and standard units (ml, l).</strong><br><br>

<strong>Key Focus Area:</strong><br>
Include visual <strong>data representation </strong>(e.g., tables or bar graphs showing measurements).<br>
<strong>Ask learners to interpret data related to measurements like comparing weight, capacity, or length.</strong><br><br>

<strong>C-3.2:</strong> Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.<br><br>
<strong>S2 LO D 3.2.28:</strong> Selects and uses appropriate tools (ruler, clock, balance, measuring cup) and units (cm/m, g/kg, ml/l, min/hr) to measure length, time, weight, and volume in real-life contexts.<br><br>

<strong>Key Focus Area:</strong><br>
Use visual scenarios to ask which tool/unit is most appropriate.<br>
Include MCQs like: "Which tool would you use to measure the weight of a watermelon?"<br>
Ask to match measurements with correct units: "Which is best measured in ml?"<br><br>

<strong>C-3.3:</strong> Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.<br><br>
<strong>S2 LO D 3.3.29:</strong> Converts centimetres to metres and vice versa; millilitres to litres and vice versa.<br><br>

<strong>Key Focus Area:</strong><br>
Include MCQs asking conversions like "1,200 cm = ? m", or "2 L = ? ml".<br>
Use context-based problems (e.g., "Which is more: 1500 ml or 1.2 L?").<br>
<strong>C-3.4:</strong> Understands the definition and formula for the area of a square or rectangle as length times breadth.<br><br>
<strong>S2 LO D 3.4.30: Estimates and calculates perimeter and area of rectangles/squares using non-standard and square units.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Include <strong>counting-based area problems </strong>using unit squares.<br>
Include basic computation-type problems using square units.<br>
Ask to compare shapes with <strong>different perimeters and areas.</strong><br><br>

<strong>C-3.5:</strong> Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume and verifies the same using standard units.<br><br>
<strong>S2 LO D 3.5.31: Estimates time intervals in hours and minutes and verifies using clocks or calendars.</strong><br><br>
<strong>S2 LO D 3.5.32: Estimates and verifies area and perimeter for regular and irregular shapes using non-standard and standard units.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Ask learners to estimate durations (e.g., “About how long is your lunch break?”), then<strong> verify using clock/calendar visuals.</strong><br>
Include estimation-based puzzles (e.g., “Estimate which figure has a greater perimeter”), followed by<strong> actual measurement or calculation.</strong><br>
Use visuals with irregular shapes for <strong>approximate perimeter/area estimation.</strong><br><br>

<strong>C-3.6:</strong> Deduces that shapes having equal areas can have different perimeters and shapes having equal perimeters can have different areas.<br><br>
<strong>S2 LO D 3.6.33: Compares areas and perimeters of different shapes using examples.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Use visual shapes and ask for comparison (e.g., “Same area, different perimeter?”).<br>
Avoid formula-heavy tasks; focus on conceptual visuals.<br><br>

<strong>C-3.7:</strong> Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.<br><br>
<strong>S2 LO D 3.7.34: Solves daily-life problems involving measurement (e.g., calculating total length, weight, or capacity).</strong><br><br>
<strong>Key Focus Area:</strong><br>
Include<strong> practical context word problems </strong>involving length, weight, or volume.<br>
Ask learners to <strong>select the best tool or unit </strong>for each situation.<br><br>

<strong>CG-4:</strong> Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.<br><br>

<strong>C-4.1:</strong> Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).<br><br>
<strong>S2 LO D 4.1.35: Translates simple daily life situations into mathematical problems (e.g., identifying the operation needed).</strong><br><br>
<strong>S2 LO D 4.1.36:</strong> Uses concrete materials or drawings to help solve problems.<br><br>
<strong>Key Focus Area:</strong><br>
Ask learners to identify the correct operation(s) for word problems (e.g., "Which operation do you use?").<br>
Include visual puzzles like “magic total” or “missing number” problems where data or numbers are manipulated using operations.<br>
<strong>C-4.2:</strong> Learns to systematically count and list all possible permutations or combinations given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).<br><br>
<strong>S2 LO D 4.2.37:</strong> Lists all possible outcomes of a simple event (e.g., combinations of two clothes or two fruits).<br><br>
<strong>S2 LO D 4.2.38:</strong> Uses diagrams, tables, or lists to systematically find all combinations/permutations in small sets.<br><br>
<strong>S2 LO D 4.2.39:</strong> Identifies missing or repeated combinations and corrects the list accordingly.<br><br>
<strong>Key Focus Area:</strong><br>
Use real-life examples (e.g., clothes, food, teams) to list all combinations.<br>
Ask: “How many 2-member teams from 4 children?”, “How many ways to pair 2 shirts with 3 trousers?”<br>
Use visual tools like tables, lists, and tree diagrams to structure thinking.<br>
Ask learners to identify repeated/missing combinations in a list.<br><br>

<strong>C-4.3:</strong> Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context.<br><br>
<strong>S2 LO D 4.3.40:</strong> Estimates sums, differences, and measurements in real-life contexts.<br><br>
<strong>S2 LO D 4.3.41:</strong> Collects and organizes data using tally marks for a given set of items.<br><br>
<strong>S2 LO D 4.3.42:</strong> Represents data using pictographs (where one symbol represents one unit).<br><br>
<strong>S2 LO D 4.3.43: Interprets simple pictographs to answer questions.</strong><br><br>
<strong>S2 LO D 4.3.44: Solves simple comparison-based questions from pictographs.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Include questions asking for <strong>estimated sums/differences.</strong><br>
Emphasize <strong>reasonable estimation</strong> rather than exact calculation.<br>
Ask learners to identify the <strong>correct way to record data </strong>using tally marks.<br>
Include <strong>multiple-choice pictographs</strong> where one symbol = one unit; ask to count or match quantities.<br>
Include <strong>comparison questions</strong> based on pictographs.<br>
Present <strong>simple data tables</strong> and ask to interpret total, maximum, minimum.<br><br>

<strong>CG-5:</strong> Knows and appreciates the development in India of the decimal place value system that is used around the world today.<br><br>

<strong>C-5.1:</strong> Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology.<br><br>
<strong>S2 LO D 5.1.45:</strong> Recognizes the historical significance of the Indian number system and its global impact on mathematics and technology.<br><br>
<strong>Key Focus Area:</strong><br>
Include MCQs on historical facts (e.g., “Which Indian mathematician contributed the concept of zero?”).<br><br>


  <strong>Class V (E)</strong><br><br>





  <strong>CG-1:</strong> Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.<br><br>

<strong>C-1.1:</strong> Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.<br><br>
<strong>S2 LO E 1.1.1: Reads, writes, and expands numbers up to 1,00,000 using place value.</strong><br><br>
<strong>S2 LO E 1.1.2: Compares and orders large numbers.</strong><br><br>
<strong>S2 LO E 1.1.3:</strong> Estimates and rounds numbers to the nearest 10, 100, or 1000.<br><br>
<strong>S2 LO E 1.1.4:</strong> Reads, writes, and compares Roman numerals up to 100 (I to C) (Olympiad Enrichment).<br><br>
<strong>Key Focus Area:</strong><br>
Ask to<strong> read/write/expand 5-digit numbers</strong> using Indian place value.<br>
Include<strong> ordering and comparison</strong> of numbers.<br>
Ask about <strong>estimation/rounding </strong>to the nearest 10, 100, or 1000.<br>
Include <strong>Roman numerals up to 100 (I to C) with clear options.</strong><br><br>

<strong>C-1.2:</strong> Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.<br><br>
<strong>S2 LO E 1.2.5: Identifies and represents proper, improper, and mixed fractions.<br><br>
S2 LO E 1.2.6: Compares and orders like and unlike fractions.<br><br>
S2 LO E 1.2.7: Adds and subtracts like fractions and solves contextual problems.</strong><br><br>
<strong>S2 LO E 1.2.8:</strong> Converts fractions to decimals and vice versa.<br><br>
<strong>S2 LO E 1.2.9:</strong> Compares decimals using place value.<br><br>
<strong>S2 LO E 1.2.10:</strong> Reads and writes decimals up to hundredths (0.01).<br><br>
<strong>S2 LO E 1.2.11: Adds and subtracts decimals in real-world contexts (e.g., money, length).</strong><br><br>
<strong>Key Focus Area:</strong><br>
Adding/subtracting<strong> like fractions</strong><br>
<strong>Decimal place value </strong>(tenths, hundredths)<br>
<strong>Converting </strong>between fractions and decimals<br>
Real-world decimal use (e.g., money, length)<br><br>

<strong>C-1.3:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade) and applies the four basic operations on whole numbers to solve daily life problems.<br><br>
<strong>S2 LO E 1.3.12:</strong> Adds and subtracts 5-digit numbers with or without regrouping.<br><br>
<strong>S2 LO E 1.3.13: Multiplies 3-digit numbers by 2-digit numbers using appropriate algorithms.</strong><br><br>
<strong>S2 LO E 1.3.14: Divides 3-digit numbers by 1- or 2-digit numbers, interpreting quotient and remainder.</strong><br><br>
<strong>S2 LO E 1.3.15:</strong> Prepares bills and solves problems involving profit/loss, simple discount.<br><br>
<strong>Key Focus Area:</strong><br>
Include <strong>2- to 3-digit × 2-digit multiplication and division with remainders (e.g., 265 ÷ 4).<br>
Use real-life word problems</strong> involving 1–2 steps.<br>
Identify CP/SP, find profit/loss; apply basic discount percentage; create & read simple bills.<br><br>

<strong>C-1.4:</strong> Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.<br><br>
<strong>S2 LO E 1.4.16:Identifies factors and multiples of numbers up to 100 using grouping or multiplication facts.</strong><br><br>
<strong>S2 LO E 1.4.17: Distinguishes between prime and composite numbers using the number of factors (up to 100).</strong><br><br>
<strong>S2 LO E 1.4.18:</strong> Applies understanding of factors, multiples, and primes in solving reasoning-based questions (e.g., smallest common multiple, common factors, identifying prime-rich patterns) (Olympiad Enrichment).<br><br>
<strong>S2 LO E 1.4.19:</strong> Applies simple divisibility tests to identify properties of numbers (Olympiad Enrichment).<br><br>
<strong>S2 LO E 1.4.20:</strong> Finds LCM and HCF of small numbers using listing/common multiples (Olympiad Enrichment).<br><br>
<strong>S2 LO E 1.4.21:</strong> Identifies and creates patterns in numbers, shapes, and arrangements.<br><br>
<strong>Key Focus Area:<br>
Factor/multiple identification<br>
Prime/composite classification<br>
Common multiples/factors (LCM/HCF)<br>
Simple divisibility test application </strong>(Olympiad Enrichment)<br><br>

<strong>CG-2:</strong> Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.<br><br>

<strong>C-2.1:</strong> Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.<br><br>
<strong>S2 LO E 2.1.22: Classifies triangles, quadrilaterals, and other polygons by properties.</strong><br><br>
<strong>S2 LO E 2.1.23: Describes and compares 3D shapes (vertices, edges, faces).</strong><br><br>
<strong>Key Focus Area:</strong><br>
Triangles (e.g., right-angled, equilateral)<br>
Quadrilaterals<br>
3D solids by edges, vertices, and faces<br><br>

<strong>C-2.2:</strong> Describes location and movement using both common language and mathematical vocabulary; understands the notion of map (Najri Naksha).<br><br>
<strong>S2 LO E 2.2.24: Describes the relative positions of objects using coordinates in simple grids.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Use simple coordinate grids.<br>
Ask learners to identify or plot locations (e.g., “What is at (3,2)?”).<br><br>

<strong>C-2.3:</strong> Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.<br><br>
<strong>S2 LO E 2.3.25: Identifies and classifies right, acute, and obtuse angles.</strong><br><br>
<strong>S2 LO E 2.3.26:</strong> Estimates or reads angle measurements to the nearest 5° using a semi-circular protractor image or marked diagram.<br><br>
<strong>Key Focus Area:</strong><br>
Classify angles: right, acute, obtuse<br>
Identify and draw lines of symmetry from visuals<br>
<strong>Include a semi-circular protractor image and ask to measure or estimate angle</strong><br><br>

<strong>C-2.4:</strong> Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.<br><br>
<strong>S2 LO E 2.4.27: Analyzes and creates complex geometric patterns, including tessellations.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Ask about <strong>repeating/tessellating geometric patterns</strong><br>
Include visuals and ask: “Which shape comes next?”<br><br>

<strong>CG-3:</strong> Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.<br><br>

<strong>C-3.1:</strong> Measures in non-standard and standard units and evaluates the need for standard units<br><br>
<strong>S2 LO E 3.1.28:</strong> Understands and explains the need for standard units; measures and estimates attributes using appropriate standard units in daily contexts.<br><br>
<strong>Key Focus Area:</strong><br>
Choosing appropriate standard units for real-life attributes<br>
Estimating and measuring using standard units (cm, g, ml, etc.)<br><br>

<strong>C-3.2:</strong> Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured<br><br>
<strong>S2 LO E 3.2.29:</strong> Identifies and uses appropriate tools and units for measuring length, weight, capacity, and time in daily-life situations.<br><br>
<strong>Key Focus Area:</strong><br>
Match tools with attributes (e.g., “Which tool to measure milk?” → Measuring cup)<br>
Match unit with quantity (e.g., “Which unit to measure a classroom's length?” → metres)<br><br>

<strong>C-3.3:</strong> Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement<br><br>
<strong>S2 LO E 3.3.30: Performs simple unit conversions (e.g., cm to m, ml to l) and applies them in direct computation or word problems.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Convert cm ↔ m, g ↔ kg, ml ↔ l using simple 10s/100s<br>
Solving word problems involving direct unit conversions<br><br>

<strong>C-3.4:</strong> Understands the definition and formula for the area of a square or rectangle as length times breadth<br><br>
<strong>S2 LO E 3.4.31: Calculates area and perimeter of rectangles and composite figures using standard formulae.</strong><br><br>
<strong>S2 LO E 3.4.32: Estimates and calculates volume using unit cubes in varied orientations and arrangements.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Use standard formulae for <strong>area/perimeter</strong> of rectangles/composite figures.<br>
Ask to calculate<strong> volume using unit cubes.</strong><br><br>

<strong>C-3.5:</strong> Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume and verifies the same using standard units<br><br>
<strong>S2 LO E 3.5.33:</strong> Solves real-life problems combining <strong>area, perimeter, or volume</strong> (Olympiad Enrichment).<br><br>
<strong>Key Focus Area:</strong><br>
Ask real-life problems combining area/perimeter or volume.<br>
Include <strong>visual estimation</strong> tasks and comparisons.<br><br>

<strong>C-3.6:</strong> Deduces that shapes having equal areas can have different perimeters and shapes having equal perimeters can have different areas<br><br>
<strong>S2 LO E 3.6.34: Explores the relationship between area and perimeter in different shapes through examples and comparisons.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Use visuals showing two shapes with the same area/different perimeter or vice versa.<br>
Ask learners to compare or interpret based on properties.<br><br>

<strong>C-3.7:</strong> Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them<br><br>
<strong>S2 LO E 3.7.35: Solves daily-life problems involving conversion and comparison of lengths, weights, and capacities.</strong><br><br>
<strong>Key Focus Area:</strong><br>
Include contextual problems using <strong>conversion and comparison </strong>of lengths, weights, and capacities.<br><br>

<strong>CG-4:</strong> Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking<br><br>

<strong>C-4.1:</strong> Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares)<br><br>
<strong>S2 LO E 4.1.36:</strong> Solves contextual word problems involving 1–2 arithmetic operations<br><br>
<strong>S2 LO E 4.1.37:</strong> Solves magic square or missing-value puzzles with arithmetic reasoning.<br><br>
<strong>S2 LO E 4.1.38:</strong> Solves multi-step puzzles based on number properties<br><br>
<strong>S2 LO E 4.1.39:</strong> Interprets and compares information from two or more data forms (e.g., pictograph and table) to solve reasoning-based problems (Olympiad Enrichment).<br><br>
<strong>Key Focus Area:</strong><br>
Include<strong> logic puzzles, missing-value questions, puzzle grids or magic</strong> squares using visual or numeric logic.<br>
Use money, sharing, combining, and step-based problem solving.<br>
Incorporate divisibility, reasoning, and multi-step number logic.<br><br>

<strong>C-4.2:</strong> Learns to systematically count and list all possible permutations or combination given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people)<br><br>
<strong>S2 LO E 4.2.40: Lists all possible combinations or arrangements in constrained situations (e.g., choosing outfits, seating pairs, simple committee formation).</strong><br><br>
<strong>Key Focus Area:</strong><br>
Listing all possible combinations or arrangements in simple constrained contexts (e.g., outfits, seating).<br>
Systematic counting using listing or tree diagrams to avoid repetition or omission.<br><br>

<strong>C-4.3:</strong> Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context<br><br>
<strong>S2 LO E 4.3.41:</strong> Estimates and rounds numbers in context of operations or measurement.<br><br>
<strong>S2 LO E 4.3.42:</strong> Collects and organizes data in tables, tally charts, and bar graphs<br><br>
<strong>S2 LO E 4.3.43:</strong> Constructs bar graphs with appropriate labels and scales<br><br>
<strong>S2 LO E 4.3.44: Interprets bar graphs and compares categories</strong><br><br>
<strong>Key Focus Area:</strong><br>
Data classification; table-to-bar-graph transformation.<br>
Drawing bar graphs with appropriate intervals/labels.<br>
Simple interpretation, comparison, data-based inference.<br><br>
<strong>CG-5:</strong> Knows and appreciates the development in India of the decimal place value system that is used around the world today<br><br>

<strong>C-5.1:</strong> Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology<br><br>

<strong>S2 LO E 5.1.45:</strong> Recognises key contributions of Indian mathematicians (e.g., zero, decimal system) and their influence on global mathematics (Olympiad Enrichment).<br><br>

<strong>Key Focus Area:</strong><br>
Zero<br>
Place value system<br>
Indian mathematicians (e.g., Aryabhata, Brahmagupta)<br><br>





  <strong>Class VI (F)</strong><br><br>







<strong>CG-1:</strong> Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers<br><br>

<strong>C-1.1:</strong> Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers<br><br>
<strong>S2 LO F 1.1.1: Reads, writes, and compares large numbers (up to 20 digits) using Indian and International place value systems, and expresses them in scientific notation using powers of 10.</strong><br><br>
<strong>C-1.2: Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns</strong><br><br>
<strong>S2 LO F 1.1.2:</strong> Estimates the sum, difference, or product of large numbers using appropriate rounding methods.<br><br>
<strong>S2 LO F 1.1.3:</strong> Represents large numbers using powers of 10 and evaluates simple expressions with exponents<br><br>

<strong>C-1.2:</strong> Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns<br><br>
<strong>S2 LO F 1.2.4: Identifies number patterns in multiplication tables and sequences</strong><br><br><br>
<strong>S2 LO F 1.2.5:</strong> Identifies and applies rules to extend number patterns in sequences.<br><br>

<strong>C-1.3:</strong> Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta<br><br><br>
<strong>S2 LO F 1.3.6:</strong> Identifies position and order of integers on a number line in real-life or mathematical contexts.<br><br><br>
<strong>S2 LO F 1.3.7: Performs basic operations on integers using number line and rules</strong><br><br>

<strong>C-1.4:</strong> Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line<br><br>
<strong>S2 LO F 1.4.8: Classifies a given number as a whole number, fraction, or integer based on its form.</strong><br><br>
<strong>S2 LO F 1.4.9:</strong> Classifies numbers as natural, whole, integers, and rational numbers using their properties and visualises them on a number line.<br><br>

<strong>C-1.5:</strong> Explores the idea of percentage and applies it to solve problems<br><br>
<strong>S2 LO F 1.5.10:</strong> Converts between fractions, decimals, and percentages using standard equivalences.<br><br>
<strong>S2 LO F 1.5.11: Solves daily-life problems using percentages</strong><br><br>

<strong>C-1.6:</strong> Explores and applies fractions (both as ratios and in decimal form) in daily-life situations<br><br>
<strong>S2 LO F 1.6.12: Adds, subtracts, and compares fractions (like and unlike) in contextual situations, including visual representations.</strong><br><br>
<strong>S2 LO F 1.6.13:</strong> Represents decimals on number lines and adds/subtracts them<br><br>

<strong>CG-2:</strong> Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency<br><br>

<strong>C-2.1:</strong> Understands equality between numerical expressions and learns to check arithmetical equations<br>
<strong>S2 LO F 2.1.14:</strong> Verifies equality in equations using basic operations<br><br>

<strong>C-2.2:</strong> Extends the representation of a number in the form of a variable or an algebraic expression using a variable<br><br>
<strong>S2 LO F 2.2.15: Represents unknown quantities in real-life problems using a single variable.</strong><br><br>

<strong>C-2.3:</strong> Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations<br><br>
<strong>S2 LO F 2.3.16:</strong> Identifies parts of an algebraic expression (variable, coefficient, constant) in given forms.<br><br>

<strong>C-2.4:</strong> Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems<br><br>
<strong>S2 LO F 2.4.17: Solves one-variable linear equations formed from simple word problems.</strong><br><br>

<strong>C-2.5:</strong> Develops own methods to solve puzzles and problems using algebraic thinking<br><br>
<strong>S2 LO F 2.5.18:</strong> Uses letter variables to design and solve arithmetic puzzles<br><br>

<strong>CG-3:</strong> Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D)<br><br>

<strong>C-3.1:</strong> Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes<br><br>
<strong>S2 LO F 3.1.19: Identifies types of angles, triangles, and quadrilaterals by their properties</strong><br><br>

<strong>C-3.2:</strong> Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems<br><br>
<strong>S2 LO F 3.2.20: Measures and draws angles with a protractor and identifies parallel/perpendicular lines</strong><br><br>

<strong>C-3.3:</strong> Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems<br><br>
<strong>S2 LO F 3.3.21:</strong> Identifies properties of 3D shapes (faces, edges, vertices) for cube, cuboid, cone, and cylinder using 2D and 3D representations.<br><br>
<strong>S2 LO F 3.3.22: Draws nets of simple 3D shapes and matches them with solids.</strong><br><br>

<strong>C-3.4:</strong> Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge.<br><br>
<strong>S2 LO F 3.4.23:</strong> Identifies valid triangle constructions based on side and angle conditions.<br><br>

<strong>C-3.5:</strong> Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles.<br><br>
<strong>S2 LO F 3.5.24:</strong> Identifies congruent and similar shapes based on side lengths, angles, and visual scaling in given diagrams.<br><br>

<strong>CG-4:</strong> Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.<br><br>

<strong>C-4.1:</strong> Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium and develops strategies to find the areas of composite 2D shapes.<br><br>
<strong>S2 LO F 4.1.25: Applies standard formulae to calculate perimeter and area of rectangles, triangles, and simple composite shapes.</strong><br><br>
<strong>S2 LO F 4.1.26:</strong> Solves problems involving perimeter and area of composite 2D shapes by decomposing them into basic shapes.<br><br>

<strong>C-4.2:</strong> Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.<br><br>
<strong>S2 LO F 4.2.27:</strong> Identifies and verifies visual proofs of the Pythagoras Theorem using square areas on the sides of a right triangle.<br><br>

<strong>C-4.3:</strong> Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world.<br><br>
<strong>S2 LO F 4.3.28:</strong> Designs simple tiling patterns using symmetry and transformation.<br><br>

<strong>C-4.4:</strong> Develops familiarity with the notion of fractal and identifies and appreciates the appearances of fractals in nature and art in India and around the world.<br><br>
<strong>S2 LO F 4.4.29:</strong> Recognises fractals in leaves, shells, and tribal art (like Warli, Mandala).<br><br>

<strong>CG-5:</strong> Collects, organises, represents (graphically and in tables), and interprets data/ information from daily-life experiences.<br><br>

<strong>C-5.1:</strong> Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median.<br><br>
<strong>S2 LO F 5.1.30: Identifies correct tabulated form for given raw data and selects suitable data collection methods for specific contexts.</strong><br><br>
<strong>S2 LO F 5.1.31: Calculates mean using simple datasets.</strong><br><br>

<strong>C-5.2:</strong> Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.<br><br>
<strong>S2 LO F 5.2.32: Interprets and compares data using bar graphs, pictographs, and pie charts.</strong><br><br>
<strong>S2 LO F 5.2.33:</strong> Selects suitable graphical representations based on the type of data and context.<br><br>

<strong>CG-6:</strong> Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.<br><br>

<strong>C-6.1:</strong> Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.<br><br>
<strong>S2 LO F 6.1.34:Identifies valid arithmetic or geometric conclusions based on given conditions or patterns.</strong><br><br>
<strong>S2 LO F 6.1.35:</strong> Identifies logical sequences in arithmetic or geometric patterns and selects the correct reasoning step among given options.<br><br>

<strong>CG-7:</strong> Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.<br><br>

<strong>C-7.1:</strong> Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.<br><br>
<strong>S2 LO F 7.1.36: Solves pattern puzzles, number tricks, and visual riddles.</strong><br><br>

<strong>C-7.2:</strong> Engages in and appreciates the artistry and aesthetics of puzzle-making and puzzle-solving.<br>
<strong>S2 LO F 7.2.37:</strong> Selects appropriate number or geometric patterns to complete or extend a given puzzle or riddle.<br><br>

<strong>CG-8:</strong> Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.<br><br>

<strong>C-8.1:</strong> Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into series of ordered steps (i.e., algorithmic thinking).<br><br>
<strong>S2 LO F 8.1.38: Identifies the correct step or sequence to solve a structured multi-step problem (e.g., using factor tree or symmetrical construction).</strong><br><br>

<strong>C-8.2:</strong> Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.<br><br>
<strong>S2 LO F 8.2.39:</strong> Identifies correct flowchart steps for basic arithmetic or algorithmic processes.<br><br>
<strong>S2 LO F 8.2.40:</strong> Identifies the rule governing iterative or recursive patterns and selects the next or missing term in the sequence.<br><br>

<strong>CG-9:</strong> Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.<br><br>

<strong>C-9.1:</strong> Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations.<br><br>
<strong>S2 LO F 9.1.41:</strong> Describes origin of numbers, fractions, and zero from different cultures.<br><br>

<strong>C-9.2:</strong> Knows and appreciates the contributions of specific Indian mathematicians, such as, Baudhayana, Pingala, Aryabhata, Brahmagupta, Virahanka, Bhaskara, and Ramanujan.<br><br>
<strong>S2 LO F 9.2.42:</strong> Identifies key contributions of Indian mathematicians like Aryabhata, Brahmagupta, Bhaskara, and Ramanujan.<br><br>

<strong>CG-10:</strong> Knows about and appreciates the interaction of Mathematics with each of their other school subjects.<br><br>

<strong>C-10.1:</strong> Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.<br><br>
<strong>S2 LO F 10.1.43:</strong> Applies maths in contexts from science, art, music, geography, and sports.<br><br>







  <strong>Class VII (G)</strong><br><br>





<strong>CG-1:</strong> Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers<br><br>

<strong>C-1.1:</strong> Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers<br><br>
<strong>S2 LO G 1.1.1: Reads and writes very large numbers up to 20 digits using Indian and International systems</strong><br><br>
<strong>S2 LO G 1.1.2: Expresses large numbers using exponential notation (powers of 10)</strong><br><br>
<strong>S2 LO G 1.1.3:</strong> Compares and orders large numbers in real-life contexts (e.g., population, distance)<br>
<strong>S2 LO G 1.1.4:</strong> Uses estimation for computation with large numbers<br><br>

<strong>C-1.2:</strong> Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns<br><br>
<strong>S2 LO G 1.2.5: Identifies and extends numeric patterns involving powers and multiples</strong><br><br>
<strong>S2 LO G 1.2.6: Explores recursive patterns (e.g., Virahanka–Fibonacci), and explains rules behind them</strong><br><br>
<strong>S2 LO G 1.2.7:</strong> Identifies and justifies structures of given novel number patterns<br><br>

<strong>C-1.3:</strong> Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta<br><br>
<strong>S2 LO G 1.3.8: Explains and performs addition and subtraction of integers using rules and number line</strong><br><br>
<strong>S2 LO G 1.3.9:</strong> Explains operations involving zero and negatives using visual models or rules<br><br>

<strong>C-1.4:</strong> Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line<br><br>
<strong>S2 LO G 1.4.10: Identifies rational numbers and locates them on the number line</strong><br><br>
<strong>S2 LO G 1.4.11: Distinguishes between integers, fractions, and rational numbers</strong><br><br>
<strong>S2 LO G 1.4.12:</strong> Explores closure, commutativity, associativity, and identity properties of number sets<br><br>

<strong>C-1.5:</strong> Explores the idea of percentage and applies it to solve problems<br><br>
<strong>S2 LO G 1.5.13: Solves real-life problems involving profit/loss, discount, tax using percentages</strong><br><br>
<strong>S2 LO G 1.5.14:</strong> Converts between percentages, fractions, and decimals fluently<br><br>

<strong>C-1.6:</strong> Explores and applies fractions (both as ratios and in decimal form) in daily-life situations<br><br>
<strong>S2 LO G 1.6.15: Multiplies and divides fractions in real-life contexts (e.g., recipes, areas)</strong><br><br>
<strong>S2 LO G 1.6.16:</strong> Applies operations on decimals in measurements and money<br><br>
<strong>S2 LO G 1.6.17:</strong> Justifies use of ratios/fractions in comparison scenarios<br><br>

<strong>CG-2:</strong> Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency<br><br>

<strong>C-2.1:</strong> Understands equality between numerical expressions and learns to check arithmetical equations<br>
<strong>S2 LO G 2.1.18: Checks equivalence of expressions using substitution and simplification</strong><br><br>
<strong>S2 LO G 2.1.19:</strong> Uses balancing method to verify one-step equations<br><br>

<strong>C-2.2:</strong> Extends the representation of a number in the form of a variable or an algebraic expression using a variable<br><br>
<strong>S2 LO G 2.2.20: Translates real-life situations into algebraic expressions</strong><br><br>
<strong>S2 LO G 2.2.21:</strong> Uses variables to generalise arithmetic patterns<br><br>

<strong>C-2.3:</strong> Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations<br><br>
<strong>S2 LO G 2.3.22: Adds and subtracts like terms in expressions</strong><br><br>
<strong>S2 LO G 2.3.23:</strong> Identifies parts of an expression (term, coefficient, variable, constant)<br><br>
<strong>C-2.4:</strong> Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems<br><br>
<strong>S2 LO G 2.4.24: Solves simple one-variable equations from daily contexts (e.g., age, price)</strong><br><br>
<strong>S2 LO G 2.4.25:</strong> Frames one-variable linear equations from verbal descriptions of real-life situations or puzzles<br><br>

<strong>C-2.5:</strong> Develops own methods to solve puzzles and problems using algebraic thinking<br><br>
<strong>S2 LO G 2.5.26: Solves logic-based algebraic puzzles and identifies correct solution strategies</strong><br><br>

<strong>CG-3:</strong> Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D)<br><br>

<strong>C-3.1:</strong> Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes<br><br>
<strong>S2 LO G 3.1.27: Classifies and describes 2D and 3D shapes using properties (sides, angles, faces)</strong><br><br>

<strong>C-3.2:</strong> Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems<br><br>
<strong>S2 LO G 3.2.28: Explores angle properties in triangles and quadrilaterals</strong><br><br>

<strong>C-3.3:</strong> Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems<br><br>
<strong>S2 LO G 3.3.29: Identifies and matches nets with corresponding 3D shapes (e.g., cube, cuboid, cylinder)</strong><br><br>

<strong>C-3.4:</strong> Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge<br><br>
<strong>S2 LO G 3.4.30:</strong> Identifies the correct sequence of steps to construct lines/angles/triangles using compass and ruler<br><br>

<strong>C-3.5:</strong> Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles<br><br>
<strong>S2 LO G 3.5.31: Identifies and compares similar and congruent shapes using visual reasoning and properties (e.g., side lengths, angles, orientation)</strong><br><br>

<strong>CG-4:</strong> Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems<br><br>

<strong>C-4.1:</strong> Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium and develops strategies to find the areas of composite 2D shapes<br><br>
<strong>S2 LO G 4.1.32: Applies formulae for area of parallelograms, triangles, trapeziums in real contexts</strong><br><br>

<strong>C-4.2:</strong> Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras<br><br>
<strong>S2 LO G 4.2.33: Applies Pythagoras theorem to solve problems involving right-angled triangles, including using geometric representations</strong><br><br>

<strong>C-4.3:</strong> Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world<br><br>
<strong>S2 LO G 4.3.34: Identifies the transformation used (reflection, rotation, translation) in a tiling pattern</strong><br><br>

<strong>C-4.4:</strong> Develops familiarity with the notion of fractal and identifies and appreciates the appearances of fractals in nature and art in India and around the world<br><br>
<strong>S2 LO G 4.4.35:</strong> Identifies and appreciates basic fractal patterns in nature or cultural art through visual examples<br><br>

<strong>CG-5:</strong> Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences<br><br>

<strong>C-5.1:</strong> Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median<br><br>
<strong>S2 LO G 5.1.36: Calculates mean, median, and mode using real-life datasets</strong><br><br>

<strong>C-5.2:</strong> Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations<br><br>
<strong>S2 LO G 5.2.37: Interprets bar/pie/line graphs to answer reasoning-based questions</strong><br><br>

<strong>CG-6:</strong> Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely<br><br>

<strong>C-6.1:</strong> Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry<br><br>
<strong>S2 LO G 6.1.38: Identifies and generalises patterns in arithmetic or geometric sequences using reasoning</strong><br>
<strong>S2 LO G 6.1.39:</strong> Selects valid logical steps to justify a given mathematical solution<br><br>
<strong>CG-7:</strong> Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them<br><br>

<strong>C-7.1:</strong> Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions<br><br>
<strong>S2 LO G 7.1.40: Solves puzzles involving number tricks, spatial reasoning, and logic</strong><br><br>

<strong>C-7.2:</strong> Engages in and appreciates the artistry and aesthetics of puzzle-making and puzzle-solving<br><br>
<strong>S2 LO G 7.2.41:</strong> Recognises more than one valid strategy for solving a mathematical puzzle from given options<br><br>

<strong>CG-8:</strong> Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective<br><br>

<strong>C-8.1:</strong> Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into series of ordered steps (i.e., algorithmic thinking)<br><br>
<strong>S2 LO G 8.1.42:</strong> Identifies correct stepwise breakdown of a given multistep problem<br><br>

<strong>C-8.2:</strong> Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms<br><br>
<strong>S2 LO G 8.2.43: Interprets flowcharts, tables, or visual data representations to identify correct algorithmic steps</strong><br><br>
<strong>S2 LO G 8.2.44:</strong> Identifies iterative patterns and selects valid generalisations<br><br>

<strong>CG-9:</strong> Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world<br><br>

<strong>C-9.1:</strong> Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations<br><br>
<strong>S2 LO G 9.1.45:</strong> Identifies key developments in the evolution of numbers, zero, algebra, or geometry across different ancient cultures<br><br>

<strong>C-9.2:</strong> Knows and appreciates the contributions of specific Indian mathematicians, such as, Baudhayana, Pingala, Aryabhata, Brahmagupta, Virahanka, Bhaskara, and Ramanujan<br><br>
<strong>S2 LO G 9.2.46:</strong> Shares contributions of Aryabhata, Brahmagupta, Bhaskara, and others in context of their work<br><br>

<strong>CG-10:</strong> Knows about and appreciates the interaction of Mathematics with each of their other school subjects<br><br>

<strong>C-10.1:</strong> Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports<br><br>
<strong>S2 LO G 10.1.47:</strong> Identifies mathematical concepts used in other subjects, such as symmetry in art, speed in science, or scale in geography<br><br>





  <strong>Class VIII (H)</strong><br><br>






  <strong>CG-1:</strong> Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers<br><br>

<strong>C-1.1:</strong> Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers<br><br>
<strong>S2 LO H 1.1.1: Reads, writes, and compares numbers up to 20 digits</strong><br><br>
<strong>S2 LO H 1.1.2: Represents very large or very small numbers using scientific notation and powers of 10</strong><br>
<strong>S2 LO H 1.1.3:</strong> Applies metric prefixes (kilo, mega, giga) in contextual comparisons<br><br>

<strong>C-1.2:</strong> Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns<br><br>
<strong>S2 LO H 1.2.4: Recognises and extends numeric patterns with primes, squares, cubes</strong><br><br>
<strong>S2 LO H 1.2.5:</strong> Explains rules behind recursive and arithmetic sequences<br><br>
<strong>S2 LO H 1.2.6:</strong> Creates sequences from real-life or symbolic contexts<br><br>

<strong>C-1.3:</strong> Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta<br><br>
<strong>S2 LO H 1.3.7: Applies rules for integer operations across contexts</strong><br><br>
<strong>S2 LO H 1.3.8:</strong> Connects historical development of zero and negatives to Brahmagupta’s work<br><br>

<strong>C-1.4:</strong> Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line<br><br>
<strong>S2 LO H 1.4.9: Identifies, represents and differentiates between rational and irrational numbers</strong><br>
<strong>S2 LO H 1.4.10: Locates rational and irrational numbers on the number line</strong><br><br>
<strong>S2 LO H 1.4.11:</strong> Explores basic number set properties (closure, commutativity)<br><br>

<strong>C-1.5:</strong> Explores the idea of percentage and applies it to solve problems<br><br>
<strong>S2 LO H 1.5.12: Solves real-life problems involving profit, loss, tax, and simple interest using percentages</strong><br><br>
<strong>S2 LO H 1.5.13:</strong> Converts between percentages, decimals, and fractions fluently<br><br>

<strong>C-1.6:</strong> Explores and applies fractions (both as ratios and in decimal form) in daily-life situations<br><br>
<strong>S2 LO H 1.6.14: Uses fractions and decimals to solve ratio and proportion problems</strong><br><br>
<strong>S2 LO H 1.6.15:</strong> Solves real-life problems involving discounts, scale factors, and mixtures<br><br>

<strong>CG-2:</strong> Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency<br><br>

<strong>C-2.1:</strong> Understands equality between numerical expressions and learns to check arithmetical equations<br><br>
<strong>S2 LO H 2.1.16: Checks and simplifies complex numerical expressions using BODMAS and properties</strong><br><br>
<strong>S2 LO H 2.1.17:</strong> Identifies and corrects errors in calculations<br><br>

<strong>C-2.2:</strong> Extends the representation of a number in the form of a variable or an algebraic expression using a variable<br><br>
<strong>S2 LO H 2.2.18: Forms algebraic expressions from contextual problems</strong><br><br>

<strong>C-2.3:</strong> Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations<br><br>
<strong>S2 LO H 2.3.19: Performs addition, subtraction, and multiplication of algebraic expressions</strong><br><br>
<strong>S2 LO H 2.3.20: Applies identities like (a + b)², a² – b²</strong><br><br>

<strong>C-2.4:</strong> Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems<br><br>
<strong>S2 LO H 2.4.21: Solves one-variable equations involving brackets, variables on both sides</strong><br><br>
<strong>S2 LO H 2.4.22:</strong> Frames and solves linear equations from word problems<br><br>
<strong>C-2.5:</strong> Develops own methods to solve puzzles and problems using algebraic thinking<br><br>
<strong>S2 LO H 2.5.23: Designs number puzzles and riddles with variable-based solutions</strong><br><br>
<strong>S2 LO H 2.5.24:</strong> Uses algebra to explain or generalise patterns<br><br>

<strong>CG-3:</strong> Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D)<br><br>

<strong>C-3.1:</strong> Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes<br><br>
<strong>S2 LO H 3.1.25: Classifies polygons, especially quadrilaterals, by properties</strong><br><br>

<strong>C-3.2:</strong> Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems<br><br>
<strong>S2 LO H 3.2.26:</strong> Applies interior angle sum theorem to polygons<br><br>

<strong>C-3.3:</strong> Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems<br><br>
<strong>S2 LO H 3.3.27: Matches nets with 3D shapes (cube, cuboid, cylinder)</strong><br><br>

<strong>C-3.4:</strong> Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge<br><br>
<strong>S2 LO H 3.4.28:</strong> Constructs accurate figures using compass and straightedge<br><br>

<strong>C-3.5:</strong> Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles<br><br>
<strong>S2 LO H 3.5.29: Recognises pairs of shapes that are similar or congruent based on visual comparison</strong><br><br>

<strong>CG-4:</strong> Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems<br><br>

<strong>C-4.1:</strong> Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium and develops strategies to find the areas of composite 2D shapes<br><br>
<strong>S2 LO H 4.1.30: Calculates areas and perimeters of parallelograms, trapeziums, and compound figures</strong><br><br>

<strong>C-4.2:</strong> Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras<br><br>
<strong>S2 LO H 4.2.31: Applies geometric reasoning (e.g., area of squares) to explain the Pythagoras theorem using diagrams or options</strong><br><br>

<strong>C-4.3:</strong> Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world<br><br>
<strong>S2 LO H 4.3.32:</strong> Identifies tiling patterns and their use in architecture or design from visuals<br><br>

<strong>C-4.4:</strong> Develops familiarity with the notion of fractal and identifies and appreciates the appearances of fractals in nature and art in India and around the world<br><br>
<strong>S2 LO H 4.4.33:</strong> Recognises fractal patterns in natural and geometric figures and identifies features of recursive structures<br><br>

<strong>CG-5:</strong> Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences<br><br>

<strong>C-5.1:</strong> Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median<br><br>
<strong>S2 LO H 5.1.34: Calculates mean, median, and mode from grouped and ungrouped data</strong><br><br>

<strong>C-5.2:</strong> Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations<br><br>
<strong>S2 LO H 5.2.35: Constructs and interprets pie charts, line graphs, bar graphs and histograms for contextual data</strong><br><br>

<strong>CG-6:</strong> Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely<br><br>

<strong>C-6.1:</strong> Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry<br><br>
<strong>S2 LO H 6.1.36: Uses deductive reasoning to verify patterns and theorems</strong><br><br>
<strong>S2 LO H 6.1.37:</strong> Identifies valid steps in a logical argument to support a given mathematical conclusion<br><br>

<strong>CG-7:</strong> Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them<br><br>

<strong>C-7.1:</strong> Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions<br><br>
<strong>S2 LO H 7.1.38: Solves puzzles using logic, patterns, and number properties</strong><br><br>
<strong>C-7.2:</strong> Engages in and appreciates the artistry and aesthetics of puzzle-making and puzzle-solving<br>
<strong>S2 LO H 7.2.39:</strong> Creates and explains new puzzles with alternate solutions<br><br>

<strong>CG-8:</strong> Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective<br><br>

<strong>C-8.1:</strong> Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into series of ordered steps (i.e., algorithmic thinking)<br><br>
<strong>S2 LO H 8.1.40:</strong> Breaks down a complex problem into smaller sub-problems<br><br>

<strong>C-8.2:</strong> Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms<br><br>
<strong>S2 LO H 8.2.41:</strong> Represents algorithms using pseudocode or flowcharts<br><br>
<strong>S2 LO H 8.2.42:</strong> Identifies patterns and makes generalisations in problem solving<br><br>

<strong>CG-9:</strong> Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world<br><br>

<strong>C-9.1:</strong> Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations<br><br>
<strong>S2 LO H 9.1.43:</strong> Explores evolution of number systems, irrationality, and algebra historically<br><br>

<strong>C-9.2:</strong> Knows and appreciates the contributions of specific Indian mathematicians, such as, Baudhayana, Pingala, Aryabhata, Brahmagupta, Virahanka, Bhaskara, and Ramanujan<br><br>
<strong>S2 LO H 9.2.44:</strong> Identifies contributions of key Indian mathematicians (e.g., Madhava, Ramanujan)<br><br>

<strong>CG-10:</strong> Knows about and appreciates the interaction of Mathematics with each of their other school subjects<br><br>

<strong>C-10.1:</strong> Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports<br><br>
<strong>S2 LO H 10.1.45:</strong> Identifies how mathematics applies to science, geography, arts, or sports contexts (e.g., maps, symmetry, scores)<br><br>
`,
 3: `
 <strong>CG-1: Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.</strong><br><br>

<strong>C-1.1:</strong> Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.<br><br>
<strong>S2 LO C 1.1.1:</strong> Reads and writes numbers up to 1000.<br><br>
<strong>S2 LO C 1.1.2:</strong> Understands the concept of place value for 3-digit numbers.<br><br>
<strong>S2 LO C 1.1.3:</strong> Identifies and creates the greatest and smallest numbers using given digits (with/without repetition).<br><br>

<strong>C-1.2:</strong> Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.<br><br>
<strong>S2 LO C 1.2.4:</strong> Identifies and names unit fractions (e.g., 1/2, 1/4, 1/3).<br><br>
<strong>S2 LO C 1.2.5:</strong> Compares unit fractions using visuals or real-life contexts.<br><br>

<strong>C-1.3:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade) and applies the four basic operations on whole numbers to solve daily life problems.<br><br>
<strong>S2 LO C 1.3.6:</strong> Adds and subtracts 2-digit and 3-digit numbers with and without regrouping.<br><br>
<strong>S2 LO C 1.3.7:</strong> Makes reasonable estimates of sums and differences.<br><br>
<strong>S2 LO C 1.3.8:</strong> Understands multiplication as repeated addition and finds products.<br><br>
<strong>S2 LO C 1.3.9:</strong> Understands division as repeated subtraction or equal sharing and finds quotients and remainders for simple division facts.<br><br>
<strong>S2 LO C 1.3.10:</strong> Solves simple word problems involving addition, subtraction, multiplication, and division within 1000.<br><br>
<strong>S2 LO C 1.3.11:</strong> Solves 2-step word problems using different operations sequentially.<br><br>

<strong>C-1.4:</strong> Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.<br><br>
<strong>S2 LO C 1.4.12:</strong> Classifies numbers as odd or even using real-life contexts.<br><br>
<strong>S2 LO C 1.4.13:</strong> Recognizes and generates number patterns through skip counting by 2s, 5s, and 10s.<br><br>

<strong>CG-2: Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.</strong><br><br>

<strong>C-2.1:</strong> Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.<br><br>
<strong>S2 LO C 2.1.14:</strong> Identifies and names common 2D shapes (e.g., triangle, square, rectangle, circle).<br><br>
<strong>S2 LO C 2.1.15:</strong> Describes 2D shapes based on number of sides and vertices.<br><br>
<strong>S2 LO C 2.1.16:</strong> Identifies and names basic 3D shapes (e.g., cube, cuboid, sphere, cylinder, cone) in surroundings.<br><br>

<strong>C-2.2:</strong> Describes location and movement using both common language and mathematical vocabulary; understands the notion of map (Najri Naksha).<br><br>
<strong>S2 LO C 2.2.17:</strong> Describes relative positions of objects using spatial vocabulary (e.g., top, bottom, on, under, inside, outside, above, below, near, far).<br><br>

<strong>C-2.3:</strong> Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.<br><br>
<strong>S2 LO C 2.3.18:</strong> Identifies simple lines of symmetry in regular shapes using folding or drawing.<br><br>
<strong>S2 LO C 2.3.19:</strong> Identifies the mirror reflection using objects or paper-folding (Olympiad Enrichment).<br><br>

<strong>C-2.4:</strong> Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.<br><br>
<strong>S2 LO C 2.4.20:</strong> Recognizes and extends simple patterns involving 2D shapes.<br><br>

<strong>CG-3: Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.</strong><br><br>

<strong>C-3.1:</strong> Measures in non-standard and standard units and evaluates the need for standard units.<br><br>
<strong>S2 LO C 3.1.21:</strong> Measures length using standard units like centimeter (cm) and meter (m) with a ruler or measuring tape.<br><br>
<strong>S2 LO C 3.1.22:</strong> Compares objects by weight and estimates weight using non-standard and standard units (g, kg).<br><br>
<strong>S2 LO C 3.1.23:</strong> Compares objects by capacity and estimates capacity using non-standard and standard units (ml, l).<br><br>

<strong>C-3.2:</strong> Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.<br><br>
<strong>S2 LO C 3.2.24:</strong> Tells time to the nearest minute using analogue and digital clocks.<br><br>

<strong>C-3.3:</strong> Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.<br><br>
<strong>S2 LO C 3.3.25:</strong> Converts larger units to smaller units for length and capacity, e.g., m to cm, l to ml, within simple contexts.<br><br>

<strong>C-3.4:</strong> Understands the definition and formula for the area of a square or rectangle as length times breadth.<br><br>
<strong>S2 LO C 3.4.26:</strong> Understands that area is the space covered by a 2D shape by counting unit squares.<br><br>

<strong>C-3.5:</strong> Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume and verifies the same using standard units.<br><br>
<strong>S2 LO C 3.5.27:</strong> Calculates duration of time in hours and minutes in simple scenarios.<br><br>
<strong>S2 LO C 3.5.28:</strong> Solves simple elapsed time word problems involving both a.m. and p.m.<br><br>
<strong>S2 LO C 3.5.29:</strong> Measures and compares perimeter of simple shapes informally (e.g., using string).<br><br>

<strong>C-3.6:</strong> Deduces that shapes having equal areas can have different perimeters and shapes having equal perimetres can have different areas.<br><br>
<strong>S2 LO C 3.6.30:</strong> Explores that different shapes can have the same perimeter using concrete examples.<br><br>

<strong>C-3.7:</strong> Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.<br><br>
<strong>S2 LO C 3.7.31:</strong> Demonstrates conservation of length (e.g., string length remains constant regardless of arrangement).<br><br>
<strong>S2 LO C 3.7.32:</strong> Identifies which containers hold the same volume based on visual cues.<br><br>

<strong>CG-4: Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.</strong><br><br>

<strong>C-4.1:</strong> Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).<br><br>
<strong>S2 LO C 4.1.33:</strong> Translates simple daily life situations into mathematical problems (e.g., identifying the operation needed).<br><br>
<strong>S2 LO C 4.1.34:</strong> Uses concrete materials or drawings to help solve problems.<br><br>

<strong>C-4.2:</strong> Learns to systematically count and list all possible permutations or combination given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).<br><br>
<strong>S2 LO C 4.2.35:</strong> Collects and organizes data using tally marks for a given set of items.<br><br>
<strong>S2 LO C 4.2.36:</strong> Represents data using pictographs (where one symbol represents one unit).<br><br>
<strong>S2 LO C 4.2.37:</strong> Interprets simple pictographs to answer questions.<br><br>
<strong>S2 LO C 4.2.38:</strong> Solves simple comparison-based questions from pictographs.<br><br>

<strong>C-4.3:</strong> Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context.<br><br>
<strong>S2 LO C 4.3.39:</strong> Assesses the correctness of a solution by relating it to the problem scenario.<br><br>
<strong>S2 LO C 4.3.40:</strong> Estimates the outcome of operations before calculating.<br><br>

<strong>CG-5: Knows and appreciates the development in India of the decimal place value system that is used around the world today.</strong><br><br>

<strong>C-5.1:</strong> Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology.<br><br>
<strong>S2 LO C 5.1.41:</strong> Recognizes the importance of the Indian number system in daily life and its global contribution.<br><br>

`,
 4: `
  <strong>CG-1: Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.</strong><br><br>

<strong>C-1.1:</strong> Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.<br><br>
<strong>S2 LO D 1.1.1:</strong> Reads and writes numbers up to 10,000 using place value.<br><br>
<strong>S2 LO D 1.1.2:</strong> Compares and orders numbers up to 10,000.<br><br>
<strong>S2 LO D 1.1.3:</strong> Forms the greatest/smallest numbers using the given digits (with/without repetition).<br><br>

<strong>C-1.2:</strong> Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.<br><br>
<strong>S2 LO D 1.2.4:</strong> Identifies 1/2, 1/3, 1/4, 3/4 in shapes and collections.<br><br>
<strong>S2 LO D 1.2.5:</strong> Compares like fractions visually and numerically.<br><br>
<strong>S2 LO D 1.2.6:</strong> Solves problems involving sharing/partitioning objects in fractional parts.<br><br>
<strong>S2 LO D 1.2.7:</strong> Compares unlike fractions visually with same-sized wholes (Olympiad Enrichment).<br><br>
<strong>S2 LO D 1.2.8:</strong> Demonstrates understanding of equivalent fractions using visuals or number lines (Olympiad Enrichment).<br><br>

<strong>C-1.3:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade) and applies the four basic operations on whole numbers to solve daily life problems.<br><br>
<strong>S2 LO D 1.3.9:</strong> Adds and subtracts 2-digit and 3-digit numbers with and without regrouping.<br><br>
<strong>S2 LO D 1.3.10:</strong> Multiplies 2-digit and 3-digit numbers by 1-digit numbers using standard algorithms.<br><br>
<strong>S2 LO D 1.3.11:</strong> Divides 2-digit numbers by 1-digit numbers using equal grouping or repeated subtraction.<br><br>
<strong>S2 LO D 1.3.12:</strong> Identifies and applies the correct operation (addition, subtraction, multiplication, or division) to solve contextual problems.<br><br>
<strong>S2 LO D 1.3.13:</strong> Solves multi-step problems involving a combination of operations (Olympiad Enrichment).<br><br>

<strong>C-1.4:</strong> Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.<br><br>
<strong>S2 LO D 1.4.14:</strong> Identifies factors of numbers less than 50 using grouping or array models.<br><br>
<strong>S2 LO D 1.4.15:</strong> Lists multiples of 2, 3, 5, 10 up to 50.<br><br>
<strong>S2 LO D 1.4.16:</strong> Reads and writes Roman numerals from I to XX.<br><br>
<strong>S2 LO D 1.4.17:</strong> Compares Roman and Hindu-Arabic numerals (I to XX).<br><br>
<strong>S2 LO D 1.4.18:</strong> Identifies, completes, and extends number and shape patterns.<br><br>

<strong>CG-2: Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.</strong><br><br>

<strong>C-2.1:</strong> Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.<br><br>
<strong>S2 LO D 2.1.19:</strong> Identifies and names common 2D shapes (e.g., triangle, square, rectangle, circle).<br><br>
<strong>S2 LO D 2.1.20:</strong> Identifies 3D shapes (cube, cuboid, sphere, cone, cylinder) and their features (edges, faces, vertices).<br><br>

<strong>C-2.2:</strong> Describes location and movement using both common language and mathematical vocabulary; understands the notion of map (Najri Naksha).<br><br>
<strong>S2 LO D 2.2.21:</strong> Identifies the top, front, and side views of simple 3D objects.<br><br>

<strong>C-2.3:</strong> Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.<br><br>
<strong>S2 LO D 2.3.22:</strong> Identifies symmetrical figures and lines of symmetry.<br><br>
<strong>S2 LO D 2.3.23:</strong> Selects shapes that show symmetry from given visual options.<br><br>

<strong>C-2.4:</strong> Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.<br><br>
<strong>S2 LO D 2.4.24:</strong> Recognizes and extends simple patterns involving 2D shapes.<br><br>

<strong>CG-3: Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.</strong><br><br>

<strong>C-3.1:</strong> Measures in non-standard and standard units and evaluates the need for standard units.<br><br>
<strong>S2 LO D 3.1.25:</strong> Measures length using standard units like centimeter (cm) and meter (m) with a ruler or measuring tape.<br><br>
<strong>S2 LO D 3.1.26:</strong> Compares objects by weight and estimates weight using non-standard and standard units (g, kg).<br><br>
<strong>S2 LO D 3.1.27:</strong> Compares objects by capacity and estimates capacity using non-standard and standard units (ml, l).<br><br>

<strong>C-3.2:</strong> Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.<br><br>
<strong>S2 LO D 3.2.28:</strong> Selects and uses appropriate tools (ruler, clock, balance, measuring cup) and units (cm/m, g/kg, ml/l, min/hr) to measure length, time, weight, and volume in real-life contexts.<br><br>

<strong>C-3.3:</strong> Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.<br><br>
<strong>S2 LO D 3.3.29:</strong> Converts centimetres to metres and vice versa; millilitres to litres and vice versa.<br><br>

<strong>C-3.4:</strong> Understands the definition and formula for the area of a square or rectangle as length times breadth.<br><br>
<strong>S2 LO C 3.4.30:</strong> Estimates and calculates the perimeter and area of rectangles/squares using non-standard and square units.<br><br>

<strong>C-3.5:</strong> Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume and verifies the same using standard units.<br><br>
<strong>S2 LO D 3.5.31:</strong> Estimates time intervals in hours and minutes and verifies using clocks or calendars.<br><br>
<strong>S2 LO D 3.5.32:</strong> Estimates and verifies area and perimeter for regular and irregular shapes using non-standard and standard units.<br><br>

<strong>C-3.6:</strong> Deduces that shapes having equal areas can have different perimeters and shapes having equal perimetres can have different areas.<br><br>
<strong>S2 LO D 3.6.33:</strong> Compares areas and perimeters of different shapes using examples.<br><br>

<strong>C-3.7:</strong> Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.<br><br>
<strong>S2 LO D 3.7.34:</strong> Solves daily-life problems involving measurement (e.g., calculating total length, weight, or capacity).<br><br>

<strong>CG-4: Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.</strong><br><br>

<strong>C-4.1:</strong> Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).<br><br>
<strong>S2 LO D 4.1.35:</strong> Translates simple daily life situations into mathematical problems (e.g., identifying the operation needed).<br><br>
<strong>S2 LO D 4.1.36:</strong> Uses concrete materials or drawings to help solve problems.<br><br>

<strong>C-4.2:</strong> Learns to systematically count and list all possible permutations or combinations given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).<br><br>
<strong>S2 LO D 4.2.37:</strong> Lists all possible outcomes of a simple event (e.g., combinations of two clothes or two fruits).<br><br>
<strong>S2 LO D 4.2.38:</strong> Uses diagrams, tables, or lists to systematically find all combinations/ permutations in small sets.<br><br>
<strong>S2 LO D 4.2.39:</strong> Identifies missing or repeated combinations and corrects the list accordingly.<br><br>

<strong>C-4.3:</strong> Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context.<br><br>
<strong>S2 LO D 4.3.40:</strong> Estimates sums, differences, and measurements in real-life contexts.<br><br>
<strong>S2 LO D 4.3.41:</strong> Collects and organizes data using tally marks for a given set of items.<br><br>
<strong>S2 LO D 4.3.42:</strong> Represents data using pictographs (where one symbol represents one unit).<br><br>
<strong>S2 LO D 4.3.43:</strong> Interprets simple pictographs to answer questions.<br><br>
<strong>S2 LO D 4.3.44:</strong> Solves simple comparison-based questions from pictographs.<br><br>

<strong>CG-5: Knows and appreciates the development in India of the decimal place value system that is used around the world today.</strong><br><br>

<strong>C-5.1:</strong> Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology.<br><br>
<strong>S2 LO D 5.1.45:</strong> Recognizes the historical significance of the Indian number system and its global impact on mathematics and technology.<br><br>


  `,
 5: `
  <strong>CG-1: Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.</strong><br><br>

<strong>C-1.1:</strong> Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.<br><br>
<strong>S2 LO E 1.1.1:</strong> Reads, writes, and expands numbers up to 1,00,000 using place value.<br><br>
<strong>S2 LO E 1.1.2:</strong> Compares and orders large numbers.<br><br>
<strong>S2 LO E 1.1.3:</strong> Estimates and rounds numbers to the nearest 10, 100, or 1000.<br><br>
<strong>S2 LO E 1.1.4:</strong> Reads, writes, and compares Roman numerals up to 100 (I to C) (Olympiad Enrichment).<br><br>

<strong>C-1.2:</strong> Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines, and as divisions of whole numbers.<br><br>
<strong>S2 LO E 1.2.5:</strong> Identifies and represents proper, improper, and mixed fractions.<br><br>
<strong>S2 LO E 1.2.6:</strong> Compares and orders like and unlike fractions.<br><br>
<strong>S2 LO E 1.2.7:</strong> Adds and subtracts like fractions and solves contextual problems.<br><br>
<strong>S2 LO E 1.2.8:</strong> Converts fractions to decimals and vice versa.<br><br>
<strong>S2 LO E 1.2.9:</strong> Compares decimals using place value.<br><br>
<strong>S2 LO E 1.2.10:</strong> Reads and writes decimals up to hundredths (0.01).<br><br>
<strong>S2 LO E 1.2.11:</strong> Adds and subtracts decimals in real-world contexts (e.g., money, length).<br><br>

<strong>C-1.3:</strong> Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade), and applies the four basic operations on whole numbers to solve daily life problems.<br><br>
<strong>S2 LO E 1.3.12:</strong> Adds and subtracts 5-digit numbers with or without regrouping.<br><br>
<strong>S2 LO E 1.3.13:</strong> Multiplies 3-digit numbers by 2-digit numbers using appropriate algorithms.<br><br>
<strong>S2 LO E 1.3.14:</strong> Divides 3-digit numbers by 1- or 2-digit numbers, interpreting quotient and remainder.<br><br>
<strong>S2 LO E 1.3.15:</strong> Prepares bills and solves problems involving profit/loss, simple discount.<br><br>

<strong>C-1.4:</strong> Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.<br><br>
<strong>S2 LO E 1.4.16:</strong> Identifies factors and multiples of numbers up to 100 using grouping or multiplication facts.<br><br>
<strong>S2 LO E 1.4.17:</strong> Distinguishes between prime and composite numbers using the number of factors (up to 100).<br><br>
<strong>S2 LO E 1.4.18:</strong> Applies understanding of factors, multiples, and primes in solving reasoning-based questions (e.g., smallest common multiple, common factors, identifying prime-rich patterns) (Olympiad Enrichment).<br><br>
<strong>S2 LO E 1.4.19:</strong> Applies simple divisibility tests to identify properties of numbers (Olympiad Enrichment).<br><br>
<strong>S2 LO E 1.4.20:</strong> Finds LCM and HCF of small numbers using listing/common multiples (Olympiad Enrichment).<br><br>
<strong>S2 LO E 1.4.21:</strong> Identifies and creates patterns in numbers, shapes, and arrangements.<br><br>

<strong>CG-2: Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.</strong><br><br>

<strong>C-2.1:</strong> Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.<br><br>
<strong>S2 LO E 2.1.22:</strong> Classifies triangles, quadrilaterals, and other polygons by properties.<br><br>
<strong>S2 LO E 2.1.23:</strong> Describes and compares 3D shapes (vertices, edges, faces).<br><br>

<strong>C-2.2:</strong> Describes location and movement using both common language and mathematical vocabulary; understands the notion of map (Najri Naksha).<br><br>
<strong>S2 LO E 2.2.24:</strong> Describes the relative positions of objects using coordinates in simple grids.<br><br>

<strong>C-2.3:</strong> Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.<br><br>
<strong>S2 LO E 2.3.25:</strong> Identifies and classifies right, acute, and obtuse angles.<br><br>
<strong>S2 LO E 2.3.26:</strong> Estimates or reads angle measurements to the nearest 5° using a semi-circular protractor image or marked diagram.<br><br>

<strong>C-2.4:</strong> Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.<br><br>
<strong>S2 LO E 2.4.27:</strong> Analyzes and creates complex geometric patterns, including tessellations.<br><br>

<strong>CG-3: Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time, using non-standard and standard units.</strong><br><br>

<strong>C-3.1:</strong> Measures in non-standard and standard units and evaluates the need for standard units.<br><br>
<strong>S2 LO E 3.1.28:</strong> Understands and explains the need for standard units; measures and estimates attributes using appropriate standard units in daily contexts.<br><br>

<strong>C-3.2:</strong> Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.<br><br>
<strong>S2 LO E 3.2.29:</strong> Identifies and uses appropriate tools and units for measuring length, weight, capacity, and time in daily-life situations.<br><br>

<strong>C-3.3:</strong> Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.<br><br>
<strong>S2 LO E 3.3.30:</strong> Performs simple unit conversions (e.g., cm to m, ml to l) and applies them in direct computation or word problems.<br><br>

<strong>C-3.4:</strong> Understands the definition and formula for the area of a square or rectangle as length times breadth.<br><br>
<strong>S2 LO E 3.4.31:</strong> Calculates the area and perimeter of rectangles and composite figures using standard formulae.<br><br>
<strong>S2 LO E 3.4.32:</strong> Estimates and calculates volume using unit cubes in varied orientations and arrangements.<br><br>

<strong>C-3.5:</strong> Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume, and verifies the same using standard units.<br><br>
<strong>S2 LO E 3.5.33:</strong> Solves real-life problems combining area, perimeter, or volume (Olympiad Enrichment).<br><br>

<strong>C-3.6:</strong> Deduces that shapes having equal areas can have different perimeters and shapes having equal perimeters can have different areas.<br><br>
<strong>S2 LO E 3.6.34:</strong> Explores the relationship between area and perimeter in different shapes through examples and comparisons.<br><br>

<strong>C-3.7:</strong> Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.<br><br>
<strong>S2 LO E 3.7.35:</strong> Solves daily-life problems involving conversion and comparison of lengths, weights, and capacities.<br><br>

<strong>CG-4: Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.</strong><br><br>

<strong>C-4.1:</strong> Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).<br><br>
<strong>S2 LO E 4.1.36:</strong> Solves contextual word problems involving 1–2 arithmetic operations.<br><br>
<strong>S2 LO E 4.1.37:</strong> Solves magic square or missing-value puzzles with arithmetic reasoning.<br><br>
<strong>S2 LO E 4.1.38:</strong> Solves multi-step puzzles based on number properties.<br><br>
<strong>S2 LO E 4.1.39:</strong> Interprets and compares information from two or more data forms (e.g., pictograph and table) to solve reasoning-based problems (Olympiad Enrichment).<br><br>

<strong>C-4.2:</strong> Learns to systematically count and list all possible permutations or combinations given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).<br><br>
<strong>S2 LO E 4.2.40:</strong> Lists all possible combinations or arrangements in constrained situations (e.g., choosing outfits, seating pairs, simple committee formation).<br><br>

<strong>C-4.3:</strong> Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context.<br><br>
<strong>S2 LO E 4.3.41:</strong> Estimates and rounds numbers in context of operations or measurement.<br><br>
<strong>S2 LO E 4.3.42:</strong> Collects and organizes data in tables, tally charts, and bar graphs.<br><br>
<strong>S2 LO E 4.3.43:</strong> Constructs bar graphs with appropriate labels and scales.<br><br>
<strong>S2 LO E 4.3.44:</strong> Interprets bar graphs and compares categories.<br><br>

<strong>CG-5: Knows and appreciates the development in India of the decimal place value system that is used around the world today.</strong><br><br>

<strong>C-5.1:</strong> Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology.<br><br>
<strong>S2 LO E 5.1.45:</strong> Recognises key contributions of Indian mathematicians (e.g., zero, decimal system) and their influence on global mathematics (Olympiad Enrichment).<br><br>


  `,
 6: `
  <strong>CG-1:Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers.</strong><br><br>

<strong>C-1.1:</strong> Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers.<br><br>
<strong>S2 LO F 1.1.1:</strong> Reads, writes, and compares large numbers (up to 20 digits) using Indian and International place value systems, and expresses them in scientific notation using powers of 10.<br><br>
<strong>S2 LO F 1.1.2:</strong> Estimates the sum, difference, or product of large numbers using appropriate rounding methods.<br><br>
<strong>S2 LO F 1.1.3:</strong> Represents large numbers using powers of 10 and evaluates simple expressions with exponents.<br><br>

<strong>C-1.2:</strong> Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns.<br><br>
<strong>S2 LO F 1.2.4:</strong> Identifies number patterns in multiplication tables and sequences.<br><br>
<strong>S2 LO F 1.2.5:</strong> Identifies and applies rules to extend number patterns in sequences.<br><br>

<strong>C-1.3:</strong> Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta.<br><br>
<strong>S2 LO F 1.3.6:</strong> Identifies position and order of integers on a number line in real-life or mathematical contexts.<br><br>
<strong>S2 LO F 1.3.7:</strong> Performs basic operations on integers using the number line and rules.<br><br>

<strong>C-1.4:</strong> Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line.<br><br>
<strong>S2 LO F 1.4.8:</strong> Classifies a given number as a whole number, fraction, or integer based on its form.<br><br>
<strong>S2 LO F 1.4.9:</strong> Classifies numbers as natural, whole, integers, and rational numbers using their properties and visualises them on a number line.<br><br>

<strong>C-1.5:</strong> Explores the idea of percentage and applies it to solve problems.<br><br>
<strong>S2 LO F 1.5.10:</strong> Converts between fractions, decimals, and percentages using standard equivalences.<br><br>
<strong>S2 LO F 1.5.11:</strong> Solves daily-life problems using percentages.<br><br>

<strong>C-1.6:</strong> Explores and applies fractions (both as ratios and in decimal form) in daily-life situations.<br><br>
<strong>S2 LO F 1.6.12:</strong> Adds, subtracts, and compares fractions (like and unlike) in contextual situations, including visual representations.<br><br>
<strong>S2 LO F 1.6.13:</strong> Represents decimals on number lines and adds/subtracts them.<br><br>

<strong>CG-2: Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency.</strong><br><br>

<strong>C-2.1:</strong> Understands equality between numerical expressions and learns to check arithmetical equations.<br><br>
<strong>S2 LO F 2.1.14:</strong> Verifies equality in equations using basic operations.<br><br>

<strong>C-2.2:</strong> Extends the representation of a number in the form of a variable or an algebraic expression using a variable.<br><br>
<strong>S2 LO F 2.2.15:</strong> Represents unknown quantities in real-life problems using a single variable.<br><br>

<strong>C-2.3:</strong> Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations.<br><br>
<strong>S2 LO F 2.3.16:</strong> Identifies parts of an algebraic expression (variable, coefficient, constant) in given forms.<br><br>

<strong>C-2.4:</strong> Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems.<br><br>
<strong>S2 LO F 2.4.17:</strong> Solves one-variable linear equations formed from simple word problems.<br><br>

<strong>C-2.5:</strong> Develops own methods to solve puzzles and problems using algebraic thinking.<br><br>
<strong>S2 LO F 2.5.18:</strong> Uses letter variables to design and solve arithmetic puzzles.<br><br>

<strong>CG-3: Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D).</strong><br><br>

<strong>C-3.1:</strong> Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes.<br><br>
<strong>S2 LO F 3.1.19:</strong> Identifies types of angles, triangles, and quadrilaterals by their properties.<br><br>

<strong>C-3.2:</strong> Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems.<br><br>
<strong>S2 LO F 3.2.20:</strong> Measures and draws angles with a protractor and identifies parallel/ perpendicular lines.<br><br>

<strong>C-3.3:</strong> Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems.<br><br>
<strong>S2 LO F 3.3.21:</strong> Identifies properties of 3D shapes (faces, edges, vertices) for cube, cuboid, cone, and cylinder using 2D and 3D representations.<br><br>
<strong>S2 LO F 3.3.22:</strong> Draws nets of simple 3D shapes and matches them with solids.<br><br>

<strong>C-3.4:</strong> Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge.<br><br>
<strong>S2 LO F 3.4.23:</strong> Identifies valid triangle constructions based on side and angle conditions.<br><br>

<strong>C-3.5:</strong> Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles.<br><br>
<strong>S2 LO F 3.5.24:</strong> Identifies congruent and similar shapes based on side lengths, angles, and visual scaling in given diagrams.<br><br>

<strong>CG-4: Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.</strong><br><br>

<strong>C-4.1:</strong> Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium, and develops strategies to find the areas of composite 2D shapes.<br><br>
<strong>S2 LO F 4.1.25:</strong> Applies standard formulae to calculate perimeter and area of rectangles, triangles, and simple composite shapes.<br><br>
<strong>S2 LO F 4.1.26:</strong> Solves problems involving the perimeter and area of composite 2D shapes by decomposing them into basic shapes.<br><br>

<strong>C-4.2:</strong> Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.<br><br>
<strong>S2 LO F 4.2.27:</strong> Identifies and verifies visual proofs of the Pythagoras Theorem using square areas on the sides of a right triangle.<br><br>

<strong>C-4.3:</strong> Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world.<br><br>
<strong>S2 LO F 4.3.28:</strong> Designs simple tiling patterns using symmetry and transformation.<br><br>

<strong>C-4.4:</strong> Develops familiarity with the notion of fractals and identifies and appreciates the appearances of fractals in nature and art in India and around the world.<br><br>
<strong>S2 LO F 4.4.29:</strong> Recognises fractals in leaves, shells, and tribal art (like Warli, Mandala).<br><br>

<strong>CG-5: Collects, organises, represents (graphically and in tables), and interprets data/ information from daily-life experiences.</strong><br><br>

<strong>C-5.1:</strong> Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median.<br><br>
<strong>S2 LO F 5.1.30:</strong> Identifies the correct tabulated form for given raw data and selects suitable data collection methods for specific contexts.<br><br>
<strong>S2 LO F 5.1.31:</strong> Calculates the mean using simple datasets.<br><br>

<strong>C-5.2:</strong> Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.<br><br>
<strong>S2 LO F 5.2.32:</strong> Interprets and compares data using bar graphs, pictographs, and pie charts.<br><br>
<strong>S2 LO F 5.2.33:</strong> Selects suitable graphical representations based on the type of data and context.<br><br>

<strong>CG-6: Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.</strong><br><br>

<strong>C-6.1:</strong> Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.<br><br>
<strong>S2 LO F 6.1.34:</strong> Identifies valid arithmetic or geometric conclusions based on given conditions or patterns.<br><br>
<strong>S2 LO F 6.1.35:</strong> Identifies logical sequences in arithmetic or geometric patterns and selects the correct reasoning step among given options.<br><br>

<strong>CG-7: Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.</strong><br><br>

<strong>C-7.1:</strong> Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.<br><br>
<strong>S2 LO F 7.1.36:</strong> Solves pattern puzzles, number tricks, and visual riddles.<br><br>

<strong>C-7.2:</strong> Engages in and appreciates the artistry and aesthetics of puzzle-making and puzzle-solving.<br><br>
<strong>S2 LO F 7.2.37:</strong> Selects appropriate numbers or geometric patterns to complete or extend a given puzzle or riddle.<br><br>

<strong>CG-8: Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.</strong><br><br>

<strong>C-8.1:</strong> Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations, and reformulates problems into a series of ordered steps (i.e., algorithmic thinking).<br><br>
<strong>S2 LO F 8.1.38:</strong> Identifies the correct step or sequence to solve a structured multi-step problem (e.g., using factor tree or symmetrical construction).<br><br>

<strong>C-8.2:</strong> Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.<br><br>
<strong>S2 LO F 8.2.39:</strong> Identifies correct flowchart steps for basic arithmetic or algorithmic processes.<br><br>
<strong>S2 LO F 8.2.40:</strong> Identifies the rule governing iterative or recursive patterns and selects the next or missing term in the sequence.<br><br>

<strong>CG-9: Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.</strong><br><br>

<strong>C-9.1:</strong> Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations.<br><br>
<strong>S2 LO F 9.1.41:</strong> Describes the origin of numbers, fractions, and zero from different cultures.<br><br>

<strong>C-9.2:</strong> Knows and appreciates the contributions of specific Indian mathematicians, such as, Baudhayana, Pingala, Aryabhata, Brahmagupta, Virahanka, Bhaskara, and Ramanujan.<br><br>
<strong>S2 LO F 9.2.42:</strong> Identifies key contributions of Indian mathematicians like Aryabhata, Brahmagupta, Bhaskara, and Ramanujan.<br><br>

<strong>CG-10: Knows about and appreciates the interaction of Mathematics with each of their other school subjects.</strong><br><br>

<strong>C-10.1:</strong> Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.<br><br>
<strong>S2 LO F 10.1.43:</strong> Applies maths in contexts from science, art, music, geography, and sports.<br><br>


  `,
 7: `
 <strong>CG-1: Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers.</strong><br><br>

<strong>C-1.1:</strong> Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers.<br><br>
<strong>S2 LO G 1.1.1:</strong> Reads and writes very large numbers up to 20 digits using Indian and International systems.<br><br>
<strong>S2 LO G 1.1.2:</strong> Expresses large numbers using exponential notation (powers of 10).<br><br>
<strong>S2 LO G 1.1.3:</strong> Compares and orders large numbers in real-life contexts (e.g., population, distance).<br><br>
<strong>S2 LO G 1.1.4:</strong> Uses estimation for computation with large numbers.<br><br>

<strong>C-1.2:</strong> Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns.<br><br>
<strong>S2 LO G 1.2.5:</strong> Identifies and extends numeric patterns involving powers and multiples.<br><br>
<strong>S2 LO G 1.2.6:</strong> Explores recursive patterns (e.g., Virahanka–Fibonacci) and explains the rules behind them.<br><br>
<strong>S2 LO G 1.2.7:</strong> Identifies and justifies the structures of given novel number patterns.<br><br>

<strong>C-1.3:</strong> Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta.<br><br>
<strong>S2 LO G 1.3.8:</strong> Explains and performs addition and subtraction of integers using rules and the number line.<br><br>
<strong>S2 LO G 1.3.9:</strong> Explains operations involving zero and negatives using visual models or rules.<br><br>

<strong>C-1.4:</strong> Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line.<br><br>
<strong>S2 LO G 1.4.10:</strong> Identifies rational numbers and locates them on the number line.<br><br>
<strong>S2 LO G 1.4.11:</strong> Distinguishes between integers, fractions, and rational numbers.<br><br>
<strong>S2 LO G 1.4.12:</strong> Explores closure, commutativity, associativity, and identity properties of number sets.<br><br>

<strong>C-1.5:</strong> Explores the idea of percentage and applies it to solve problems.<br><br>
<strong>S2 LO G 1.5.13:</strong> Solves real-life problems involving profit/loss, discount, and tax using percentages.<br><br>
<strong>S2 LO G 1.5.14:</strong> Converts between percentages, fractions, and decimals fluently.<br><br>

<strong>C-1.6:</strong> Explores and applies fractions (both as ratios and in decimal form) in daily-life situations.<br><br>
<strong>S2 LO G 1.6.15:</strong> Multiplies and divides fractions in real-life contexts (e.g., recipes, areas).<br><br>
<strong>S2 LO G 1.6.16:</strong> Applies operations on decimals in measurements and money.<br><br>
<strong>S2 LO G 1.6.17:</strong> Justifies the use of ratios/fractions in comparison scenarios.<br><br>

<strong>CG-2: Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency.</strong><br><br>

<strong>C-2.1:</strong> Understands equality between numerical expressions and learns to check arithmetical equations.<br><br>
<strong>S2 LO G 2.1.18:</strong> Checks the equivalence of expressions using substitution and simplification.<br><br>
<strong>S2 LO G 2.1.19:</strong> Uses the balancing method to verify one-step equations.<br><br>

<strong>C-2.2:</strong> Extends the representation of a number in the form of a variable or an algebraic expression using a variable.<br><br>
<strong>S2 LO G 2.2.20:</strong> Translates real-life situations into algebraic expressions.<br><br>
<strong>S2 LO G 2.2.21:</strong> Uses variables to generalise arithmetic patterns.<br><br>

<strong>C-2.3:</strong> Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations.<br><br>
<strong>S2 LO G 2.3.22:</strong> Adds and subtracts like terms in expressions.<br><br>
<strong>S2 LO G 2.3.23:</strong> Identifies parts of an expression (term, coefficient, variable, constant).<br><br>

<strong>C-2.4:</strong> Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems.<br><br>
<strong>S2 LO G 2.4.24:</strong> Solves simple one-variable equations from daily contexts (e.g., age, price).<br><br>
<strong>S2 LO G 2.4.25:</strong> Frames one-variable linear equations from verbal descriptions of real-life situations or puzzles.<br><br>

<strong>C-2.5:</strong> Develops own methods to solve puzzles and problems using algebraic thinking.<br><br>
<strong>S2 LO G 2.5.26:</strong> Solves logic-based algebraic puzzles and identifies correct solution strategies.<br><br>

<strong>CG-3: Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D).</strong><br><br>

<strong>C-3.1:</strong> Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes.<br><br>
<strong>S2 LO G 3.1.27:</strong> Classifies and describes 2D and 3D shapes using properties (sides, angles, faces).<br><br>

<strong>C-3.2:</strong> Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems.<br><br>
<strong>S2 LO G 3.2.28:</strong> Explores angle properties in triangles and quadrilaterals.<br><br>

<strong>C-3.3:</strong> Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems.<br><br>
<strong>S2 LO G 3.3.29:</strong> Identifies and matches nets with corresponding 3D shapes (e.g., cube, cuboid, cylinder).<br><br>

<strong>C-3.4:</strong> Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge.<br><br>
<strong>S2 LO G 3.4.30:</strong> Identifies the correct sequence of steps to construct lines/angles/triangles using a compass and ruler.<br><br>

<strong>C-3.5:</strong> Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles.<br><br>
<strong>S2 LO G 3.5.31:</strong> Identifies and compares similar and congruent shapes using visual reasoning and properties (e.g., side lengths, angles, orientation).<br><br>

<strong>CG-4: Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.</strong><br><br>

<strong>C-4.1:</strong> Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium, and develops strategies to find the areas of composite 2D shapes.<br><br>
<strong>S2 LO G 4.1.32:</strong> Applies formulae for the area of parallelograms, triangles, and trapeziums in real contexts.<br><br>

<strong>C-4.2:</strong> Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.<br><br>
<strong>S2 LO G 4.2.33:</strong> Applies Pythagoras' theorem to solve problems involving right-angled triangles, including using geometric representations.<br><br>

<strong>C-4.3:</strong> Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world.<br><br>
<strong>S2 LO G 4.3.34:</strong> Identifies the transformation used (reflection, rotation, translation) in a tiling pattern.<br><br>

<strong>C-4.4:</strong> Develops familiarity with the notion of fractals and identifies and appreciates the appearances of fractals in nature and art in India and around the world.<br><br>
<strong>S2 LO G 4.4.35:</strong> Identifies and appreciates basic fractal patterns in nature or cultural art through visual examples.<br><br>

<strong>CG-5: Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences.</strong><br><br>

<strong>C-5.1:</strong> Collects, organises, and interprets the data using measures of central tendency such as average/mean, mode, and median.<br><br>
<strong>S2 LO G 5.1.36:</strong> Calculates mean, median, and mode using real-life datasets.<br><br>

<strong>C-5.2:</strong> Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.<br><br>
<strong>S2 LO G 5.2.37:</strong> Interprets bar/pie/line graphs to answer reasoning-based questions.<br><br>

<strong>CG-6: Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.</strong><br><br>

<strong>C-6.1:</strong> Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.<br><br>
<strong>S2 LO G 6.1.38:</strong> Identifies and generalises patterns in arithmetic or geometric sequences using reasoning.<br><br>
<strong>S2 LO G 6.1.39:</strong> Selects valid logical steps to justify a given mathematical solution.<br><br>

<strong>CG-7: Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.</strong><br><br>

<strong>C-7.1:</strong> Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.<br><br>
<strong>S2 LO G 7.1.40:</strong> Solves puzzles involving number tricks, spatial reasoning, and logic.<br><br>

<strong>C-7.2:</strong> Engages in and appreciates the artistry and aesthetics of puzzle-making and puzzle-solving.<br><br>
<strong>S2 LO G 7.2.41:</strong> Recognises more than one valid strategy for solving a mathematical puzzle from given options.<br><br>

<strong>CG-8: Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.</strong><br><br>

<strong>C-8.1:</strong> Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into series of ordered steps (i.e., algorithmic thinking).<br><br>
<strong>S2 LO G 8.1.42:</strong> Identifies the correct stepwise breakdown of a given multistep problem.<br><br>

<strong>C-8.2:</strong> Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.<br><br>
<strong>S2 LO G 8.2.43:</strong> Interprets flowcharts, tables, or visual data representations to identify correct algorithmic steps.<br><br>
<strong>S2 LO G 8.2.44:</strong> Identifies iterative patterns and selects valid generalisations.<br><br>

<strong>CG-9: Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.</strong><br><br>

<strong>C-9.1:</strong> Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations.<br><br>
<strong>S2 LO G 9.1.45:</strong> Identifies key developments in the evolution of numbers, zero, algebra, or geometry across different ancient cultures.<br><br>

<strong>C-9.2:</strong> Knows and appreciates the contributions of specific Indian mathematicians, such as Baudhayana, Pingala, Aryabhata, Brahmagupta, Virahanka, Bhaskara, and Ramanujan.<br><br>
<strong>S2 LO G 9.2.46:</strong> Shares contributions of Aryabhata, Brahmagupta, Bhaskara, and others in the context of their work.<br><br>

<strong>CG-10: Knows about and appreciates the interaction of Mathematics with each of their other school subjects.</strong><br><br>

<strong>C-10.1:</strong> Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.<br><br>
<strong>S2 LO G 10.1.47:</strong> Identifies mathematical concepts used in other subjects, such as symmetry in art, speed in science, or scale in geography.<br><br>


  `,
 8: `
 <strong>CG-1: Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers.</strong><br><br>
<strong>C-1.1:</strong> Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers.<br><br>
<strong>S2 LO H 1.1.1:</strong> Reads, writes, and compares numbers up to 20 digits.<br><br>
<strong>S2 LO H 1.1.2:</strong> Represents very large or very small numbers using scientific notation and powers of 10.<br><br>
<strong>S2 LO H 1.1.3:</strong> Applies metric prefixes (kilo, mega, giga) in contextual comparisons.<br><br>
<strong>C-1.2:</strong> Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns.<br><br>
<strong>S2 LO H 1.2.4:</strong> Recognises and extends numeric patterns with primes, squares, cubes.<br><br>
<strong>S2 LO H 1.2.5:</strong> Explains rules behind recursive and arithmetic sequences.<br><br>
<strong>S2 LO H 1.2.6:</strong> Creates sequences from real-life or symbolic contexts.<br><br>
<strong>C-1.3:</strong> Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta.<br><br>
<strong>S2 LO H 1.3.7:</strong> Applies rules for integer operations across contexts.<br><br>
<strong>S2 LO H 1.3.8:</strong> Connects historical development of zero and negatives to Brahmagupta’s work.<br><br>
<strong>C-1.4:</strong> Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line.<br><br>
<strong>S2 LO H 1.4.9:</strong> Identifies, represents and differentiates between rational and irrational numbers.<br><br>
<strong>S2 LO H 1.4.10:</strong> Locates rational and irrational numbers on the number line.<br><br>
<strong>S2 LO H 1.4.11:</strong> Explores basic number set properties (closure, commutativity).<br><br>
<strong>C-1.5:</strong> Explores the idea of percentage and applies it to solve problems.<br><br>
<strong>S2 LO H 1.5.12:</strong> Solves real-life problems involving profit, loss, tax, and simple interest using percentages.<br><br>
<strong>S2 LO H 1.5.13:</strong> Converts between percentages, decimals, and fractions fluently.<br><br>
<strong>C-1.6:</strong> Explores and applies fractions (both as ratios and in decimal form) in daily-life situations.<br><br>
<strong>S2 LO H 1.6.14:</strong> Uses fractions and decimals to solve ratio and proportion problems.<br><br>
<strong>S2 LO H 1.6.15:</strong> Solves real-life problems involving discounts, scale factors, and mixtures.<br><br>
<strong>CG-2: Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency.</strong><br><br>
<strong>C-2.1:</strong> Understands equality between numerical expressions and learns to check arithmetical equations.<br><br>
<strong>S2 LO H 2.1.16:</strong> Checks and simplifies complex numerical expressions using BODMAS and properties.<br><br>
<strong>S2 LO H 2.1.17:</strong> Identifies and corrects errors in calculations.<br><br>
<strong>C-2.2:</strong> Extends the representation of a number in the form of a variable or an algebraic expression using a variable.<br><br>
<strong>S2 LO H 2.2.18:</strong> Forms algebraic expressions from contextual problems.<br><br>
<strong>C-2.3:</strong> Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations.<br><br>
<strong>S2 LO H 2.3.19:</strong> Performs addition, subtraction, and multiplication of algebraic expressions.<br><br>
<strong>S2 LO H 2.3.20:</strong> Applies identities like (a + b)², a² – b².<br><br>
<strong>C-2.4:</strong> Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems.<br><br>
<strong>S2 LO H 2.4.21:</strong> Solves one-variable equations involving brackets, variables on both sides.<br><br>
<strong>S2 LO H 2.4.22:</strong> Frames and solves linear equations from word problems.<br><br>
<strong>C-2.5:</strong> Develops own methods to solve puzzles and problems using algebraic thinking.<br><br>
<strong>S2 LO H 2.5.23:</strong> Designs number puzzles and riddles with variable-based solutions.<br><br>
<strong>S2 LO H 2.5.24:</strong> Uses algebra to explain or generalise patterns.<br><br>
<strong>CG-3: Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D).</strong><br><br>
<strong>C-3.1:</strong> Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes.<br><br>
<strong>S2 LO H 3.1.25:</strong> Classifies polygons, especially quadrilaterals, by properties.<br><br>
<strong>C-3.2:</strong> Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems.<br><br>
<strong>S2 LO H 3.2.26:</strong> Applies interior angle sum theorem to polygons.<br><br>
<strong>C-3.3:</strong> Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems.<br><br>
<strong>S2 LO H 3.3.27:</strong> Matches nets with 3D shapes (cube, cuboid, cylinder).<br><br>
<strong>C-3.4:</strong> Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge.<br><br>
<strong>S2 LO H 3.4.28:</strong> Constructs accurate figures using compass and straightedge.<br><br>
<strong>C-3.5:</strong> Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles.<br><br>
<strong>S2 LO H 3.5.29:</strong> Recognises pairs of shapes that are similar or congruent based on visual comparison.<br><br>
<strong>CG-4: Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.</strong><br><br>
<strong>C-4.1:</strong> Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium and develops strategies to find the areas of composite 2D shapes.<br><br>
<strong>S2 LO H 4.1.30:</strong> Calculates areas and perimeters of parallelograms, trapeziums, and compound figures.<br><br>
<strong>C-4.2:</strong> Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.<br><br>
<strong>S2 LO H 4.2.31:</strong> Applies geometric reasoning (e.g., area of squares) to explain the Pythagoras theorem using diagrams or options.<br><br>
<strong>C-4.3:</strong> Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world.<br><br>
<strong>S2 LO H 4.3.32:</strong> Identifies tiling patterns and their use in architecture or design from visuals.<br><br>
<strong>C-4.4:</strong> Develops familiarity with the notion of fractal and identifies and appreciates the appearances of fractals in nature and art in India and around the world.<br><br>
<strong>S2 LO H 4.4.33:</strong> Recognises fractal patterns in natural and geometric figures and identifies features of recursive structures.<br><br>
<strong>CG-5: Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences.</strong><br><br>
<strong>C-5.1:</strong> Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median.<br><br>
<strong>S2 LO H 5.1.34:</strong> Calculates mean, median, and mode from grouped and ungrouped data.<br><br>
<strong>C-5.2:</strong> Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.<br><br>
<strong>S2 LO H 5.2.35:</strong> Constructs and interprets pie charts, line graphs, bar graphs and histograms for contextual data.<br><br>
<strong>CG-6: Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.</strong><br><br>
<strong>C-6.1:</strong> Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.<br><br>
<strong>S2 LO H 6.1.36:</strong> Uses deductive reasoning to verify patterns and theorems.<br><br>
<strong>S2 LO H 6.1.37:</strong> Identifies valid steps in a logical argument to support a given mathematical conclusion.<br><br>
<strong>CG-7: Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.</strong><br><br>
<strong>C-7.1:</strong> Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.<br><br>
<strong>S2 LO H 7.1.38:</strong> Solves puzzles using logic, patterns, and number properties.<br><br>
<strong>C-7.2:</strong> Engages in and appreciates the artistry and aesthetics of puzzle-making and puzzle-solving.<br><br>
<strong>S2 LO H 7.2.39:</strong> Creates and explains new puzzles with alternate solutions.<br><br>
<strong>CG-8: Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.</strong><br><br>
<strong>C-8.1:</strong> Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into series of ordered steps (i.e., algorithmic thinking).<br><br>
<strong>S2 LO H 8.1.40:</strong> Breaks down a complex problem into smaller sub-problems.<br><br>
<strong>C-8.2:</strong> Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.<br><br>
<strong>S2 LO H 8.2.41:</strong> Represents algorithms using pseudocode or flowcharts.<br><br>
<strong>S2 LO H 8.2.42:</strong> Identifies patterns and makes generalisations in problem solving.<br><br>
<strong>CG-9: Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.</strong><br><br>
<strong>C-9.1:</strong> Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations.<br><br>
<strong>S2 LO H 9.1.43:</strong> Explores evolution of number systems, irrationality, and algebra historically.<br><br>
<strong>C-9.2:</strong> Knows and appreciates the contributions of specific Indian mathematicians, such as, Baudhayana, Pingala, Aryabhata, Brahmagupta, Virahanka, Bhaskara, and Ramanujan.<br><br>
<strong>S2 LO H 9.2.44:</strong> Identifies contributions of key Indian mathematicians (e.g., Madhava, Ramanujan).<br><br>
<strong>CG-10: Knows about and appreciates the interaction of Mathematics with each of their other school subjects.</strong><br><br>
<strong>C-10.1:</strong> Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.<br><br>
<strong>S2 LO H 10.1.45:</strong> Identifies how mathematics applies to science, geography, arts, or sports contexts (e.g., maps, symmetry, scores).<br><br>


  `,
  },

  evs: {

    1: `
      <strong>CG-1: Children develop habits that keep them healthy and safe.</strong><br><br>
<strong>C-1.1:</strong> Shows a liking for and understanding of nutritious food and does not waste food.<br><br>
<strong>S3 LO A 1.1.1:</strong> The learner will be able to identify the main ingredients in familiar foods and relate them to basic health benefits.<br><br>
<strong>C-1.3:</strong> Keeps the school/classroom hygienic and organised.<br><br>
<strong>S3 LO A 1.3.2:</strong> The learner will be able to sort wet and dry waste items correctly using visual cues and examples.<br><br>
<strong>C-1.6:</strong> Understands unsafe situations and asks for help in those situations.<br><br>
<strong>S3 LO A 1.6.3:</strong> The learner will be able to recognise common unsafe situations and select appropriate safety actions or basic protocols.<br><br>

<strong>CG-2: Children develop sharpness in sensorial perceptions.</strong><br><br>
<strong>C-2.1:</strong> Differentiates between shapes, colours, and their shades.<br><br>
<strong>S3 LO A 2.1.4:</strong> The learner will be able to predict the resulting colour when two primary colours are mixed.<br><br>

<strong>CG-4: Children develop emotional intelligence.</strong><br><br>
<strong>C-4.1:</strong> Starts recognising ‘self’ as an individual belonging to a family and community.<br><br>
<strong>S3 LO A 4.1.5:</strong> The learner will be able to identify how different family members contribute to the community’s well-being and value their roles.<br><br>
<strong>C-4.6:</strong> Shows kindness and helpfulness to others (including animals, plants) when they are in need.<br><br>
<strong>S3 LO A 4.6.6:</strong> The learner will be able to choose caring and helpful actions towards animals and plants in need.<br><br>

<strong>CG-6: Children develop a positive regard for the natural environment around them.</strong><br><br>
<strong>C-6.1:</strong> Shows care and joy in engaging with all life forms.<br><br>
<strong>S3 LO A 6.1.7:</strong> The learner will be able to identify common local plants and animals and match them with their key features, products, or uses.<br><br>

<strong>CG-7: Make sense of the world around through observation and logical thinking.</strong><br><br>
<strong>C-7.2:</strong> Observes and understands cause and effect relationships in nature by forming simple hypotheses and uses observations to explain their hypothesis.<br><br>
<strong>S3 LO A 7.2.8:</strong> The learner will be able to identify seasonal features and associate them with visible changes or common actions.<br><br>
<strong>S3 LO A 7.2.9:</strong> The learner will be able to describe when and where the sun and moon rise and set and explain their effects on light and day-night cycles.<br><br>
<strong>S3 LO A 7.2.10:</strong> The learner will be able to explain the interdependence between humans and nature using everyday examples.<br><br>


       `,
     2: `
      <strong>CG-1: Children develop habits that keep them healthy and safe.</strong><br><br>
<strong>C-1.1:</strong> Shows a liking for and understanding of nutritious food and does not waste food.<br><br>
<strong>S3 LO B 1.1.1:</strong> The learner will be able to identify commonly eaten packaged foods and classify them as healthy or unhealthy based on visible ingredients or nutritional cues.<br><br>
<strong>C-1.3:</strong> Keeps the school/classroom hygienic and organised.<br><br>
<strong>S3 LO B 1.3.2:</strong> The learner will be able to classify different types of waste (wet, dry, recyclable) and select the correct disposal method or bin to help maintain cleanliness.<br><br>
<strong>C-1.5:</strong> Shows awareness of safety in movements (walking, running, cycling) and acts appropriately.<br><br>
<strong>S3 LO B 1.5.3:</strong> The learner will be able to recognise common safety symbols and match them with the appropriate precautions or places where they appear.<br><br>

<strong>CG-2: Children develop sharpness in sensorial perceptions.</strong><br><br>
<strong>C-2.5:</strong> Develops discrimination in the sense of touch.<br><br>
<strong>S3 LO B 2.5.4:</strong> The learner will be able to identify, compare, and sequence objects based on texture using correct descriptive vocabulary.<br><br>

<strong>CG-4: Children develop emotional intelligence.</strong><br><br>
<strong>C-4.1:</strong> Starts recognising ‘self’ as an individual belonging to a family and community.<br><br>
<strong>S3 LO B 4.1.5:</strong> The learner will be able to identify the roles of family members who serve as community helpers and explain how they contribute to society.<br><br>
<strong>C-4.6:</strong> Shows kindness and helpfulness to others (including animals, plants) when they are in need.<br><br>
<strong>S3 LO B 4.6.6:</strong> The learner will be able to identify actions that reflect kindness and helpfulness toward others and living beings in real-life situations.<br><br>

<strong>CG-6: Children develop a positive regard for the natural environment around them.</strong><br><br>
<strong>C-6.1:</strong> Shows care for and joy in engaging with all life forms.<br><br>
<strong>S3 LO B 6.1.7:</strong> The learner will be able to choose appropriate ways to care for pets, plants, and smaller living beings and avoid harmful actions toward them.<br><br>

<strong>CG-7: Children make sense of the world around them through observation and logical thinking.</strong><br><br>
<strong>C-7.2:</strong> Observes and understands cause and effect relationships in nature by forming simple hypotheses and uses observations to explain their hypothesis.<br><br>
<strong>S3 LO B 7.2.8:</strong> The learner will be able to identify and explain simple cause-and-effect relationships in nature based on familiar observations.<br><br>
<strong>S3 LO B 7.2.9:</strong> The learner will be able to describe how human actions affect the environment and explain the importance of maintaining a healthy balance between both.<br><br>

<strong>CG-8: Children develop mathematical understanding and abilities to recognize the world through quantities, shapes, and measures.</strong><br><br>
<strong>C-8.1:</strong> Sorts objects into groups and sub-groups based on more than one property.<br><br>
<strong>S3 LO B 8.1.10:</strong> The learner will be able to sort and classify plants or animals into groups and sub-groups based on multiple properties such as type, use, or habitat.<br><br>


       `,   
     3: `
      <strong>CG-1: Explores and engages with the natural and socio-cultural environment in their surroundings.</strong><br><br>
<strong>C-1.1:</strong> Observes and identifies the natural (insects, plants, birds, animals, geographical features, sun and moon, stars, planets, natural resources) and social (houses, relationships) components in their immediate environment.<br><br>
<strong>S3 LO C 1.1.1:</strong> The learner will be able to identify common natural components (e.g., insects, birds, plants, Sun, Moon) and describe basic differences among them.<br><br>

<strong>CG-2: Understands the interdependence in their environment through observation and experiences, developing the basis for appreciation of the idea of ‘Vasudhaiva Kutumbakam’.</strong><br><br>
<strong>C-2.1:</strong> Identifies natural and human-made systems that support their lives (water supply, water cycle, river flow systems, seasons, life cycle of plants and animals, food, household items, transport, communication, electricity in the home).<br><br>
<strong>S3 LO C 2.1.2:</strong> The learner will be able to identify natural sources of water (rivers, lakes, ponds, rain) and explain how they support everyday life.<br><br>
<strong>C-2.2:</strong> Describes the relationship between the natural environment and cultural practices in their immediate environment (nature of work, food, festivals, traditions).<br><br>
<strong>S3 LO C 2.2.3:</strong> The learner will be able to explain how seasonal changes influence local food habits and clothing choices.<br><br>
<strong>S3 LO C 2.2.4:</strong> The learner will be able to identify how festivals and traditions are linked to natural phenomena, agriculture, or seasons.<br><br>

<strong>CG-3: Explains how to ensure the safety of oneself and others in different (normal as well as emergency) situations.</strong><br><br>
<strong>C-3.1:</strong> Describes the basic safety needs and protection (health and hygiene, food, water, shelter, precautions, awareness of emergencies, abuse, and unsafe situations) of humans, birds, and animals.<br><br>
<strong>S3 LO C 3.1.5:</strong> The learner will be able to identify safe food and water options and hygiene practices that help prevent illness in humans and animals.<br><br>
<strong>C-3.2:</strong> Discusses how to prepare for emergencies (smoke, fire, small injuries, burns, electrical safety, unseasonal rains, fallen trees) based on discussions with family and community, or personal experiences.<br><br>
<strong>S3 LO C 3.2.6:</strong> The learner will be able to recognise actions to take during emergencies like earthquakes, fire, or unseasonal rains.<br><br>

<strong>CG-4: Develops sensitivity towards the social and natural environment.</strong><br><br>
<strong>C-4.1:</strong> Observes and describes diversity among plants, birds, and animals in their immediate environment (shape, sounds, food habits, growth, habitat).<br><br>
<strong>S3 LO C 4.1.7:</strong> The learner will be able to analyse features such as food habits, body structure, and habitat to classify animals into categories.<br><br>
<strong>C-4.4:</strong> Demonstrates how natural resources can be shared, maintained, and conserved (trees, use of rainwater, benefits of millets).<br><br>
<strong>S3 LO C 4.4.8:</strong> The learner will be able to identify simple ways to use and conserve natural resources like trees and water in daily life.<br><br>
<strong>C-4.7:</strong> Learns about basic social and behavioural norms, values, and dispositions that benefit our social and natural environments and that help our society function smoothly (using dustbins, standing in queues, conserving water, using public transportation, keeping one’s environment clean, always helping others in need regardless of background).<br><br>
<strong>S3 LO C 4.7.9:</strong> The learner will be able to identify good behaviours that protect the environment and conserve resources.<br><br>

<strong>CG-7: Gains foundational familiarity with basic concepts and methods from the natural sciences (life sciences, physical sciences, and earth and space sciences) and engineering.</strong><br><br>
<strong>C-7.1:</strong> Gains familiarity with using the scientific method in investigations, as well as familiarity with other crosscutting concepts such as energy, matter, and systems that apply across the domains of science and engineering.<br><br>
<strong>S3 LO C 7.1.10:</strong> The learner will be able to identify and explain observable changes in materials or objects using simple reasoning.<br><br>

       `,
     4: `
      <strong>CG-1: Explores and engages with the natural and socio-cultural environment in their surroundings.</strong><br><br>
<strong>C-1.2:</strong> Describes relationships (including between humans and animals/nature) and traditions (art forms, celebrations, festivals) in the family and community.<br><br>
<strong>S3 LO D 1.2.1:</strong> The learner will be able to name and identify features of local festivals and describe how they are connected with nature.<br><br>
<strong>C-1.3:</strong> Asks questions and makes predictions about simple patterns (season change, food chain, phases of the moon, movement of stars and planets, shapes of trees, plants, leaves, and flowers, rituals, celebrations) observed in the immediate environment.<br><br>
<strong>S3 LO D 1.3.2:</strong> The learner will be able to identify and explain simple natural patterns such as phases of the moon, changing sunrise/sunset times, bird migration, or leaf fall across seasons.<br><br>

<strong>CG-2: Understands the interdependence in their environment through observation and experiences, developing the basis for appreciation of the idea of ‘Vasudhaiva Kutumbakam’.</strong><br><br>
<strong>C-2.1:</strong> Identifies natural and human-made systems that support their lives (water supply, water cycle, river flow systems, seasons, life cycle of plants and animals, food, household items, transport, communication, electricity in the home).<br><br>
<strong>S3 LO D 2.1.3:</strong> The learner will be able to identify how systems like the water cycle, seasons, and plant life cycles meet human needs, such as providing water or supporting farming.<br><br>

<strong>CG-3: Explains how to ensure the safety of self and others in different (normal as well as emergency) situations.</strong><br><br>
<strong>C-3.1:</strong> Describes the basic safety needs and protection (health and hygiene, food, water, shelter, precautions, awareness of emergencies, abuse, and unsafe situations) of humans, birds, and animals.<br><br>
<strong>S3 LO D 3.1.4:</strong> The learner will be able to identify correct hygiene and safety practices for daily life and emergencies.<br><br>

<strong>CG-4: Develops sensitivity towards the social and natural environment.</strong><br><br>
<strong>C-4.3:</strong> Describes the usage of natural resources in their immediate environment.<br><br>
<strong>S3 LO D 4.3.5:</strong> The learner will be able to identify and explain the uses of natural resources such as soil, forests, rivers, and plants, and match them to their functions or benefits.<br><br>
<strong>C-4.6:</strong> Identifies the needs of people in different situations – in terms of access to resources, equal opportunities, work distribution, and shelter.<br><br>
<strong>S3 LO D 4.6.6:</strong> The learner will be able to identify differences in access to education, health care, and basic resources among social or regional groups.<br><br>
<strong>C-4.7:</strong> Learns about basic social and behavioural norms, values, and dispositions that benefit our social and natural environments and that help our society function smoothly (using dustbins, standing in queues, conserving water, using public transportation, keeping one’s environment clean, always helping others in need regardless of background).<br><br>
<strong>S3 LO D 4.7.7:</strong> The learner will be able to identify responsible and environment-friendly actions in everyday life.<br><br>
<strong>S3 LO D 4.7.8:</strong> The learner will be able to identify sustainable actions that conserve resources, such as water conservation, waste segregation, the use of public transport, and keeping the surroundings clean.<br><br>

<strong>CG-6: Uses data and information from various sources to investigate questions related to their immediate environment.</strong><br><br>
<strong>C-6.2:</strong> Presents observations and findings through different creative modes (drawing, diagram, poem, play, skit, oral and written expression).<br><br>
<strong>S3 LO D 6.2.9:</strong> The learner will be able to interpret labelled diagrams to extract and communicate information.<br><br>

<strong>CG-7: Gains foundational familiarity with basic concepts and methods from the natural sciences (life sciences, physical sciences, and earth and space sciences) and engineering.</strong><br><br>
<strong>C-7.2:</strong> Gains familiarity with disciplinary core ideas in the natural sciences, as well as in engineering, technology, and applications of science, which reflect the content that will be learned across subject areas in later Grades.<br><br>
<strong>S3 LO D 7.2.10:</strong> The learner will be able to identify major human body organs and describe their functions, and match them with habits that support their health.<br><br>


       `,   
      5: `
        <strong>CG-1: Explores and engages with the natural and socio-cultural environment in their surroundings.</strong><br><br>
<strong>C-1.3:</strong> Asks questions and makes predictions about simple patterns (season change, food chain, phases of the moon, movement of stars and planets, shapes of trees, plants, leaves, and flowers, rituals, celebrations) observed in the immediate environment.<br><br>
<strong>S3 LO E 1.3.1:</strong> The learner will be able to identify types of leaves, trees, and flowers and explain how their features are suited to regional environmental conditions.<br><br>

<strong>CG-2: Understands the interdependence in their environment through observation and experiences, developing the basis for appreciation of the idea of ‘Vasudhaiva Kutumbakam.’</strong><br><br>
<strong>C-2.1:</strong> Identifies natural and human-made systems that support their lives (water supply, water cycle, river flow systems, seasons, life cycle of plants and animals, food, household items, transport, communication, electricity in the home).<br><br>
<strong>S3 LO E 2.1.2:</strong> The learner will be able to explain how systems like electricity and transport support daily life and identify the problems caused when these systems fail.<br><br>

<strong>CG-3: Explains how to ensure the safety of self and others in different (normal as well as emergency) situations.</strong><br><br>
<strong>C-3.1:</strong> Describes the basic safety needs and protection (health and hygiene, food, water, shelter, precautions, awareness of emergencies, abuse, and unsafe situations) of humans, birds, and animals.<br><br>
<strong>S3 LO E 3.1.3:</strong> The learner will be able to identify personal and public hygiene practices and explain precautionary steps for health and safety in daily life and emergencies.<br><br>
<strong>C-3.2:</strong> Discusses how to prepare for emergencies (smoke, fire, small injuries, burns, electrical safety, unseasonal rains, fallen trees) based on discussions with family and community, or personal experiences.<br><br>
<strong>S3 LO E 3.2.4:</strong> The learner will be able to choose correct responses for minor emergencies such as cuts, burns, choking, and electric shocks.<br><br>

<strong>CG-4: Develops sensitivity towards the social and natural environment.</strong><br><br>
<strong>C-4.1:</strong> Observes and describes diversity among plants, birds, and animals in their immediate environment (shape, sounds, food habits, growth, habitat).<br><br>
<strong>S3 LO E 4.1.5:</strong> The learner will be able to identify features that help plants and animals survive in specific habitats.<br><br>
<strong>C-4.7:</strong> Learns about basic social and behavioural norms, values, and dispositions that benefit our social and natural environments and that help our society function smoothly (using dustbins, standing in queues, conserving water, using public transportation, keeping one’s environment clean, always helping others in need regardless of background).<br><br>
<strong>S3 LO E 4.7.6:</strong> The learner will be able to identify and evaluate conservation practices such as reducing plastic use, rainwater harvesting, protecting wildlife, and using renewable energy sources.<br><br>
<strong>S3 LO E 4.7.7:</strong> The learner will be able to identify responsible social behaviours that support harmony and public well-being.<br><br>

<strong>CG-5: Develops the ability to read and interpret simple maps.</strong><br><br>
<strong>C-5.3:</strong> Reads simple maps of city, state, and country to identify natural and human-made features (well, lake, post office, school, hospital) with reference to symbols and directions.<br><br>
<strong>S3 LO E 5.3.8:</strong> The learner will be able to identify major natural features of India, such as rivers, mountains, forests, and deserts, on a map using symbols and directions.<br><br>

<strong>CG-6: Uses data and information from various sources to investigate questions related to their immediate environment.</strong><br><br>
<strong>C-6.2:</strong> Presents observations and findings through different creative modes (drawing, diagram, poem, play, skit, oral and written expression).<br><br>
<strong>S3 LO E 6.2.9:</strong> The learner will be able to interpret and present data from surveys or activities using tables, pictographs, or bar charts.<br><br>
<strong>S3 LO E 6.2.10:</strong> The learner will be able to identify and interpret labelled diagrams of human body systems and explain the basic functions of their parts.<br><br>

 `,
   },








  science: {

    6: `
      <strong>CG-1</strong>:
Explores the world of matter and its constituents, properties, and behaviour.<br><br>

<strong>C-1.1</strong>:
Classifies matter based on observable physical (solid, liquid, gas, shape, volume, density, transparent, opaque, translucent, magnetic, non-magnetic, conducting, non-conducting) and chemical (pure, impure; acid, base; metal, non-metal; element, compound) characteristics.<br><br>

<strong>S4 LO F 1.1.1:
The learner will be able to classify substances as solids, liquids, or gases, based on properties such as transparency, magnetism, and conductivity.</strong><br><br>



<strong>C-1.2</strong>:
Describes changes in matter (physical and chemical) and uses particulate nature to represent the properties of matter and the changes.<br><br>

<strong>S4 LO F 1.2.2:
The learner will be able to differentiate between physical and chemical changes using observable effects such as a change in state, colour, or gas formation.</strong><br><br>

<strong>Key Focus Area</strong>:
Include common changes like melting of ice, tearing of paper, rusting of iron, and cooking of food. Use one clear indicator per question to avoid overlap.<br><br>



<strong>C-1.3</strong>:
Explains the importance of measurement and measures physical properties of matter (such as volume, weight, temperature, density) in indigenous, non-standard, and standard units using simple instruments.<br><br>

<strong>S4 LO F 1.3.3</strong>:
The learner will be able to identify appropriate tools and standard units for measuring volume, mass, and temperature based on given situations or images.<br><br>



<strong>C-1.4:
Observes and explains the phenomena caused due to differences in pressure, temperature, and density (e.g., breathing, sinking-floating, water pumps in homes, cooling of things, formation of winds).</strong><br><br>

<strong>S4 LO F 1.3.4</strong>:
The learner will be able to explain real-life phenomena such as floating-sinking, wind formation, and breathing using concepts of pressure, temperature, and density.<br><br>

<strong>Key Focus Area</strong>:
Limit to one phenomenon per item (e.g., floating based on density comparison, wind due to pressure difference). Avoid multi-causal reasoning questions.<br><br>



<strong>CG-2</strong>:
Explores the physical world in scientific and mathematical terms.<br><br>

<strong>C-2.1</strong>:
Describes one-dimensional motion (uniform, non-uniform, horizontal, vertical) using physical measurements (position, speed, and changes in speed) through mathematical and diagrammatic representations.<br><br>

<strong>S4 LO F 2.1.5<:
The learner will be able to describe and interpret one-dimensional motion (uniform and non-uniform) using position-time relationships and diagrams.</strong><br><br>

<strong>Key Focus Area</strong>:
Use straight-line motion with clear units. Provide simple data tables or graphs. Avoid acceleration unless explicitly mentioned.<br><br>



<strong>C-2.2</strong>:
Describes how electricity works through manipulating different elements in simple circuits and demonstrates the heating and magnetic effects of electricity.<br><br>

<strong>S4 LO F 2.2.6:
The learner will be able to identify components of simple electric circuits and explain the heating and magnetic effects of current.</strong><br><br>



<strong>C-2.3</strong>:
Describes the properties of a magnet (natural and artificial; Earth as a magnet).<br><br>


<strong>S4 LO F 2.3.7</strong>:
The learner will be able to identify magnetic and non-magnetic materials and explain the Earth’s magnetic properties.<br><br>



<strong>C-2.4</strong>:
Demonstrates the rectilinear propagation of light from different sources (natural, artificial, reflecting surfaces), verifies the laws of reflection through manipulation of light sources and objects, and the use of apparatus and artefacts (such as plane and curved mirrors, pinhole camera, kaleidoscope, periscope).<br><br>

<strong>S4 LO F 2.4.8:
The learner will be able to demonstrate understanding of rectilinear propagation and reflection of light using diagrams and examples.</strong><br><br>

<strong>Key Focus Area</strong>:
Focus on plane mirrors and straight-line light paths. Avoid curved mirrors, refraction, or complex apparatus unless illustrated.<br><br>



<strong>C-2.5</strong>:
Observes and identifies celestial objects (stars, planets, natural and artificial satellites, constellations, comets) in the night sky using a simple telescope and images/photographs, and explains their role in navigation, calendars, and other phenomena (phases of the moon, eclipse, life on earth).<br><br>

<strong>S4 LO F 2.5.9</strong>:
The learner will be able to identify celestial objects and explain their relevance to navigation, calendars, and natural phenomena.<br><br>

<strong>Key Focus Area</strong>:
Use simple pictorial sequences; avoid complex astronomical terms beyond the syllabus. Limit to observable objects like stars, planets, constellations, and moon phases.<br><br>



<strong>CG-3:
Explores the living world in scientific terms.</strong><br><br>

<strong>C-3.1</strong>:
Describes the diversity of living things observed in the natural surroundings (insects, earthworms, snails, birds, mammals, reptiles, spiders, diverse plants, and fungi), including at a smaller scale (microscopic organisms).<br><br>

<strong>S4 LO F 3.1.10</strong>:
The learner will be able to classify living organisms based on observable features, including microorganisms, insects, plants, and animals.<br><br>




<strong>C-3.2</strong>:
Distinguishes the characteristics of living organisms (need for nutrition, growth and development, need for respiration, response to stimuli, reproduction, excretion, cellular organisation) from non-living things.<br><br>

<strong>S4 LO F 3.2.11:
The learner will be able to differentiate between living and non-living things using features such as nutrition, growth, respiration, and reproduction.</strong><br><br>



<strong>C-3.3</strong>:
Analyses patterns of relationships between living organisms and their environments in terms of dependence on and response to each other.<br><br>

<strong>S4 LO F 3.3.12:
The learner will be able to analyse simple interdependence between living organisms and their environment.</strong><br><br>

<strong>Key Focus Area</strong>:
Use clear cause-and-effect relationships (e.g., predator-prey, pollination, food chains). Avoid complex ecosystems or biogeochemical cycles.<br><br>



<strong>C-3.4</strong>:
Explains the conditions suitable for sustaining life on Earth and other planets (atmosphere, suitable temperature-pressure, light, properties of water).<br><br>

<strong>S4 LO F 3.4.13</strong>:
The learner will be able to explain the conditions necessary to support life on Earth and evaluate the possibility of similar conditions on other planets.<br><br>



<strong>C-4.1</strong>:
Understand the importance of hygiene and sanitation for health.<br><br>

<strong>S4 LO F 4.1.14</strong>:
The learner will be able to identify the importance of hygiene, sanitation, and personal habits in maintaining good health.<br><br>



<strong>C-4.2</strong>:
Examines different dimensions of diversity of food — sources, nutrients, climatic conditions, and diets.<br><br>

<strong>S4 LO F 4.2.15:
The learner will be able to examine the diversity in food habits and diets based on climate, region, and nutritional requirements.</strong><br><br>


<strong>C-4.3</strong>:
Describes biological changes (growth, hormonal) during adolescence, and measures to ensure overall well-being.<br><br>

<strong>S4 LO F 4.3.16</strong>:
The learner will be able to describe the biological and emotional changes during adolescence and identify practices that support overall well-being.<br><br>



<strong>C-4.4</strong>:
Recognises and discusses substance abuse, viewing school as a safe space to raise these concerns.<br><br>

<strong>S4 LO F 4.4.17</strong>:
The learner will be able to recognise the harmful effects of substance use and identify safe practices that promote health and well-being.<br><br>



<strong>CG-5</strong>:
Understands the interface of Science, Technology, and Society.<br><br>

<strong>C-5.1</strong>:
Illustrates how Science and Technology can help to improve the quality of human life (health care, communication, transportation, food security, mitigation of climate change, judicious consumption of resources, applications of artificial satellites) as well as some of the harmful uses of science in history.<br><br>

<strong>S4 LO F 5.1.18:
The learner will be able to identify applications of science and technology that have improved or harmed the quality of life in areas like health, energy, and communication.</strong><br><br>

<strong>Key Focus Area</strong>:
Ensure examples are age-appropriate and balanced (e.g., vaccination, pollution from vehicles). Avoid controversial topics or technologies unfamiliar at this stage.<br><br>



<strong>C-5.2</strong>:
Shares views on news and articles related to the impact that Science/Technology and society have on each other.<br><br>

<strong>S4 LO F 5.2.19</strong>:
The learner will be able to interpret simple news items or articles to identify the mutual impact of science, technology, and society.<br><br>




<strong>CG-6</strong>:
Explores the nature and processes of Science through engaging with the evolution of scientific knowledge and conducting scientific inquiry.<br><br>

<strong>C-6.1</strong>:
Illustrates how scientific knowledge and ideas have changed over time (description of the motion of objects and planets, spontaneous generation of life, number of planets) and identifies the scientific values that are inherent and common across the evolution of scientific knowledge (scientific temper, Science as a collective endeavour, conserving biodiversity and ecosystems).<br><br>

<strong>S4 LO F 6.1.20</strong>:
The learner will be able to recognise how scientific ideas have changed over time and explain values such as inquiry, objectivity, and collaboration in science.<br><br>


<strong>C-6.2</strong>:
Formulates questions using scientific terminology (to identify possible causes for an event, patterns, or behaviour of objects) and collects data as evidence (through observation of the natural environment, design of simple experiments, or use of simple scientific instruments).<br><br>

<strong>S4 LO F 6.2.21:
The learner will be able to identify scientific questions related to everyday phenomena and select appropriate ways to investigate them using basic observations or tools.</strong><br><br>

<strong>Key Focus Area</strong>:
Limit investigations to observable and explainable daily-life phenomena (e.g., boiling, melting, rusting, motion). Avoid experimental setups or tools that go beyond what can be inferred or imagined by learners.<br><br>



<strong>CG-7</strong>:
Communicates questions, observations, and conclusions related to Science.<br><br>

<strong>C-7.1</strong>:
Uses scientific vocabulary to communicate Science accurately in oral and written form, and through visual representation.<br><br>

<strong>S4 LO F 7.1.22<:
The learner will be able to interpret or select correct diagrams, labelled drawings, or data tables to represent scientific concepts.</strong><br><br>



<strong>C-7.2</strong>:
Designs and builds simple models to demonstrate scientific concepts.<br><br>

<strong>S4 LO F 7.2.23</strong>:
The learner will be able to identify suitable models or analogies to represent scientific processes and explain their usefulness.<br><br>



<strong>C-7.3</strong>:
Represents real-world events and relationships through diagrams and simple mathematical representations.<br><br>

<strong>S4 LO F 7.3.24:
The learner will be able to interpret or construct simple visual or mathematical representations of real-world scientific relationships.</strong><br><br>

<strong>Key Focus Area</strong>:
Focus on basic visual representations like bar graphs, pie charts, flowcharts, or simple algebraic expressions. Avoid complex equations or multi-variable data.<br><br>



<strong>CG-8</strong>:
Understands and appreciates the contribution of India through history and the present times to the overall field of Science, including the disciplines that constitute it.<br><br>

<strong>C-8.1</strong>:
Knows and explains the significant contributions of India to all matters (concepts, explanations, methods) that are studied within the curriculum in an integrated manner.<br><br>

<strong>S4 LO F 8.1.25</strong>:
The learner will be able to identify important contributions made by Indian scientists and thinkers across various scientific fields.<br><br>



<strong>CG-9</strong>:
Develops awareness of the most current discoveries, ideas, and frontiers in all areas of scientific knowledge in order to appreciate that Science is ever evolving and that there are still many unanswered questions.<br><br>

<strong>C-9.1</strong>:
States concepts that represent the most current understanding of the matter being studied — ranging from mere familiarity to conceptual understanding of the matter as appropriate to the developmental stage of the students.<br><br>

<strong>S4 LO F 9.1.26</strong>:
The learner will be able to state examples of recent scientific discoveries and explain that science is an evolving field with unanswered questions.<br><br>



<strong>C-9.2</strong>:
States questions related to matters in the curriculum for which current scientific understanding is well-recognised to be inadequate.<br><br>

<strong>S4 LO F 9.2.27:
The learner will be able to identify scientific questions that remain unanswered or open to investigation in current scientific understanding.</strong><br><br>

<strong>Key Focus Area</strong>:
Use scientifically valid and developmentally appropriate examples of open questions (e.g., the possibility of life on other planets, unanswered questions about the universe). Avoid speculative ideas without a basis in science or those requiring advanced knowledge beyond the middle stage.<br><br>



      `,


    7: `
      <strong>CG-1</strong>:
Explores the world of matter and its constituents, properties, and behaviour.<br><br>

<strong>C-1.1</strong>:
Classifies matter based on observable physical (solid, liquid, gas, shape, volume, density, transparent, opaque, translucent, magnetic, non-magnetic, conducting, non-conducting) and chemical (pure, impure; acid, base; metal, non-metal; element, compound) characteristics.<br><br>

<strong>S4 LO G 1.1.1</strong>:
The learner will be able to classify materials based on physical states and properties such as shape, density, transparency, and conductivity.<br><br>

<strong>S4 LO G 1.1.2:
The learner will be able to differentiate materials as pure/impure and identify them as acids, bases, metals, non-metals, elements, or compounds.</strong><br><br>



<strong>C-1.2</strong>:
Describes changes in matter (physical and chemical) and uses particulate nature to represent the properties of matter and the changes.<br><br>

<strong>S4 LO G 1.2.3</strong>:
The learner will be able to identify key differences between physical and chemical changes using examples.<br><br>

<strong>S4 LO G 1.2.4:
The learner will be able to use the particulate model of matter to explain phase change, mixing, and chemical reactions.</strong><br><br>

<strong>Key Focus Area</strong>:
Prioritise simple diagrams or text descriptions for particle-level reasoning.<br><br>



<strong>C-1.3</strong>:
Explains the importance of measurement and measures physical properties of matter (such as volume, weight, temperature, density) in indigenous, non-standard, and standard units using simple instruments.<br><br>

<strong>S4 LO G 1.3.5</strong>:
The learner will be able to identify and choose appropriate tools and units to measure volume, mass, and temperature.<br><br>

<strong>S4 LO G 1.3.6:
The learner will be able to calculate and compare density using data from tables or images.</strong><br><br>



<strong>C-1.4</strong>:
Observes and explains the phenomena caused due to differences in pressure, temperature, and density (e.g., breathing, sinking-floating, water pumps in homes, cooling of things, formation of winds).<br><br>

<strong>S4 LO G 1.4.7</strong>:
The learner will be able to explain phenomena such as floating, siphoning, or heating using concepts of pressure and temperature differences.<br><br>

<strong>S4 LO G 1.4.8</strong>:
The learner will be able to apply knowledge of density and pressure to explain everyday applications (e.g., hot air balloons, vacuum flasks).<br><br>

<strong>Key Focus Area</strong>:
One context per item; avoid multi-causal scenarios.<br><br>



<strong>CG-2</strong>:
Explores the physical world in scientific and mathematical terms.<br><br>

<strong>C-2.1</strong>:
Describes one-dimensional motion (uniform, non-uniform, horizontal, vertical) using physical measurements (position, speed, and changes in speed) through mathematical and diagrammatic representations.<br><br>

    <strong>S4 LO G 2.1.9</strong>:
The learner will be able to calculate speed and distance in uniform and non-uniform motion.<br><br>

<strong>S4 LO G 2.1.10:
The learner will be able to interpret position-time and speed-time graphs to describe motion.</strong><br><br>

<strong>Key Focus Area</strong>:
Limit to 1D straight-line motion.<br><br>



<strong>C-2.2</strong>:
Describes how electricity works through manipulating different elements in simple circuits and demonstrates the heating and magnetic effects of electricity.<br><br>

<strong>S4 LO G 2.2.11:
The learner will be able to identify series and parallel circuits and predict the effects of circuit changes.</strong><br><br>

<strong>S4 LO G 2.2.12</strong>:
The learner will be able to explain the heating and magnetic effects of current in simple applications.<br><br>



<strong>C-2.3</strong>:
Describes the properties of a magnet (natural and artificial; Earth as a magnet).<br><br>

<strong>S4 LO G 2.3.13</strong>:
The learner will be able to compare natural and artificial magnets and describe the uses of electromagnets.<br><br>

<strong>S4 LO G 2.3.14:
The learner will be able to describe Earth as a magnet and relate it to compass-based navigation.</strong><br><br>



<strong>C-2.4</strong>:
Demonstrates the rectilinear propagation of light from different sources (natural, artificial, reflecting surfaces), verifies the laws of reflection through manipulation of light sources and objects, and the use of apparatus and artefacts (such as plane and curved mirrors, pinhole camera, kaleidoscope, periscope).<br><br>

<strong>S4 LO G 2.4.15:
The learner will be able to trace ray diagrams for reflection and identify real-life examples using plane mirrors.</strong><br><br>

<strong>S4 LO G 2.4.16</strong>:
The learner will be able to explain how devices like kaleidoscopes or periscopes use principles of light.<br><br>



<strong>C-2.5</strong>:
Observes and identifies celestial objects (stars, planets, natural and artificial satellites, constellations, comets) in the night sky using a simple telescope and images/photographs, and explains their role in navigation, calendars, and other phenomena (phases of the moon, eclipse, life on earth).<br><br>

<strong>S4 LO G 2.5.17</strong>:
The learner will be able to identify major celestial objects and describe their observable features.<br><br>

<strong>S4 LO G 2.5.18</strong>:
The learner will be able to explain how celestial bodies influence phenomena like eclipses and moon phases.<br><br>

<strong>Key Focus Area</strong>:
Use realistic diagrams or photographs. Avoid advanced astronomy.<br><br>


<strong>CG-3</strong>:
Explores the living world in scientific terms.<br><br>

<strong>C-3.1</strong>:
Describes the diversity of living things observed in the natural surroundings (insects, earthworms, snails, birds, mammals, reptiles, spiders, diverse plants, and fungi), including at a smaller scale (microscopic organisms).<br><br>

<strong>S4 LO G 3.1.19</strong>:
The learner will be able to classify organisms into kingdoms and phyla based on structural features.<br><br>

<strong>S4 LO G 3.1.20</strong>:
The learner will be able to describe essential life processes and distinguish them from non-living systems.<br><br>



<strong>C-3.2</strong>:
Distinguishes the characteristics of living organisms (need for nutrition, growth and development, need for respiration, response to stimuli, reproduction, excretion, cellular organisation) from non-living things.<br><br>

    <strong>S4 LO G 3.2.21</strong>:
The learner will be able to describe essential life processes and distinguish them from non-living systems.<br><br>



<strong>C-3.3</strong>:
Analyses patterns of relationships between living organisms and their environments in terms of dependence on and response to each other.<br><br>

<strong>S4 LO G 3.3.22:
The learner will be able to analyse relationships in food chains and food webs, including roles like producers and decomposers.</strong><br><br>

<strong>Key Focus Area</strong>:
Use simple food web diagrams or case studies.<br><br>




<strong>C-3.4</strong>:
Explains the conditions suitable for sustaining life on Earth and other planets (atmosphere, suitable temperature-pressure, light, properties of water).<br><br>

<strong>S4 LO G 3.4.23</strong>:
The learner will be able to compare Earth’s life-supporting conditions with those of other planets.<br><br>



<strong>C-4.1</strong>:
Understands the importance of hygiene and sanitation for health.<br><br>

<strong>S4 LO G 4.1.24</strong>:
The learner will be able to identify practices that promote hygiene and prevent disease in home and public spaces.<br><br>



<strong>C-4.2</strong>:
Examines different dimensions of diversity of food — sources, nutrients, climatic conditions, and diets.<br><br>

<strong>S4 LO G 4.2.25</strong>:
The learner will be able to classify foods by sources and nutrients and relate them to regional diets.<br><br>

<strong>S4 LO G 4.2.26:
The learner will be able to analyse how climate and availability affect diet diversity and food choices.</strong><br><br>



<strong>C-4.3</strong>:
Describes biological changes (growth, hormonal) during adolescence, and measures to ensure overall well-being.<br><br>

<strong>S4 LO G 4.3.27</strong>:
The learner will be able to describe physical, emotional, and hormonal changes during adolescence.<br><br>

<strong>S4 LO G 4.3.28</strong>:
The learner will be able to identify ways to maintain physical and emotional well-being during adolescence.<br><br>


<strong>C-4.4</strong>:
Recognises and discusses substance abuse, viewing school as a safe space to raise these concerns.<br><br>

<strong>S4 LO G 4.4.29</strong>:
The learner will be able to recognise the harmful effects of substance use and identify safe practices and support systems.<br><br>


<strong>CG-5</strong>:
Understands the interface of Science, Technology, and Society.<br><br>

<strong>C-5.1</strong>:
Illustrates how Science and Technology can help to improve the quality of human life (health care, communication, transportation, food security, mitigation of climate change, judicious consumption of resources, applications of artificial satellites) as well as some of the harmful uses of science in history.<br><br>

<strong>S4 LO G 5.1.30</strong>:
The learner will be able to identify technological applications in daily life that improve quality of life (e.g., health care, transport).<br><br>

<strong>S4 LO G 5.1.31:
The learner will be able to evaluate examples of harmful or unintended effects of technology on the environment or society.</strong><br><br>

<strong>Key Focus Area</strong>:
Ensure familiarity with context (e.g., water pollution, misuse of plastics).<br><br>



<strong>C-5.2</strong>:
Shares views on news and articles related to the impact that Science/Technology and society have on each other.<br><br>

<strong>S4 LO G 5.2.32</strong>:
The learner will be able to interpret news headlines or short articles to identify claims related to science and technology.<br><br>

<strong>Key Focus Area</strong>:
Avoid sensational claims. Use articles with clear scientific content.<br><br>



<strong>CG-6</strong>:
Explores the nature and processes of Science through engaging with the evolution of scientific knowledge and conducting scientific inquiry.<br><br>

<strong>C-6.1</strong>:
Illustrates how scientific knowledge and ideas have changed over time (description of the motion of objects and planets, spontaneous generation of life, number of planets) and identifies the scientific values that are inherent and common across the evolution of scientific knowledge (scientific temper, Science as a collective endeavour, conserving biodiversity and ecosystems).<br><br>

<strong>S4 LO G 6.1.33:
The learner will be able to compare past and present scientific explanations (e.g., spontaneous generation vs germ theory) and identify underlying scientific values.</strong><br><br>



<strong>C-6.2</strong>:
Formulates questions using scientific terminology (to identify possible causes for an event, patterns, or behaviour of objects) and collects data as evidence (through observation of the natural environment, design of simple experiments, or use of simple scientific instruments).<br><br>

<strong>S4 LO G 6.2.34</strong>:
The learner will be able to frame investigable scientific questions based on everyday observations.<br><br>

<strong>S4 LO G 6.2.35:
The learner will be able to select suitable evidence types (e.g., data, graphs, prior knowledge) to support or refute a scientific claim.</strong><br><br>

<strong>Key Focus Area</strong>:
Avoid experimental design questions. Use observational or comparative data scenarios.<br><br>



<strong>CG-7</strong>:
Communicates questions, observations, and conclusions related to Science.<br><br>

<strong>C-7.1</strong>:
Uses scientific vocabulary to communicate Science accurately in oral and written form, and through visual representation.<br><br>


<strong>S4 LO G 7.1.36</strong>:
The learner will be able to interpret and use scientific terms accurately in written or visual formats (labels, captions, descriptions).<br><br>



<strong>C-7.2</strong>:
Designs and builds simple models to demonstrate scientific concepts.<br><br>
<strong>S4 LO G 7.1.37</strong>:The learner will be able to match simple models or analogies to the concepts they represent (e.g., pump-heart, sieve-kidney).<br><br>
    


<strong>C-7.3</strong>:
Represents real-world events and relationships through diagrams and simple mathematical representations.<br><br>
<strong>S4 LO G 7.3.38:
The learner will be able to analyse scientific data using diagrams, graphs, or simple calculations (ratios, averages).</strong><br><br>
<strong>Key Focus Area</strong>:
Avoid derivations. Use real-life problem contexts (e.g., temperature changes, rainfall graphs).<br><br>


<strong>CG-8</strong>:
Understands and appreciates the contribution of India through history and the present times to the overall field of Science, including the disciplines that constitute it.<br><br>
<strong>C-8.1</strong>:
Knows and explains the significant contributions of India to all matters (concepts, explanations, methods) that are studied within the curriculum in an integrated manner.<br><br>
<strong>S4 LO G 8.1.39</strong>:
The learner will be able to identify contributions of Indian scientists or traditions in the fields of mathematics, astronomy, medicine, and the environment.<br><br>
<strong>Key Focus Area</strong>:
Include both historical and post-independence examples (e.g., Aryabhata, Dr. Kalam, ISRO).<br><br>

<hr/>
<strong>CG-9</strong>:
Develops awareness of the most current discoveries, ideas, and frontiers in all areas of scientific knowledge in order to appreciate that Science is ever evolving and that there are still many unanswered questions.<br><br>




<strong>C-9.1</strong>:
States concepts that represent the most current understanding of the matter being studied — ranging from mere familiarity to conceptual understanding of the matter as appropriate to the developmental stage of the students.<br><br>

<strong>S4 LO G 9.1.40</strong>:
The learner will be able to describe selected examples of recent discoveries in physics, biology, or space science that impact daily life.<br><br>

<strong>C-9.2</strong>:
States questions related to matters in the curriculum for which current scientific understanding is well-recognised to be inadequate.<br><br>

<strong>S4 LO G 9.2.41:
The learner will be able to identify scientific questions that are under active research or remain unanswered (e.g., origin of life, dark matter).</strong><br><br>

<strong>Key Focus Area</strong>:
Avoid speculative or controversial ideas. Use only age-appropriate, well-recognised scientific gaps.<br><br>

      `,

      8: `
        <strong>CG-1</strong>:
Explores the world of matter and its constituents, properties, and behaviour.<br><br>

<strong>C-1.1</strong>:
Classifies matter based on observable physical (solid, liquid, gas, shape, volume, density, transparent, opaque, translucent, magnetic, non-magnetic, conducting, non-conducting) and chemical (pure, impure; acid, base; metal, non-metal; element, compound) characteristics.<br><br>

<strong>S4 LO H 1.1.1</strong>:
The learner will be able to classify substances using advanced physical and chemical properties (e.g., solubility, reactivity with acid, thermal conductivity).<br><br>

<strong>S4 LO H 1.1.2:
The learner will be able to distinguish between elements, compounds, and mixtures using composition, separation techniques, and properties.</strong><br><br>



<strong>C-1.2:
Describes changes in matter (physical and chemical) and uses particulate nature to represent the properties of matter and the changes.</strong><br><br>


<strong>S4 LO H 1.2.4</strong>:
The learner will be able to explain changes in matter using particle models for different states and reaction types.<br><br>

<strong>Key Focus Area</strong>:
Use simplified particle diagrams and real-world examples like rusting, burning, and dissolving.<br><br>


<strong>C-1.3</strong>:
Explains the importance of measurement and measures physical properties of matter (such as volume, weight, temperature, density) in indigenous, non-standard, and standard units using simple instruments.<br><br>

<strong>S4 LO H 1.3.5</strong>:
The learner will be able to choose the correct tools and units to measure and compare properties like mass, temperature, and volume.<br><br>

<strong>S4 LO H 1.3.6</strong>:
The learner will be able to interpret data to compare densities and predict float/sink behaviour in different liquids.<br><br>



<strong>C-1.4</strong>:
Observes and explains the phenomena caused due to differences in pressure, temperature, and density (e.g., breathing, sinking-floating, water pumps in homes, cooling of things, formation of winds).<br><br>

<strong>S4 LO H 1.4.7:
The learner will be able to explain phenomena such as convection currents, breathing, and lift in aircraft using differences in pressure and density.</strong><br><br>

<strong>Key Focus Area</strong>:
Keep one phenomenon per question; use relatable scenarios only.<br><br>



<strong>CG-2</strong>:
Explores the physical world in scientific and mathematical terms.<br><br>

<strong>C-2.1</strong>:
Describes one-dimensional motion (uniform, non-uniform, horizontal, vertical) using physical measurements (position, speed, and changes in speed) through mathematical and diagrammatic representations.<br><br>

<strong>S4 LO H 2.1.8</strong>:
The learner will be able to calculate average speed and interpret motion using position-time and velocity-time graphs.<br><br>

<strong>S4 LO H 2.1.9:
The learner will be able to analyse differences between uniform and accelerated motion using numerical and visual data.</strong><br><br>



<strong>C-2.2</strong>:
Describes how electricity works through manipulating different elements in simple circuits and demonstrates the heating and magnetic effects of electricity.<br><br>

<strong>S4 LO H 2.2.10</strong>:
The learner will be able to explain the role of conductors, insulators, and components in simple circuits and series-parallel arrangements.<br><br>

<strong>S4 LO H 2.2.11</strong>:
The learner will be able to identify everyday applications of heating and magnetic effects of electric current.<br><br>



<strong>C-2.3</strong>:
Describes the properties of a magnet (natural and artificial; Earth as a magnet).<br><br>

<strong>S4 LO H 2.3.12</strong>:
The learner will be able to compare natural and artificial magnets and explain the principles of magnetic attraction and repulsion.<br><br>

<strong>S4 LO H 2.3.13</strong>:
The learner will be able to relate Earth’s magnetic field to compass use and magnetic navigation.<br><br>



<strong>C-2.4</strong>:
Demonstrates the rectilinear propagation of light from different sources (natural, artificial, reflecting surfaces), verifies the laws of reflection through manipulation of light sources and objects, and the use of apparatus and artefacts (such as plane and curved mirrors, pinhole camera, kaleidoscope, periscope).<br><br>

<strong>S4 LO H 2.4.14</strong>:
The learner will be able to trace the path of light rays through mirrors and explain image formation using ray diagrams.<br><br>

<strong>S4 LO H 2.4.15:
The learner will be able to apply the laws of reflection in practical devices like periscopes or kaleidoscopes.</strong><br><br>



<strong>C-2.5</strong>:
Observes and identifies celestial objects (stars, planets, natural and artificial satellites, constellations, comets) in the night sky using a simple telescope and images/photographs, and explains their role in navigation, calendars, and other phenomena (phases of the moon, eclipse, life on earth).<br><br>

<strong>S4 LO H 2.5.16</strong>:
The learner will be able to identify celestial bodies and their roles in navigation, seasons, and calendars.<br><br>

<strong>S4 LO H 2.5.17</strong>:
The learner will be able to explain phenomena like lunar eclipse, phases of the moon, and visibility of comets.<br><br>

<strong>Key Focus Area</strong>:
Use visual-based MCQs. Avoid speculative astrophysics.<br><br>



<strong>CG-3</strong>:
Explores the living world in scientific terms.<br><br>

<strong>C-3.1</strong>:
Describes the diversity of living things observed in the natural surroundings (insects, earthworms, snails, birds, mammals, reptiles, spiders, diverse plants, and fungi), including at a smaller scale (microscopic organisms).<br><br>

<strong>S4 LO H 3.1.18</strong>:
The learner will be able to classify plants and animals into groups based on body structure, reproduction, and habitat.<br><br>



<strong>C-3.2</strong>:
Distinguishes the characteristics of living organisms (need for nutrition, growth and development, need for respiration, response to stimuli, reproduction, excretion, cellular organisation) from non-living things.<br><br>

<strong>S4 LO H 3.2.19</strong>:
The learner will be able to distinguish between living and non-living using functions like respiration, excretion, and reproduction.<br><br>

<strong>S4 LO H 3.2.20:
The learner will be able to analyse how cellular organisation supports essential life processes.</strong><br><br>



<strong>C-3.3</strong>:
Analyses patterns of relationships between living organisms and their environments in terms of dependence on and response to each other.<br><br>

<strong>S4 LO H 3.3.21</strong>:
The learner will be able to evaluate interactions like predation, symbiosis, competition, and mutualism in ecosystems.<br><br>

<strong>Key Focus Area</strong>:
Use simple ecological scenarios or case-based MCQs.<br><br>




<strong>C-3.4</strong>:
Explains the conditions suitable for sustaining life on Earth and other planets (atmosphere, suitable temperature-pressure, light, properties of water).<br><br>

<strong>S4 LO H 3.4.22</strong>:
The learner will be able to compare environmental conditions on Earth and other planets to assess habitability.<br><br>



<strong>C-4.1</strong>:
Understands the importance of hygiene and sanitation for health.<br><br>

<strong>S4 LO H 4.1.23</strong>:
The learner will be able to identify the role of personal and community hygiene practices in the prevention of communicable diseases.<br><br>



<strong>C-4.2</strong>:
Examines different dimensions of diversity of food — sources, nutrients, climatic conditions, and diets.<br><br>

<strong>S4 LO H 4.2.24</strong>:
The learner will be able to compare food sources, nutrients, and diet patterns across regions and seasons.<br><br>

<strong>S4 LO H 4.2.25:
The learner will be able to analyse the impact of deficiencies or excesses of specific nutrients on health.</strong><br><br>



<strong>C-4.3</strong>:
Describes biological changes (growth, hormonal) during adolescence, and measures to ensure overall well-being.<br><br>

<strong>S4 LO H 4.3.26</strong>:
The learner will be able to explain physical, emotional, and hormonal changes during adolescence.<br><br>

<strong>S4 LO H 4.3.27</strong>:
The learner will be able to identify habits and practices that promote mental and physical well-being during adolescence.<br><br>



<strong>C-4.4</strong>:
Recognises and discusses substance abuse, viewing school as a safe space to raise these concerns.<br><br>

<strong>S4 LO H 4.4.28</strong>:
The learner will be able to recognise long-term health effects of substance abuse and describe how schools and families can support safe choices.<br><br>



<strong>CG-5</strong>:
Understands the interface of Science, Technology, and Society.<br><br>

<strong>C-5.1</strong>:
Illustrates how Science and Technology can help to improve the quality of human life (health care, communication, transportation, food security, mitigation of climate change, judicious consumption of resources, applications of artificial satellites) as well as some of the harmful uses of science in history.<br><br>

<strong>S4 LO H 5.1.29</strong>:
The learner will be able to identify ways in which science and technology improve areas like health, transport, communication, and disaster management.<br><br>

<strong>S4 LO H 5.1.30:
The learner will be able to evaluate environmental or societal consequences of technology misuse (e.g., e-waste, overuse of fertilizers).</strong><br><br>

<strong>Key Focus Area</strong>:
Provide familiar case contexts; avoid abstract policy-level analysis.<br><br>



<strong>C-5.2</strong>:
Shares views on news and articles related to the impact that Science/Technology and society have on each other.<br><br>

<strong>S4 LO H 5.2.31</strong>:
The learner will be able to analyse how scientific information is presented in media (e.g., news, headlines, visuals) and distinguish fact from opinion.<br><br>

<strong>Key Focus Area</strong>:
Use clearly worded article clips or headlines. Avoid pseudoscience or conspiracy content.<br><br>



<strong>CG-6</strong>:
Explores the nature and processes of Science through engaging with the evolution of scientific knowledge and conducting scientific inquiry.<br><br>

<strong>C-6.1</strong>:
Illustrates how scientific knowledge and ideas have changed over time (description of the motion of objects and planets, spontaneous generation of life, number of planets) and identifies the scientific values that are inherent and common across the evolution of scientific knowledge (scientific temper, Science as a collective endeavour, conserving biodiversity and ecosystems).<br><br>

<strong>S4 LO H 6.1.32:
The learner will be able to compare outdated and current scientific explanations (e.g., geocentric vs heliocentric, classical vs modern atomic models) and explain how knowledge evolves.</strong><br><br>



<strong>C-6.2</strong>:
Formulates questions using scientific terminology (to identify possible causes for an event, patterns, or behaviour of objects) and collects data as evidence (through observation of the natural environment, design of simple experiments, or use of simple scientific instruments).<br><br>

<strong>S4 LO H 6.2.33</strong>:
The learner will be able to formulate scientific questions based on patterns or anomalies in natural or experimental observations.<br><br>

<strong>S4 LO H 6.2.34</strong>:
The learner will be able to evaluate the strength of evidence from graphs, patterns, or observations in supporting scientific claims.<br><br>

<strong>Key Focus Area</strong>:
Avoid requiring learners to design experiments. Limit to selecting or evaluating evidence.<br><br>



<strong>CG-7</strong>:
Communicates questions, observations, and conclusions related to Science.<br><br>

<strong>C-7.1</strong>:
Uses scientific vocabulary to communicate Science accurately in oral and written form, and through visual representation.<br><br>

<strong>S4 LO H 7.1.35</strong>:
The learner will be able to interpret scientific terms, labels, and diagrams to explain processes or relationships.<br><br>

<strong>C-7.2</strong>:
Designs and builds simple models to demonstrate scientific concepts.<br><br>

<strong>S4 LO H 7.2.36</strong>:
The learner will be able to match scientific models or analogies (e.g., nucleus-solar system, sieve-kidney) to their functions and limitations.<br><br>

<hr/>

<strong>C-7.3</strong>:
Represents real-world events and relationships through diagrams and simple mathematical representations.<br><br>

<strong>S4 LO H 7.3.37:
The learner will be able to interpret scientific data using ratios, averages, graphs, and flowcharts to explain a natural event or pattern.</strong><br><br>


<strong>CG-8</strong>:
Understands and appreciates the contribution of India through history and the present times to the overall field of Science, including the disciplines that constitute it.<br><br>

<strong>C-8.1</strong>:
Knows and explains the significant contributions of India to all matters (concepts, explanations, methods) that are studied within the curriculum in an integrated manner.<br><br>

<strong>S4 LO H 8.1.38</strong>:
The learner will be able to identify and describe major Indian contributions in medicine, metallurgy, mathematics, astronomy, and environmental science.<br><br>

<strong>Key Focus Area</strong>:
Include both classical (e.g., Charaka, Aryabhata) and modern (e.g., CV Raman, ISRO) contributions.<br><br>



<strong>CG-9</strong>:
Develops awareness of the most current discoveries, ideas, and frontiers in all areas of scientific knowledge in order to appreciate that Science is ever evolving and that there are still many unanswered questions.<br><br>

<strong>C-9.1</strong>:
States concepts that represent the most current understanding of the matter being studied — ranging from mere familiarity to conceptual understanding of the matter as appropriate to the developmental stage of the students.<br><br>

<strong>S4 LO H 9.1.39:
The learner will be able to describe recent scientific discoveries or innovations that have global relevance (e.g., mRNA vaccines, gravitational waves).</strong><br><br>


<strong>C-9.2</strong>:
States questions related to matters in the curriculum for which current scientific understanding is well-recognised to be inadequate.<br><br>

<strong>S4 LO H 9.2.40</strong>:
The learner will be able to identify and explain scientific questions that remain unresolved, such as dark matter, antibiotic resistance, or origins of life.<br><br>

<strong>Key Focus Area</strong>:
Avoid speculation. Limit to authentic, research-backed frontiers appropriate for middle schoolers.<br><br>



      `,

  },

  "india-awareness": {

   1: `
    <strong>CG-1: Develops a sense of identity, belonging, and pride in being Indian, and demonstrates responsibility toward shared spaces and public life.</strong><br><br>

<strong>C-1.1:</strong> Identifies national symbols and national days, and understands their basic significance.<br><br>
<strong>S5 LO A 1.1.1:</strong> The learner will be able to recognise national symbols from a given set using key visual or descriptive features.<br><br>
<strong>S5 LO A 1.1.2:</strong> The learner will be able to associate national days with their significance or related individuals using simple cues.<br><br>

<strong>C-1.2:</strong> Recognises responsible behaviours and civic roles in school and community life.<br><br>
<strong>S5 LO A 1.2.3:</strong> The learner will be able to identify responsible behaviours in familiar settings shown through pictures or short scenarios.<br><br>
<strong>S5 LO A 1.2.4:</strong> The learner will be able to distinguish between responsible and irresponsible actions in everyday public or school contexts.<br><br>

<strong>CG-2: Explores and appreciates India’s cultural diversity, heritage, and environment.</strong><br><br>

<strong>C-2.1:</strong> Identifies festivals, food, clothing, and monuments that reflect India’s cultural richness and diversity.<br><br>
<strong>S5 LO A 2.1.5:</strong> The learner will be able to identify familiar cultural elements such as clothing, food, or festivals from across India.<br><br>
<strong>S5 LO A 2.1.6:</strong> The learner will be able to match cultural items like dance forms, buildings, or crafts with their names or associated regions.<br><br>

<strong>C-2.2:</strong> Recognises key natural features, environmental landmarks, and eco-friendly practices relevant to India.<br><br>
<strong>S5 LO A 2.2.7:</strong> The learner will be able to recognise commonly seen natural features such as trees, animals, landforms, or seasonal patterns.<br><br>
<strong>S5 LO A 2.2.8:</strong> The learner will be able to identify environmentally responsible actions in daily situations using visual or written prompts.<br><br>

<strong>CG-3: Learns about inspiring people, stories, and values from India’s past and present.</strong><br><br>

<strong>C-3.1:</strong> Recalls the names, roles, and contributions of important Indian figures from the past and present.<br><br>
<strong>S5 LO A 3.1.9:</strong> The learner will be able to recall the names and roles of notable Indian figures using simple descriptions or visuals.<br><br>

<strong>C-3.2:</strong> Identifies moral values conveyed through Indian stories, folktales, and historical events.<br><br>
<strong>S5 LO A 3.2.10:</strong> The learner will be able to recognise the core moral value expressed in a simple, familiar Indian story or folktale presented through a picture or short sentence.<br><br>



<strong>Class III (C)</strong><br><br>




<strong>CG-1: Builds a sense of rootedness in India by exploring its national identity, symbols, and shared civic values.</strong><br><br>

<strong>C-1.1:</strong> Understands the meaning and significance of national symbols, commemorative days, and civic duties.<br><br>
<strong>S5 LO C 1.1.1:</strong> <strong>The learner will be able to identify national symbols and choose their correct meanings using written or visual options.</strong><br><br>
<strong>Key Focus Area:</strong> Distractors should reflect common misinterpretations (e.g., Ashoka Chakra = peace vs. motion).<br><br>
<strong>S5 LO C 1.1.2:</strong> The learner will be able to match commemorative days with the individuals or events they represent using text or labelled visuals.<br><br>
<strong>Key Focus Area:</strong> Options must clearly distinguish similar-sounding days (e.g., Republic Day vs. Independence Day) using event anchors.<br><br>

<strong>C-1.2:</strong> Recognises and reflects on values and behaviours that promote responsibility in school, community, and public life.<br><br>
<strong>S5 LO C 1.2.3:</strong> The learner will be able to select responsible actions in familiar public or school-based scenarios based on written inputs.<br><br>
<strong>Key Focus Areas:</strong> Include mild dilemmas (e.g., following a rule vs. helping a peer) to test basic ethical judgment.<br><br>
<strong>S5 LO C 1.2.4:</strong> <strong>The learner will be able to recognise values such as honesty, cooperation, or respect illustrated through written or picture-based situations.</strong><br><br>
<strong>Key Focus Area:</strong> Ensure values are not overlapping in tone (e.g., fairness vs. obedience); grounded in the consequence or motive.<br><br>

<strong>CG-2: Develops appreciation for India’s cultural and environmental diversity through regional and national experiences.</strong><br><br>

<strong>C-2.1:</strong> Identifies and compares cultural elements such as language, food, festivals, dress, and art from across India.<br><br>
<strong>S5 LO C 2.1.5:</strong> <strong>The learner will be able to group or match cultural elements such as food, dress, or language with the regions they belong to using written or pictorial prompts.</strong><br><br>
<strong>Key Focus Area:</strong> Use distinctive regional cues; avoid items now widely popular across India (e.g., momos, dosa).<br><br>
<strong>S5 LO C 2.1.6:</strong> The learner will be able to identify Indian festivals and associate them with related customs, regions, or symbols using written or visual inputs.<br><br>
<strong>Key Focus Area:</strong> Avoid culturally overlapping festivals; pair festivals with unique features or rituals only.<br><br>

<strong>C-2.2:</strong> Recognises natural and environmental features of India and connects them to traditions, livelihoods, and sustainable practices.<br><br>
<strong>S5 LO C 2.2.7:</strong> <strong>The learner will be able to identify major physical or ecological features of India using labelled maps, images, or short written descriptions.</strong><br><br>
<strong>S5 LO C 2.2.8:</strong> The learner will be able to select actions that promote environmental responsibility based on written examples or contextual visuals.<br><br>
<strong>Key Focus Area:</strong> Include realistic choices but only partially sustainable to test nuanced reasoning.<br><br>

<strong>CG-3: Learns about inspiring individuals, events, and stories that reflect India’s history, values, and collective memory.</strong><br><br>

<strong>C-3.1:</strong> Recalls key people, events, and stories from India’s past and connects them to values, contributions, or messages.<br><br>
<strong>S5 LO C 3.1.9:</strong> The learner will be able to identify well-known Indian figures and choose the correct description of their contribution from written or visual formats.<br><br>
<strong>S5 LO C 3.1.10:</strong> <strong>The learner will be able to interpret the message or value conveyed in a short written story or historical passage.</strong><br><br>
<strong>Key Focus Area:</strong> Keep passages concise and focused on one dominant theme; avoid distractors with similar emotional tone.<br><br>

<strong>C-3.2:</strong> Recognises the contributions of community heroes, cultural leaders, or knowledge traditions that have shaped Indian society.<br><br>
<strong>S5 LO C 3.2.11:</strong> <strong>The learner will be able to recognise the contribution of a community figure or traditional practice based on written or visual context.</strong><br><br>
<strong>Key Focus Area:</strong> Ensure context is time-anchored (past vs. present utility) and avoid distractors that generalise the value.<br><br>




<strong>Class IV (D)</strong><br><br>


   <strong>CG-1: Builds a sense of rootedness in India by exploring its national identity, symbols, and shared civic values.</strong><br><br>

<strong>C-1.1: Understands the meaning and significance of national symbols, commemorative days, and civic duties.</strong><br><br>
<strong>S5 LO D 1.1.1:</strong> The learner will be able to distinguish between national symbols and other common emblems or logos using written or visual context.<br><br>
<strong>S5 LO D 1.1.2:</strong> <strong>The learner will be able to explain the message or value represented by a national day using written examples.</strong><br><br>

<strong>C-1.2: Recognises and reflects on values and behaviours that promote responsibility in school, community, and public life.</strong><br><br>
<strong>S5 LO D 1.2.3:</strong> The learner will be able to evaluate responsible behaviour in public or school scenarios by selecting the most appropriate action among alternatives.<br><br>
<strong>S5 LO D 1.2.4:</strong> <strong>The learner will be able to identify the civic value demonstrated in a scenario and select the outcome that best reflects it.</strong><br><br>
<strong>Key Focus Area:</strong> Values like honesty vs. obedience can overlap. Scenarios must isolate the target value through consequence, motive, or intent.<br><br>

<strong>CG-2: Develops appreciation for India’s cultural and environmental diversity through regional and national experiences.</strong><br><br>

<strong>C-2.1: Identifies and compares cultural elements such as language, food, festivals, dress, and art from across India.</strong><br><br>
<strong>S5 LO D 2.1.5:</strong> <strong>The learner will be able to compare cultural elements across Indian regions and infer their associated traditions or historical roots.</strong><br><br>
<strong>Key Focus Area:</strong> Avoid regional stereotypes or elements widely used across regions; ensure cues are unique enough for clear grouping.<br><br>
<strong>S5 LO D 2.1.6:</strong> The learner will be able to connect festivals or cultural symbols to their purposes or regional variations using written or visual descriptions.<br><br>

<strong>C-2.2: Recognises natural and environmental features of India and connects them to traditions, livelihoods, and sustainable practices.</strong><br><br>
<strong>S5 LO D 2.2.7:</strong> <strong>The learner will be able to interpret a map or image to identify major landforms, ecological zones, or water bodies and their relevance to human life.</strong><br><br>
<strong>Key Focus Area:</strong> Maps/visuals must include clear legends and avoid geographical features that are visually similar but conceptually different.<br><br>
<strong>S5 LO D 2.2.8:</strong> The learner will be able to classify practices as environment-friendly or harmful based on brief written descriptions.<br><br>

<strong>CG-3: Learns about inspiring individuals, events, and stories that reflect India’s history, values, and collective memory.</strong><br><br>

<strong>C-3.1: Recalls key people, events, and stories from India’s past and connects them to values, contributions, or messages.</strong><br><br>
<strong>S5 LO D 3.1.9:</strong> The learner will be able to match a historical figure with their contribution and its lasting impact as described in written or visual cues.<br><br>
<strong>S5 LO D 3.1.10:</strong> <strong>The learner will be able to interpret the message or moral of a story or historical event and relate it to a given value (e.g., courage, justice).</strong><br><br>
<strong>Key Focus Area:</strong> Each story/passage must communicate one dominant value; distractors must reflect related but incorrect interpretations (e.g., bravery vs. kindness).<br><br>

<strong>C-3.2: Recognises the contributions of community heroes, cultural leaders, or knowledge traditions that have shaped Indian society.</strong><br><br>
<strong>S5 LO D 3.2.11:</strong> <strong>The learner will be able to recognise a traditional knowledge system or community contribution and identify its relevance to present-day life.</strong><br><br>
<strong>Key Focus Area:</strong> Contextualise traditional knowledge in current settings (e.g., herbal remedies, water conservation) to avoid abstract generalisation. Distractors must not generalise the context or confuse the role.<br><br>




<strong>Class V (E)</strong><br><br>



   <strong>CG-1: Builds a sense of rootedness in India by exploring its national identity, symbols, and shared civic values.</strong><br><br>

<strong>C-1.1: Understands the meaning and significance of national symbols, commemorative days, and civic duties.</strong><br><br>
<strong>S5 LO E 1.1.1:</strong> <strong>The learner will be able to interpret visuals or short descriptions to identify the historical, cultural, or constitutional value represented by national symbols or commemorative days.</strong><br><br>
<strong>Key Focus Area:</strong> Avoid symbolic overlaps (e.g., flag = unity vs. sacrifice); ensure contexts clearly point to one dominant value or historical connection (e.g., Ashoka Chakra = motion, Satyamev Jayate = truth as supreme, Republic Day = Constitution enactment).<br><br>
<strong>Example:</strong> Which of the following values is best represented by the <strong>Ashoka Chakra</strong> in the Indian national flag?<br>
<strong>A.</strong> Peace and harmony<br>
<strong>B.</strong> Progress through continuous effort<br>
<strong>C.</strong> Unity in diversity<br>
<strong>D.</strong> Freedom from foreign rule<br><br>

<strong>S5 LO E 1.1.2:</strong> The learner will be able to match national days with their broader societal contribution or legacy using written clues.<br><br>

<strong>C-1.2: Recognises and reflects on values and behaviours that promote responsibility in school, community, and public life.</strong><br><br>
<strong>S5 LO E 1.2.3:</strong> <strong>The learner will be able to evaluate civic actions in given situations and choose the one that best reflects national or constitutional values.</strong><br><br>
<strong>Key Focus Area:</strong> Include dilemmas with multiple plausible actions (e.g., courage vs. obedience).<br><br>

<strong>S5 LO E 1.2.4:</strong> The learner will be able to identify civic values demonstrated in everyday interactions and select consequences that reflect their importance.<br><br>
<strong>Key Focus Area:</strong> Avoid value overlap (e.g., fairness vs. obedience); anchor in outcome or purpose.<br><br>

<strong>CG-2: Develops appreciation for India’s cultural and environmental diversity through regional and national experiences.</strong><br><br>

<strong>C-2.1: Identifies and compares cultural elements such as language, food, festivals, dress, and art from across India.</strong><br><br>
<strong>S5 LO E 2.1.5:</strong> <strong>The learner will be able to compare cultural features across regions and infer how history, geography, or livelihoods influence them.</strong><br>
<strong>Key Focus Area:</strong> Ground cultural variation in real factors (e.g., seasonal food, terrain-linked dress); avoid stereotypes.<br><br>

<strong>S5 LO E 2.1.6:</strong> The learner will be able to associate festivals or traditional practices with the belief or value they represent.<br><br>

<strong>C-2.2: Recognises natural and environmental features of India and connects them to traditions, livelihoods, and sustainable practices.</strong><br><br>
<strong>S5 LO E 2.2.7:</strong> <strong>The learner will be able to interpret maps, visuals, or short descriptions to identify how natural features influence daily life in different Indian contexts.</strong><br>
<strong>Key Focus Area:</strong> Make the human-nature connection explicit (e.g., rivers → irrigation; hills → terracing).<br><br>

<strong>S5 LO E 2.2.8:</strong> The learner will be able to classify practices as sustainable or harmful to the environment based on short written descriptions.<br>
<strong>Key Focus Area:</strong> Include realistic practices that aren't obviously "good" or "bad" (e.g., burning leaves, tube well use).<br><br>

<strong>CG-3: Learns about inspiring individuals, events, and stories that reflect India’s history, values, and collective memory.</strong><br><br>

<strong>C-3.1: Recalls key people, events, and stories from India’s past and connects them to values, contributions, or messages.</strong><br><br>
<strong>S5 LO E 3.1.9:</strong> The learner will be able to connect Indian historical figures with the long-term societal change they contributed to.<br><br>

<strong>S5 LO E 3.1.10:</strong> <strong>The learner will be able to interpret the message of a short story or event and relate it to a value relevant today.</strong><br>
<strong>Key Focus Area:</strong> Avoid values with similar emotional tone (e.g., bravery vs. loyalty); ensure story clarity.<br><br>

<strong>C-3.2: Recognises the contributions of community heroes, cultural leaders, or knowledge traditions that have shaped Indian society.</strong><br><br>
<strong>S5 LO E 3.2.11:</strong> <strong>The learner will be able to identify a traditional Indian practice or knowledge system and explain its relevance to a current societal need.</strong><br><br>





<strong>Class VI (F)</strong><br><br>




<strong>CG-1: Understands India’s national identity, constitutional values, and the roles and responsibilities of active citizenship in a democratic society.</strong><br><br>
<strong>Key Focus Areas:</strong> Constitutional rights and duties, public institutions, diversity and inclusion, civic participation, the rule of law, and democratic decision-making.<br><br>

<strong>C-1.1: Explains the significance of national symbols, commemorative days, and constitutional ideals in shaping Indian identity.</strong><br><br>
<strong>S5 LO F 1.1.1:</strong> <strong>The learner will be able to identify a national symbol and select the constitutional value or principle it represents in a given context.</strong><br><br>
<strong>S5 LO F 1.1.2:</strong> The learner will be able to interpret the message behind a national day and match it with its associated value, event, or legacy.<br><br>

<strong>C-1.2: Evaluates civic actions and public behaviours in everyday contexts using principles of justice, equality, and fraternity.</strong><br><br>
<strong>S5 LO F 1.2.3:</strong> <strong>The learner will be able to evaluate civic choices in public settings and select the action that aligns best with core constitutional principles such as justice, equality, fraternity or liberty.</strong><br><br>
<strong>Key Focus Area:</strong> Scenarios must reflect a clear conflict or dilemma grounded in civic behaviour (e.g., rule adherence vs. individual rights) with answer options mapped distinctly to constitutional ideals.<br><br>

<strong>S5 LO F 1.2.4:</strong> The learner will be able to distinguish responsible civic behaviours from harmful or biased actions in written case-based scenarios.<br><br>

<strong>CG-2: Explores India’s cultural, linguistic, and ecological heritage to appreciate its diversity and examine its relevance to contemporary life.</strong><br><br>
<strong>Key Focus Areas:</strong> Living traditions, languages, art forms, festivals, sustainable practices, regional knowledge systems, and environmental heritage.<br><br>

<strong>C-2.1: Compares cultural, linguistic, and artistic expressions across Indian regions and relates them to historical, geographical, or social contexts.</strong><br><br>
<strong>S5 LO F 2.1.5:</strong> <strong>The learner will be able to compare regional food, language, or dress and infer the environmental or historical reasons behind these differences.</strong><br>
<strong>Key Focus Area:</strong> Avoid visual stereotypes; use cause-effect framing tied to geography/history.<br><br>

<strong>S5 LO F 2.1.6:</strong> The learner will be able to associate festivals or local practices with the cultural values or regional conditions that shaped them.<br><br>

<strong>C-2.2: Recognises traditional ecological knowledge and environmental practices in India and assesses their value for sustainability today.</strong><br><br>
<strong>S5 LO F 2.2.7:</strong> The learner will be able to identify a traditional Indian ecological practice and evaluate its relevance for modern-day sustainability.<br><br>
<strong>S5 LO F 2.2.8:</strong> <strong>The learner will be able to classify actions in school/community settings as environmentally responsible or harmful, using context-based prompts.</strong><br>
<strong>Key Focus Area:</strong> Include both partially responsible and fully unsustainable choices to test reasoning.<br><br>

<strong>CG-3: Engages with people, stories, movements, and knowledge systems from India’s past to interpret their ethical, intellectual, and social contributions to modern India.</strong><br><br>
<strong>Key Focus Areas:</strong> Reformers and thinkers, historical inquiry, freedom movement, traditional knowledge, value systems, scientific and cultural legacies.<br><br>

<strong>C-3.1: Connects the actions and ideas of Indian historical figures, reformers, or institutions with the societal changes they inspired.</strong><br><br>
<strong>S5 LO F 3.1.9:</strong> <strong>The learner will be able to identify a historical Indian figure and link their contribution to a lasting social, political, or ethical impact.</strong><br><br>

<strong>C-3.2: Interprets moral messages, values, or themes from Indian stories, movements, or traditions and relates them to current issues or contexts.</strong><br><br>
<strong>S5 LO F 3.2.10:</strong> <strong>The learner will be able to interpret the value or ethical message from a traditional Indian story and apply it to a present-day situation.</strong><br>
<strong>Key Focus Area:</strong> Avoid moral overlaps in answer choices (e.g., kindness vs. fairness); ensure clarity of story context.<br><br>




<strong>Class VII (G)</strong><br><br>




    <strong>CG-1: Understands India’s national identity, constitutional values, and the roles and responsibilities of active citizenship in a democratic society.</strong><br><br>
<strong>Key Focus Areas:</strong> Constitutional rights and duties, public institutions, diversity and inclusion, civic participation, the rule of law, and democratic decision-making.<br><br>

<strong>C-1.1: Explains the significance of national symbols, commemorative days, and constitutional ideals in shaping Indian identity.</strong><br><br>
<strong>S5 LO G 1.1.1:</strong> <strong>The learner will be able to interpret how the visual elements of a national symbol reflect constitutional values or historical ideas.</strong><br><br>
<strong>S5 LO G 1.1.2:</strong> The learner will be able to analyse the societal relevance of a national day and match it with its underlying principle or historical contribution.<br><br>

<strong>C-1.2: Evaluates civic actions and public behaviours in everyday contexts using core constitutional principles such as justice, liberty, equality, and fraternity.</strong><br><br>
<strong>S5 LO G 1.2.3:</strong> <strong>The learner will be able to assess a civic situation and select the response that best reflects constitutional principles such as justice, equality, liberty, or fraternity in a democratic society.</strong><br><br>
<strong>Key Focus Area:</strong> Scenarios must involve civic dilemmas that require the learner to weigh actions against foundational constitutional values (e.g., loyalty vs. equality, or personal freedom vs. collective good). Options should be clearly mapped to distinct values articulated in the Preamble to ensure conceptual precision.<br><br>

<strong>S5 LO G 1.2.4:</strong> The learner will be able to identify biased, discriminatory, or irresponsible behaviours in a public scenario and select the corrective civic action.<br><br>

<strong>CG-2: Explores India’s cultural, linguistic, and ecological heritage to appreciate its diversity and examine its relevance to contemporary life.</strong><br><br>
<strong>Key Focus Areas:</strong> Living traditions, languages, art forms, festivals, sustainable practices, regional knowledge systems, and environmental heritage.<br><br>

<strong>C-2.1: Compares cultural, linguistic, and artistic expressions across Indian regions and relates them to historical, geographical, or social contexts.</strong><br><br>
<strong>S5 LO G 2.1.5:</strong> <strong>The learner will be able to explain how cultural practices such as language, food, or dress reflect regional history, geography, or migration.</strong><br><br>
<strong>S5 LO G 2.1.6:</strong> The learner will be able to match regional festivals, artistic traditions, or local customs with the social values or beliefs they represent.<br><br>

<strong>C-2.2: Recognises traditional ecological knowledge and environmental practices in India and assesses their value for sustainability today.</strong><br><br>
<strong>S5 LO G 2.2.7:</strong> The learner will be able to assess how a traditional ecological practice contributes to long-term environmental sustainability in modern contexts.<br><br>
<strong>S5 LO G 2.2.8:</strong> <strong>The learner will be able to classify actions as sustainable, partially sustainable, or harmful based on their long-term environmental effects.</strong><br><br>
<strong>Key Focus Area:</strong> Use nuanced choices that reflect real-life complexity (e.g., biodegradable plastic vs. composting).<br><br>

<strong>CG-3: Engages with people, stories, movements, and knowledge systems from India’s past to interpret their ethical, intellectual, and social contributions to modern India.</strong><br><br>
<strong>Key Focus Areas:</strong> Reformers and thinkers, historical inquiry, freedom movement, traditional knowledge, value systems, scientific and cultural legacies.<br><br>

<strong>C-3.1: Connects the actions and ideas of Indian historical figures, reformers, or institutions with the societal changes they inspired.</strong><br><br>
<strong>S5 LO G 3.1.9:</strong> <strong>The learner will be able to link a reformer’s ideas or actions with a lasting change in society, such as legal reform, education, or rights awareness.</strong><br><br>

<strong>C-3.2: Interprets moral messages, values, or themes from Indian stories, movements, or traditions and relates them to current issues or contexts.</strong><br><br>
<strong>S5 LO G 3.2.10:</strong> <strong>The learner will be able to interpret the ethical theme of a historical or cultural story and apply it to a relevant issue in today’s society.</strong><br><br>
<strong>Key Focus Area:</strong> Avoid distractors with overlapping emotional tone (e.g., empathy vs. fairness); story clarity is essential.<br><br>





<strong>Class VIII (H)</strong><br><br>





<strong>CG-1:</strong> Understands India’s national identity, constitutional values, and the roles and responsibilities of active citizenship in a democratic society.<br><br>
<strong>Key Focus Areas:</strong> Constitutional rights and duties, public institutions, diversity and inclusion, civic participation, the rule of law, and democratic decision-making.<br><br>

<strong>C-1.1:</strong> Explains the significance of national symbols, commemorative days, and constitutional ideals in shaping Indian identity.<br><br>
<strong>S5 LO H 1.1.1:</strong> <strong>The learner will be able to interpret the evolution of a national symbol and explain its relevance to contemporary democratic values.</strong><br><br>
<strong>S5 LO H 1.1.2:</strong> The learner will be able to evaluate the historical and present-day significance of a national day and relate it to its societal contribution.<br><br>

<strong>C-1.2:</strong> Critically evaluates civic actions, decisions, and public behaviours using the constitutional principles of justice, liberty, equality, and fraternity, especially in situations involving ethical dilemmas or competing rights.<br><br>
<strong>S5 LO H 1.2.3:</strong> <strong>The learner will be able to analyse civic dilemmas involving competing rights (e.g., liberty vs. equality) and select the course of action that best reflects constitutional reasoning and democratic values.</strong><br><br>
<strong>Key Focus Area:</strong> Scenarios must present clear conflicts between constitutional ideals (e.g., freedom of speech vs. public order, individual liberty vs. equality). Options should reflect varied interpretations, with one aligned to constitutional intent and democratic practice.<br><br>
<strong>S5 LO H 1.2.4:</strong> The learner will be able to identify instances of civic apathy, injustice, or exclusion in written scenarios and select the most constitutionally appropriate and socially responsible response.<br><br>

<strong>CG-2:</strong> Explores India’s cultural, linguistic, and ecological heritage to appreciate its diversity and examine its relevance to contemporary life.<br><br>
<strong>Key Focus Areas:</strong> Living traditions, languages, art forms, festivals, sustainable practices, regional knowledge systems, and environmental heritage.<br><br>

<strong>C-2.1:</strong> Compares cultural, linguistic, and artistic expressions across Indian regions and relates them to historical, geographical, or social contexts.<br><br>
<strong>S5 LO H 2.1.5:</strong> The learner will be able to explain how regional practices evolved by analysing their link to the environment, migration, or historical context.<br><br>
<strong>S5 LO H 2.1.6:</strong> <strong>The learner will be able to interpret the social or ethical values expressed through festivals, art forms, or regional customs.</strong><br><br>
<strong>Key Focus Area:</strong> Avoid fact-based recall; ensure options reflect deeper cultural understanding.<br><br>

<strong>C-2.2:</strong> Recognises traditional ecological knowledge and environmental practices in India and assesses their value for sustainability today.<br><br>
<strong>S5 LO H 2.2.7:</strong> The learner will be able to analyse how a traditional Indian ecological practice addresses a current sustainability concern.<br><br>
<strong>S5 LO H 2.2.8:</strong> <strong>The learner will be able to evaluate community practices or environmental policies for their long-term ecological impact.</strong><br><br>
<strong>Key Focus Area:</strong> Use realistic, complex examples; avoid clearly “correct” greenwashing-type options.<br><br>

<strong>CG-3:</strong> Engages with people, stories, movements, and knowledge systems from India’s past to interpret their ethical, intellectual, and social contributions to modern India.<br><br>
<strong>Key Focus Areas:</strong> Reformers and thinkers, historical inquiry, freedom movement, traditional knowledge, value systems, scientific and cultural legacies.<br><br>

<strong>C-3.1:</strong> Connects the actions and ideas of Indian historical figures, reformers, or institutions with the societal changes they inspired.<br><br>
<strong>S5 LO H 3.1.9:</strong> <strong>The learner will be able to trace how a reformer’s contribution led to long-term societal change in law, education, or equity.</strong><br><br>

<strong>C-3.2:</strong> Interprets moral messages, values, or themes from Indian stories, movements, or traditions and relates them to current issues or contexts.<br><br>
<strong>S5 LO H 3.1.10:</strong> <strong>The learner will be able to interpret layered ethical messages from traditional or historical narratives and apply them to contemporary moral dilemmas.</strong><br><br>
<strong>Key Focus Area:</strong> Avoid generalised values; ensure clarity between closely related ethics (e.g., justice vs. loyalty).<br><br>







    `,
   2: `
   <strong>CG-1: Develops a sense of identity, belonging, and pride in being Indian, and demonstrates responsibility toward shared spaces and public life.</strong><br><br>
<strong>C-1.1:</strong> Identifies national symbols and national days, and understands their basic significance.<br><br>
<strong>S5 LO B 1.1.1:</strong> The learner will be able to explain the basic significance of national symbols using familiar visuals or descriptions.<br><br>
<strong>S5 LO B 1.1.2:</strong> The learner will be able to match national days with related events, individuals, or messages.<br><br>
<strong>C-1.2:</strong> Recognises responsible behaviours and civic roles in school and community life.<br><br>
<strong>S5 LO B 1.2.3:</strong> The learner will be able to select responsible civic actions for school or public settings in given scenarios.<br><br>
<strong>S5 LO B 1.2.4:</strong> The learner will be able to identify the roles and contributions of commonly seen community service providers.<br><br>

<strong>CG-2: Explores and appreciates India’s cultural diversity, heritage, and environment.</strong><br><br>
<strong>C-2.1:</strong> Identifies festivals, food, clothing, and monuments that reflect India’s cultural richness and diversity.<br><br>
<strong>S5 LO B 2.1.5:</strong> The learner will be able to group cultural elements (e.g., food, dress, festivals) with their respective regions.<br><br>
<strong>S5 LO B 2.1.6:</strong> The learner will be able to identify well-known Indian monuments and match them with their names or locations.<br><br>
<strong>C-2.2:</strong> Recognises key natural features, environmental landmarks, and eco-friendly practices relevant to India.<br><br>
<strong>S5 LO B 2.2.7:</strong> The learner will be able to identify major natural features and resources relevant to the Indian context.<br><br>
<strong>S5 LO B 2.2.8:</strong> The learner will be able to choose actions that help conserve natural resources in school or home settings.<br><br>

<strong>CG-3: Learns about inspiring people, stories, and values from India’s past and present.</strong><br><br>
<strong>C-3.1:</strong> Recalls the names, roles, and contributions of important Indian figures from the past and present.<br><br>
<strong>S5 LO B 3.1.9:</strong> The learner will be able to connect key Indian figures with their contributions using short texts or visuals.<br><br>
<strong>C-3.2:</strong> Identifies moral values conveyed through Indian stories, folktales, and historical events.<br><br>
<strong>S5 LO B 3.2.10:</strong> The learner will be able to identify the moral value or lesson conveyed in a familiar Indian folktale or historical event presented through a short written passage or visual cue.<br><br>

    `, 
   3: `
    <strong>CG-1: Builds a sense of rootedness in India by exploring its national identity, symbols, and shared civic values.</strong><br><br>
<strong>C-1.1:</strong> Understands the meaning and significance of national symbols, commemorative days, and civic duties.<br><br>
<strong>S5 LO C 1.1.1:</strong> The learner will be able to identify national symbols and choose their correct meanings using written or visual options.<br><br>
<strong>S5 LO C 1.1.2:</strong> The learner will be able to match commemorative days with the individuals or events they represent using text or labelled visuals.<br><br>
<strong>C-1.2:</strong> Recognises and reflects on values and behaviours that promote responsibility in school, community, and public life.<br><br>
<strong>S5 LO C 1.2.3:</strong> The learner will be able to select responsible actions in familiar public or school-based scenarios based on written inputs.<br><br>
<strong>S5 LO C 1.2.4:</strong> The learner will be able to recognise values such as honesty, cooperation, or respect illustrated through written or picture-based situations.<br><br>

<strong>CG-2: Develops appreciation for India’s cultural and environmental diversity through regional and national experiences.</strong><br><br>
<strong>C-2.1:</strong> Identifies and compares cultural elements such as language, food, festivals, dress, and art from across India.<br><br>
<strong>S5 LO C 2.1.5:</strong> The learner will be able to group or match cultural elements such as food, dress, or language with the regions they belong to using written or pictorial prompts.<br><br>
<strong>S5 LO C 2.1.6:</strong> The learner will be able to identify Indian festivals and associate them with related customs, regions, or symbols using written or visual inputs.<br><br>
<strong>C-2.2:</strong> Recognises natural and environmental features of India and connects them to traditions, livelihoods, and sustainable practices.<br><br>
<strong>S5 LO C 2.2.7:</strong> The learner will be able to identify major physical or ecological features of India using labelled maps, images, or short written descriptions.<br><br>
<strong>S5 LO C 2.2.8:</strong> The learner will be able to select actions that promote environmental responsibility based on written examples or contextual visuals.<br><br>

<strong>CG-3: Learns about inspiring individuals, events, and stories that reflect India’s history, values, and collective memory.</strong><br><br>
<strong>C-3.1:</strong> Recalls key people, events, and stories from India’s past and connects them to values, contributions, or messages.<br><br>
<strong>S5 LO C 3.1.9:</strong> The learner will be able to identify well-known Indian figures and choose the correct description of their contribution from written or visual formats.<br><br>
<strong>S5 LO C 3.1.10:</strong> The learner will be able to interpret the message or value conveyed in a short written story or historical passage.<br><br>
<strong>C-3.2:</strong> Recognises the contributions of community heroes, cultural leaders, or knowledge traditions that have shaped Indian society.<br><br>
<strong>S5 LO C 3.2.11:</strong> The learner will be able to recognise the contribution of a community figure or traditional practice based on written or visual context.<br><br>


    `,
   4: `
    <strong>CG-1: Builds a sense of rootedness in India by exploring its national identity, symbols, and shared civic values.</strong><br><br>

<strong>C-1.1:</strong> Understands the meaning and significance of national symbols, commemorative days, and civic duties.<br><br>
<strong>S5 LO D 1.1.1:</strong> The learner will be able to distinguish between national symbols and other common emblems or logos using written or visual context.<br><br>
<strong>S5 LO D 1.1.2:</strong> The learner will be able to explain the message or value represented by a national day using written examples.<br><br>

<strong>C-1.2:</strong> Recognises and reflects on values and behaviours that promote responsibility in school, community, and public life.<br><br>
<strong>S5 LO D 1.2.3:</strong> The learner will be able to evaluate responsible behaviour in public or school scenarios by selecting the most appropriate action among alternatives.<br><br>
<strong>S5 LO D 1.2.4:</strong> The learner will be able to identify the civic value demonstrated in a scenario and select the outcome that best reflects it.<br><br>

<strong>CG-2: Develops appreciation for India’s cultural and environmental diversity through regional and national experiences.</strong><br><br>

<strong>C-2.1:</strong> Identifies and compares cultural elements such as language, food, festivals, dress, and art from across India.<br><br>
<strong>S5 LO D 2.1.5:</strong> The learner will be able to compare cultural elements across Indian regions and infer their associated traditions or historical roots.<br><br>
<strong>S5 LO D 2.1.6:</strong> The learner will be able to connect festivals or cultural symbols to their purposes or regional variations using written or visual descriptions.<br><br>

<strong>C-2.2:</strong> Recognises natural and environmental features of India and connects them to traditions, livelihoods, and sustainable practices.<br><br>
<strong>S5 LO D 2.2.7:</strong> The learner will be able to interpret a map or image to identify major landforms, ecological zones, or water bodies and their relevance to human life.<br><br>
<strong>S5 LO D 2.2.8:</strong> The learner will be able to classify practices as environment-friendly or harmful based on brief written descriptions.<br><br>

<strong>CG-3: Learns about inspiring individuals, events, and stories that reflect India’s history, values, and collective memory.</strong><br><br>

<strong>C-3.1:</strong> Recalls key people, events, and stories from India’s past and connects them to values, contributions, or messages.<br><br>
<strong>S5 LO D 3.1.9:</strong> The learner will be able to match a historical figure with their contribution and its lasting impact as described in written or visual cues.<br><br>
<strong>S5 LO D 3.1.10:</strong> The learner will be able to interpret the message or moral of a story or historical event and relate it to a given value (e.g., courage, justice).<br><br>

<strong>C-3.2:</strong> Recognises the contributions of community heroes, cultural leaders, or knowledge traditions that have shaped Indian society.<br><br>
<strong>S5 LO D 3.2.11:</strong> The learner will be able to recognise a traditional knowledge system or community contribution and identify its relevance to present-day life.<br><br>

    `,
   5: `
    <strong>CG-1: Builds a sense of rootedness in India by exploring its national identity, symbols, and shared civic values.</strong><br><br>

<strong>C-1.1:</strong> Understands the meaning and significance of national symbols, commemorative days, and civic duties.<br><br>
<strong>S5 LO E 1.1.1:</strong> The learner will be able to interpret visuals or short descriptions to identify the historical, cultural, or constitutional value represented by national symbols or commemorative days.<br><br>
<strong>S5 LO E 1.1.2:</strong> The learner will be able to match national days with their broader societal contribution or legacy using written clues.<br><br>

<strong>C-1.2:</strong> Recognises and reflects on values and behaviours that promote responsibility in school, community, and public life.<br><br>
<strong>S5 LO E 1.2.3:</strong> The learner will be able to evaluate civic actions in given situations and choose the one that best reflects national or constitutional values.<br><br>
<strong>S5 LO E 1.2.4:</strong> The learner will be able to identify civic values demonstrated in everyday interactions and select consequences that reflect their importance.<br><br>

<strong>CG-2: Develops appreciation for India’s cultural and environmental diversity through regional and national experiences.</strong><br><br>

<strong>C-2.1:</strong> Identifies and compares cultural elements such as language, food, festivals, dress, and art from across India.<br><br>
<strong>S5 LO E 2.1.5:</strong> The learner will be able to compare cultural features across regions and infer how history, geography, or livelihoods influence them.<br><br>
<strong>S5 LO E 2.1.6:</strong> The learner will be able to associate festivals or traditional practices with the belief or value they represent.<br><br>

<strong>C-2.2:</strong> Recognises natural and environmental features of India and connects them to traditions, livelihoods, and sustainable practices.<br><br>
<strong>S5 LO E 2.2.7:</strong> The learner will be able to interpret maps, visuals, or short descriptions to identify how natural features influence daily life in different Indian contexts.<br><br>
<strong>S5 LO E 2.2.8:</strong> The learner will be able to classify practices as sustainable or harmful to the environment based on short written descriptions.<br><br>

<strong>CG-3: Learns about inspiring individuals, events, and stories that reflect India’s history, values, and collective memory.</strong><br><br>

<strong>C-3.1:</strong> Recalls key people, events, and stories from India’s past and connects them to values, contributions, or messages.<br><br>
<strong>S5 LO E 3.1.9:</strong> The learner will be able to connect Indian historical figures with the long-term societal change they contributed to.<br><br>
<strong>S5 LO E 3.1.10:</strong> The learner will be able to interpret the message of a short story or event and relate it to a value relevant today.<br><br>

<strong>C-3.2:</strong> Recognises the contributions of community heroes, cultural leaders, or knowledge traditions that have shaped Indian society.<br><br>
<strong>S5 LO E 3.2.11:</strong> The learner will be able to identify a traditional Indian practice or knowledge system and explain its relevance to a current societal need.<br><br>


    `,
   6: `
    <strong>CG-1: Understands India’s national identity, constitutional values, and the roles and responsibilities of active citizenship in a democratic society.</strong><br><br>

<strong>C-1.1:</strong> Explains the significance of national symbols, commemorative days, and constitutional ideals in shaping Indian identity.<br><br>
<strong>S5 LO F 1.1.1:</strong> The learner will be able to identify a national symbol and select the constitutional value or principle it represents in a given context.<br><br>
<strong>S5 LO F 1.1.2:</strong> The learner will be able to interpret the message behind a national day and match it with its associated value, event, or legacy.<br><br>

<strong>C-1.2:</strong> Evaluates civic actions and public behaviours in everyday contexts using principles of justice, equality, and fraternity.<br><br>
<strong>S5 LO F 1.2.3:</strong> The learner will be able to evaluate civic choices in public settings and select the action that aligns best with core constitutional principles such as justice, equality, fraternity or liberty.<br><br>
<strong>S5 LO F 1.2.4:</strong> The learner will be able to distinguish responsible civic behaviours from harmful or biased actions in written case-based scenarios.<br><br>

<strong>CG-2: Explores India’s cultural, linguistic, and ecological heritage to appreciate its diversity and examine its relevance to contemporary life.</strong><br><br>

<strong>C-2.1:</strong> Compares cultural, linguistic, and artistic expressions across Indian regions and relates them to historical, geographical, or social contexts.<br><br>
<strong>S5 LO F 2.1.5:</strong> The learner will be able to compare regional food, language, or dress and infer the environmental or historical reasons behind these differences.<br><br>
<strong>S5 LO F 2.1.6:</strong> The learner will be able to associate festivals or local practices with the cultural values or regional conditions that shaped them.<br><br>

<strong>C-2.2:</strong> Recognises traditional ecological knowledge and environmental practices in India and assesses their value for sustainability today.<br><br>
<strong>S5 LO F 2.2.7:</strong> The learner will be able to identify a traditional Indian ecological practice and evaluate its relevance for modern-day sustainability.<br><br>
<strong>S5 LO F 2.2.8:</strong> The learner will be able to classify actions in school/community settings as environmentally responsible or harmful, using context-based prompts.<br><br>

<strong>CG-3: Engages with people, stories, movements, and knowledge systems from India’s past to interpret their ethical, intellectual, and social contributions to modern India.</strong><br><br>

<strong>C-3.1:</strong> Connects the actions and ideas of Indian historical figures, reformers, or institutions with the societal changes they inspired.<br><br>
<strong>S5 LO F 3.1.9:</strong> The learner will be able to identify a historical Indian figure and link their contribution to a lasting social, political, or ethical impact.<br><br>

<strong>C-3.2:</strong> Interprets moral messages, values, or themes from Indian stories, movements, or traditions and relates them to current issues or contexts.<br><br>
<strong>S5 LO F 3.2.10:</strong> The learner will be able to interpret the value or ethical message from a traditional Indian story and apply it to a present-day situation.<br><br>


    `,
   7: `
    <strong>CG-1: Understands India’s national identity, constitutional values, and the roles and responsibilities of active citizenship in a democratic society.</strong><br><br>

<strong>C-1.1:</strong> Explains the significance of national symbols, commemorative days, and constitutional ideals in shaping Indian identity.<br><br>
<strong>S5 LO G 1.1.1:</strong> The learner will be able to interpret how the visual elements of a national symbol reflect constitutional values or historical ideas.<br><br>
<strong>S5 LO G 1.1.2:</strong> The learner will be able to analyse the societal relevance of a national day and match it with its underlying principle or historical contribution.<br><br>

<strong>C-1.2:</strong> Evaluates civic actions and public behaviours in everyday contexts using core constitutional principles such as justice, liberty, equality, and fraternity.<br><br>
<strong>S5 LO G 1.2.3:</strong> The learner will be able to assess a civic situation and select the response that best reflects constitutional principles such as justice, equality, liberty, or fraternity in a democratic society.<br><br>
<strong>S5 LO G 1.2.4:</strong> The learner will be able to identify biased, discriminatory, or irresponsible behaviours in a public scenario and select the corrective civic action.<br><br>

<strong>CG-2: Explores India’s cultural, linguistic, and ecological heritage to appreciate its diversity and examine its relevance to contemporary life.</strong><br><br>

<strong>C-2.1:</strong> Compares cultural, linguistic, and artistic expressions across Indian regions and relates them to historical, geographical, or social contexts.<br><br>
<strong>S5 LO G 2.1.5:</strong> The learner will be able to explain how cultural practices such as language, food, or dress reflect regional history, geography, or migration.<br><br>
<strong>S5 LO G 2.1.6:</strong> The learner will be able to match regional festivals, artistic traditions, or local customs with the social values or beliefs they represent.<br><br>

<strong>C-2.2:</strong> Recognises traditional ecological knowledge and environmental practices in India and assesses their value for sustainability today.<br><br>
<strong>S5 LO G 2.2.7:</strong> The learner will be able to assess how a traditional ecological practice contributes to long-term environmental sustainability in modern contexts.<br><br>
<strong>S5 LO G 2.2.8:</strong> The learner will be able to classify actions as sustainable, partially sustainable, or harmful based on their long-term environmental effects.<br><br>

<strong>CG-3: Engages with people, stories, movements, and knowledge systems from India’s past to interpret their ethical, intellectual, and social contributions to modern India.</strong><br><br>

<strong>C-3.1:</strong> Connects the actions and ideas of Indian historical figures, reformers, or institutions with the societal changes they inspired.<br><br>
<strong>S5 LO G 3.1.9:</strong> The learner will be able to link a reformer’s ideas or actions with a lasting change in society, such as legal reform, education, or rights awareness.<br><br>

<strong>C-3.2:</strong> Interprets moral messages, values, or themes from Indian stories, movements, or traditions and relates them to current issues or contexts.<br><br>
<strong>S5 LO G 3.2.10:</strong> The learner will be able to interpret the ethical theme of a historical or cultural story and apply it to a relevant issue in today’s society.<br><br>


    `,
   8: `
    <strong>CG-1: Understands India’s national identity, constitutional values, and the roles and responsibilities of active citizenship in a democratic society.</strong><br><br>

<strong>C-1.1:</strong> Explains the significance of national symbols, commemorative days, and constitutional ideals in shaping Indian identity.<br><br>
<strong>S5 LO H 1.1.1:</strong> The learner will be able to interpret the evolution of a national symbol and explain its relevance to contemporary democratic values.<br><br>
<strong>S5 LO H 1.1.2:</strong> The learner will be able to evaluate the historical and present-day significance of a national day and relate it to its societal contribution.<br><br>

<strong>C-1.2:</strong> Critically evaluates civic actions, decisions, and public behaviours using the constitutional principles of justice, liberty, equality, and fraternity, especially in situations involving ethical dilemmas or competing rights.<br><br>
<strong>S5 LO H 1.2.3:</strong> The learner will be able to analyse civic dilemmas involving competing rights (e.g., liberty vs. equality) and select the course of action that best reflects constitutional reasoning and democratic values.<br><br>
<strong>S5 LO H 1.2.4:</strong> The learner will be able to identify instances of civic apathy, injustice, or exclusion in written scenarios and select the most constitutionally appropriate and socially responsible response.<br><br>

<strong>CG-2: Explores India’s cultural, linguistic, and ecological heritage to appreciate its diversity and examine its relevance to contemporary life.</strong><br><br>

<strong>C-2.1:</strong> Compares cultural, linguistic, and artistic expressions across Indian regions and relates them to historical, geographical, or social contexts.<br><br>
<strong>S5 LO H 2.1.5:</strong> The learner will be able to explain how regional practices evolved by analysing their link to the environment, migration, or historical context.<br><br>
<strong>S5 LO H 2.1.6:</strong> The learner will be able to interpret the social or ethical values expressed through festivals, art forms, or regional customs.<br><br>

<strong>C-2.2:</strong> Recognises traditional ecological knowledge and environmental practices in India and assesses their value for sustainability today.<br><br>
<strong>S5 LO H 2.2.7:</strong> The learner will be able to analyse how a traditional Indian ecological practice addresses a current sustainability concern.<br><br>
<strong>S5 LO H 2.2.8:</strong> The learner will be able to evaluate community practices or environmental policies for their long-term ecological impact.<br><br>

<strong>CG-3: Engages with people, stories, movements, and knowledge systems from India’s past to interpret their ethical, intellectual, and social contributions to modern India.</strong><br><br>

<strong>C-3.1:</strong> Connects the actions and ideas of Indian historical figures, reformers, or institutions with the societal changes they inspired.<br><br>
<strong>S5 LO H 3.1.9:</strong> The learner will be able to trace how a reformer’s contribution led to long-term societal change in law, education, or equity.<br><br>

<strong>C-3.2:</strong> Interprets moral messages, values, or themes from Indian stories, movements, or traditions and relates them to current issues or contexts.<br><br>
<strong>S5 LO H 3.1.10:</strong> The learner will be able to interpret layered ethical messages from traditional or historical narratives and apply them to contemporary moral dilemmas.<br><br>
 `,
  }

};

</script>



<!-- Main Logic Script -->

<script>

function getSelectedSubjects() {

  return Array.from(document.querySelectorAll('input[name="subject"]:checked')).map(cb => cb.value);

}



function getSelectedClasses() {

  const allBox = document.getElementById('classAll');

  if (allBox.checked) return "all";

  return Array.from(document.querySelectorAll('.class-specific:checked')).map(cb => cb.value);

}



function showContent() {

  const subjects = getSelectedSubjects();

  const classSelection = getSelectedClasses();

  const contentArea = document.getElementById("contentArea");



  if (!subjects.length) {

    contentArea.innerHTML = "<p>Please select at least one subject.</p>";

    return;

  }



  if (classSelection !== "all" && classSelection.length === 0) {

    contentArea.innerHTML = "<p>Please select at least one class.</p>";

    return;

  }



  let html = "";

  let hasContent = false;



  subjects.forEach(subject => {

    const subjectContent = contentData[subject];

    if (!subjectContent) return;



 html += `<h4 class="subject-heading">${subjectLabels[subject]}</h4><br>`;




   if (classSelection === "all") {
  for (let cls in subjectContent) {
    html += `<h5><b class="class-label-1">Class ${cls}</b></h5><p>${subjectContent[cls]}</p>`;

    hasContent = true;
  }
}
 else {

      classSelection.forEach(cls => {

        if (subjectContent[cls]) {

          html += `<h5><b class="class-label-2">Class ${cls}</b></h5><p class="subject-content">${subjectContent[cls]}</p>`;


          hasContent = true;

        }

      });

    }



    html += `<hr/>`;

  });



  if (!hasContent) {

    html = `<p>No content found for selected combination.</p>`;

  }



  contentArea.innerHTML = html;

}



function initCheckboxLogic() {

  document.querySelectorAll('.class-checkbox').forEach(checkbox => {

    checkbox.addEventListener('change', () => {

      if (checkbox.id === 'classAll' && checkbox.checked) {

        document.querySelectorAll('.class-specific').forEach(cb => cb.checked = false);

      }

      if (checkbox.classList.contains("class-specific") && checkbox.checked) {

        document.getElementById('classAll').checked = false;

      }



      document.querySelectorAll('.checkbox-item').forEach(item => item.classList.remove('active'));

      document.querySelectorAll('.class-checkbox:checked').forEach(cb => {

        cb.closest('.checkbox-item').classList.add('active');

      });



      showContent();

    });

  });



  document.querySelectorAll('input[name="subject"]').forEach(cb => {

    cb.addEventListener('change', () => {

      cb.closest('.member').classList.toggle('active', cb.checked);

      showContent();

    });

  });



  // ✅ Image or card click toggles checkbox

  document.querySelectorAll('.member').forEach(member => {

    member.addEventListener('click', function (e) {

      // Prevent double toggle if checkbox itself clicked

      if (e.target.tagName === 'INPUT') return;



      const checkbox = member.querySelector('.subject-checkbox');

      checkbox.checked = !checkbox.checked;

      member.classList.toggle('active', checkbox.checked);  

      showContent();

    });

  });

}



window.addEventListener("DOMContentLoaded", () => {

  initCheckboxLogic();

  showContent();

});

</script>






<?php include "../footer.php"; ?>


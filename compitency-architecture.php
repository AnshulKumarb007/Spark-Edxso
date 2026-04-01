<?php include "../header.php"; ?>

<style>

  .services-list {

    background-color: #f1f2fa;

    padding: 20px;

    border: 1px solid #ddd;

    border-radius: 5px;

  }
  .CG-10{
    background-color: red;
  }
 
@media (max-width: 768px) {
   #contentArea{
  padding: 0px !important;
  border: none;
}
.en{
  padding: 0px;
}
}

   

    .header-com {
      background-color: #004aad;
      color: white;
      font-size: 20px;
      font-weight: bold;
      padding: 12px 16px;
      border-radius: 15px 15px 0px 0px;
    }

    .cg-line {
      background-color: #D2F1FF;
      font-weight: 600;
      padding: 10px 16px;
      font-size: 18px;
    }

    .c-item {
      background-color: #E5F2FF;
      padding: 10px 16px;
      color: #002060;
      font-size: 16px;
          font-weight: 700;
    }

    .c-item .desc {
      display: block;
      font-weight: normal;
      color: #000;
      margin-top: 5px;
    }

    .s-item {
      background-color: #FFEFE9;
      padding: 8px 16px;
      font-size: 16px;
      border-top: 1px solid #fff;
          font-weight: 500;
    }

    .block {
      margin-bottom: 16px;
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

    /*border: 2px solid #0f8e8e;*/

    background-color: #fff;
   box-shadow: 0px 2px 25px rgba(0, 0, 0, 0.1);

  }



  .member {

    cursor: pointer;

    padding: 10px;

    text-align: center;

    border: 1px solid #ddd; 

    border-radius: 10px;
  }
  .section.member{
    box-shadow: none !important;
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

        "english" => "eng.png",

        "math" => "math.png",

        "evs" => "evs.png",

        "science" => "science.png",

        "india-awareness" => "ia.png"

      ];

      foreach ($subjects as $id => $name): ?>

        <div class="col-xl-2 col-sm-6 col-12 d-flex justify-content-center mb-2 six-reasons">

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

    <div class="row gy-4 justify-content-between mt-3">

      <div class="col-lg-3">

        <h4 style="font-size:18px;">Select Class</h4>

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



      <div class="col-lg-9">

        <h3 style="font-size:20px;">SPARK Language Core Competency Framework</h3>

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
      <div class="container en">
  <div class="header-com">Class 1 - English</div>

  <div class="cg-line">
    CG-10: Children develop fluency in reading and writing in a Language.
  </div>

  <!-- C-10.1 -->
  <div class="c-item">
    C-10.1:Develops phonological awareness and blends phonemes/syllables into words and segments words into phonemes/syllables.
  </div>
  <div class="s-item">S1 LO A 10.1.1: Blends given phonemes in the correct order to form familiar words with consonant blends or digraphs.</div>
  <div class="s-item">S1 LO A 10.1.2: Segments words with consonant blends or digraphs into their phonemes.</div>
  <div class="s-item">S1 LO A 10.1.3: Arranges syllables in the correct order to form familiar multisyllabic words.</div>

  <!-- C-10.2 -->
  <div class="c-item">
    C-10.2:Understands basic structure/format of a book, idea of words in print, and direction in which they are printed, and recognises basic punctuation marks.
  </div>
  <div class="s-item">S1 LO A 10.2.4: Identifies correct punctuation and capitalisation in a short, age-appropriate sentence containing blends or digraphs.</div>

  <!-- C-10.3 -->
  <div class="c-item">
    C-10.3:Recognises all the letters of the alphabet of the script and uses this knowledge to read and write words.
  </div>
  <div class="s-item">S1 LO A 10.3.5: Infers the correct word to complete a meaningful sentence describing a familiar image.</div>
  <div class="s-item">S1 LO A 10.3.6: Spells familiar words with consonant blends or digraphs correctly.</div>
  <div class="s-item">S1 LO A 10.3.7: Classifies given sight words by their correct use in a sentence.</div>

  <!-- C-10.4 -->
  <div class="c-item">
    C-10.4:Reads stories and passages with accuracy and fluency, with appropriate pauses and voice modulation.</div>
 
  <div class="s-item">S1 LO A 10.4.8: Recognises punctuation marks that signal pauses or changes of expression in a sentence (statement, question, or exclamation).</div>
  <div class="s-item">S1 LO A 10.4.9: Determines the sentence that best fits in a short story to maintain its logical flow.</div>

  <!-- C-10.5 -->
  <div class="c-item">
    C-10.5:Reads short stories and comprehends their meaning by identifying characters, storyline, and what the author wanted to say, on their own.
  </div>
  <div class="s-item">S1 LO A 10.5.10: Identifies the central idea in a short, age-appropriate story.</div>
  <div class="s-item">S1 LO A 10.5.11: Identifies the author’s message or purpose in a short, age-appropriate story.</div>
  <div class="s-item">S1 LO A 10.5.12: Infers the meaning of unfamiliar words in short texts using picture clues or the surrounding text.</div>
  <div class="s-item">S1 LO A 10.5.13: Infers answers to “who, what, where, when” questions from an age-appropriate short story with minimal picture support.</div>

  <!-- C-10.6 -->
  <div class="c-item">
    C-10.6
    :Reads short poems and begins to appreciate the poem for its choice of words and imagination.
  </div>
  <div class="s-item">S1 LO A 10.6.14: Identifies the main idea of a short, age-appropriate poem.</div>
  <div class="s-item">S1 LO A 10.6.15: Recognises rhyming words with irregular spelling patterns in a short, age-appropriate poem.</div>
  <div class="s-item">S1 LO A 10.6.16: Identifies imaginative or descriptive words in a short, age-appropriate poem.</div>
  <div class="s-item">S1 LO A 10.6.17: Classifies rhyming pairs with blends, digraphs, or multisyllabic patterns in a word set.</div>

  <!-- C-10.7 -->
  <div class="c-item">
    C-10.7
    :Reads and comprehends the meaning of short news items, instructions and recipes, and publicity material.
  </div>
  <div class="s-item">S1 LO A 10.7.18: Identifies key details in short, simple informational texts such as instructions, labels, or recipes.</div>
  <div class="s-item">S1 LO A 10.7.19: Determines the purpose of a short, simple informational text (e.g., sign, notice, or label).</div>
  <div class="s-item">S1 LO A 10.7.20: Infers steps described in a short instructional text (e.g., recipe, classroom direction).</div>
      <div class="c-item">
  C-10.8:
  Write a paragraph to express their understanding and experience.
</div>
<div class="s-item">S1 LO A 10.8.21: Recognises complete and meaningful sentences within a short paragraph to maintain coherence.</div>
<div class="s-item">S1 LO A 10.8.22: Identifies sentences that logically connect to form a paragraph.</div>
<div class="s-item">S1 LO A 10.8.23: Identifies the best word or phrase to express a given idea.</div>
      </div>

`,

2: `
<div class="container en">
  <div class="header-com">Class 2 - English</div>
  <div class="cg-line">
    CG-10: Children develop fluency in reading and writing in a Language.
  </div>

  <!-- C-10.1 -->
  <div class="c-item">
    C-10.1:
    Develops phonological awareness and blends phonemes/syllables into words and segments words into phonemes/syllables.
  </div>
  <div class="s-item">S1 LO B 10.1.1: Blends phonemes and syllables to form familiar multisyllabic words containing consonant clusters (e.g., spring, crayon).</div>
  <div class="s-item">S1 LO B 10.1.2: Segments familiar multisyllabic words with consonant clusters into their syllables and phonemes in correct sequence.</div>
  <div class="s-item">S1 LO B 10.1.3: Recognises and classifies common compound words in familiar reading texts.</div>
  <div class="s-item">S1 LO B 10.1.4: Determines the correct rhyme to complete familiar multisyllabic words.</div>

  <!-- C-10.2 -->
  <div class="c-item">
    C-10.2:Understands basic structure/format of a book, idea of words in print, and direction in which they are printed, and recognises basic punctuation marks.
  </div>
  <div class="s-item">S1 LO B 10.2.5: Recognises correct use of punctuation marks (full stop, question mark, exclamation mark) in compound or longer sentences.</div>
  <div class="s-item">S1 LO B 10.2.6: Identifies the use of commas to separate items in a short list.</div>
  <div class="s-item">S1 LO B 10.2.7: Recognises correct punctuation and capitalisation in sentences with compound words or clusters.</div>

  <!-- C-10.3 -->
  <div class="c-item">
    C-10.3:Recognises all the letters of the alphabet of the script and uses this knowledge to read and write words.
  </div>
  <div class="s-item">S1 LO B 10.3.8: Identifies letters and their corresponding sounds in unfamiliar longer words with blends, digraphs, or common spelling patterns.</div>
  <div class="s-item">S1 LO B 10.3.9: Applies sound–letter correspondence to read words with blends, digraphs, or common spelling patterns.</div>
  <div class="s-item">S1 LO B 10.3.10: Spells unfamiliar, age-appropriate words with familiar sound patterns such as sh-, ch-, -ng, -ck.</div>
  <div class="s-item">S1 LO B 10.3.11: Distinguishes simple homophones in familiar sentences (e.g., their/there, see/sea).</div>

  <!-- C-10.4 -->
  <div class="c-item">
    C-10.4:Reads stories and passages with accuracy and fluency, with appropriate pauses and voice modulation.
  </div>
  <div class="s-item">S1 LO B 10.4.12: Recognises punctuation marks that indicate where a reader should pause or change intonation in short texts.</div>
  <div class="s-item">S1 LO B 10.4.13: Distinguishes sentence types (statement, question, exclamation) based on their punctuation and meaning.</div>

  <!-- C-10.5 -->
  <div class="c-item">
    C-10.5:Reads short stories and comprehends their meaning by identifying characters, storyline, and what the author wanted to say, on their own.
  </div>
  <div class="s-item">S1 LO B 10.5.: Identifies the main and supporting characters in a short, age-appropriate story with minimal visual cues.</div>
  <div class="s-item">S1 LO B 10.5.15: Determines how the setting influences the sequence of events in a short story.</div>
  <div class="s-item">S1 LO B 10.5.16: Infers the central idea or plot of a short, age-appropriate story with minimal visual cues.</div>
  <div class="s-item">S1 LO B 10.5.17: Infers the author’s message or intent in a short, age-appropriate story.</div>
  <div class="s-item">S1 LO B 10.5.18: Infers why a character took a simple action in a familiar short story using explicit clues.</div>

  <!-- C-10.6 -->
  <div class="c-item">
    C-10.6:Reads short poems and begins to appreciate the poem for its choice of words and imagination.
  </div>
  <div class="s-item">S1 LO B 10.6.19: Identifies the rhyme scheme in a short, age-appropriate poem.</div>
  <div class="s-item">S1 LO B 10.6.20: Determines descriptive or imaginative words in a short, age-appropriate poem.</div>
  <div class="s-item">S1 LO B 10.6.21: Infers the mood or feeling conveyed by a short, age-appropriate poem.</div>
  <div class="s-item">S1 LO B 10.6.22: Infers how a simple descriptive word in a poem helps create a happy or sad feeling.</div>

  <!-- C-10.7 -->
  <div class="c-item">
    C-10.7:Reads and comprehends the meaning of short news items, instructions and recipes, and publicity material.
  </div>
  <div class="s-item">S1 LO B 10.7.23: Identifies key facts in short informational texts such as news items or advertisements.</div>
  <div class="s-item">S1 LO B 10.7.24: Identifies the purpose of a short informational text (e.g., news item, recipe, or advertisement).</div>
  <div class="s-item">S1 LO B 10.7.2: Determines the correct next step in a short instructional text.</div>
  <div class="s-item">S1 LO B 10.7.26: Recognises specific details in short informational texts to answer comprehension questions.</div>

  <!-- C-10.8 -->
  <div class="c-item">
  C-10.8:
  Writes a paragraph to express their understanding and experience.
  </div>
  <div class="s-item">S1 LO B 10.8.27: Identifies the topic sentence of a paragraph with age-appropriate unfamiliar words.</div>
  <div class="s-item">S1 LO B 10.8.28: Identifies supporting details that match a given topic sentence in a paragraph.</div>
  <div class="s-item">S1 LO B 10.8.29: Determines which sentence logically follows in a short paragraph.</div>
  <div class="s-item">S1 LO B 10.8.30: Determines an appropriate concluding sentence for a short paragraph.</div>
</div>
 `,
 3: `<div class="container en">
  <div class="header-com">Class 3 - English</div>

  <div class="cg-line">
    CG-2: Develops the ability to read with comprehension by gaining a basic understanding of different forms of familiar and unfamiliar texts (such as prose and poetry).
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Applies varied comprehension strategies (inferring, predicting, visualising) to understand different texts.
  </div>
  <div class="s-item">S1 LO C 2.1.1: Anticipates what happens next in a short story using text clues.</div>
  <div class="s-item">S1 LO C 2.1.2: Foresees the next event in a poem using rhyme or meaning hints.</div>
  <div class="s-item">S1 LO C 2.1.3: Interprets a character’s feelings from the words spoken.</div>
  <div class="s-item">S1 LO C 2.1.4: Infers a character’s feelings from the character’s actions.</div>
  <div class="s-item">S1 LO C 2.1.5: Determines a character’s intentions from what the character says.</div>
  <div class="s-item">S1 LO C 2.1.6: Interprets a character’s intentions from the character’s actions.</div>
  <div class="s-item">S1 LO C 2.1.7: Recognises descriptive details that create the mood of a story’s setting.</div>
  <div class="s-item">S1 LO C 2.1.8: Determines descriptive details that indicate the time of a story’s setting.</div>
  <div class="s-item">S1 LO C 2.1.9: Infers a character’s traits based on their appearance in a story.</div>
  <div class="s-item">S1 LO C 2.1.10: Infers a character’s role in a story based on their appearance.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Understands main ideas and draws essential conclusions from the material read.
  </div>
  <div class="s-item">S1 LO C 2.2.11: Distinguishes the main idea in a short paragraph (theme or topic sentence).</div>
  <div class="s-item">S1 LO C 2.2.12: Identifies supporting details in a short paragraph (evidence or elaboration).</div>
  <div class="s-item">S1 LO C 2.2.13: Determines the most suitable title based on the central theme of a passage.</div>
  <div class="s-item">S1 LO C 2.2.14: Draws a reasonable conclusion from the information in a paragraph.</div>
 <div class="cg-line">
    CG-3: Develops the ability to write simple and compound sentence structures to express their understanding and experiences.
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Uses writing strategies, such as sequencing, identifying headings/sub-headings, the beginning, and ending, and forming paragraphs.
  </div>
  <div class="s-item">S1 LO C 3.1.15: Determines which sentence best fits to maintain logical flow in a short paragraph.</div>
  <div class="s-item">S1 LO C 3.1.16: Determines an appropriate opening sentence for a short paragraph.</div>
  <div class="s-item">S1 LO C 3.1.17: Determines an appropriate closing sentence for a short paragraph.</div>
  <div class="s-item">S1 LO C 3.1.18: Identifies a suitable heading for a short paragraph.</div>
  <div class="s-item">S1 LO C 3.1.19: Identifies suitable sub-headings to organise related ideas in a short text.</div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or a reading of a text.
  </div>
  <div class="s-item">S1 LO C 3.2.20: Determines which sentence is irrelevant to the topic focus of a paragraph.</div>
  <div class="s-item">S1 LO C 3.2.21: Selects the main idea for a paragraph on a familiar topic.</div>
  <div class="s-item">S1 LO C 3.2.22: Classifies suitable supporting points for a paragraph on a familiar topic.</div>
  <div class="s-item">S1 LO C 3.2.23: Develops sentences logically to maintain coherence within a paragraph.</div>
  <div class="s-item">S1 LO C 3.2.24: Recognises an error in a paragraph draft related to clarity.</div>
  <div class="s-item">S1 LO C 3.2.25: Distinguishes an error in a paragraph draft related to correctness.</div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.
  </div>
  <div class="s-item">S1 LO C 3.3.26: Determines the appropriate format (poster, poem, story, or dialogue) for a given purpose.</div>
  <div class="s-item">S1 LO C 3.3.27: Identifies suitable content features for a given writing format.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Uses appropriate grammar and structure in their writing.
  </div>
  <div class="s-item">S1 LO C 3.4.28: Applies correct punctuation in sentences.</div>
  <div class="s-item">S1 LO C 3.4.29: Applies subject–verb agreement correctly in sentences.</div>
  <div class="s-item">S1 LO C 3.4.30: Recognises common contractions in short sentences.</div>
  <div class="s-item">S1 LO C 3.4.31: Determines the expanded form of a common contraction in short sentences.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.
  </div>
  <div class="s-item">S1 LO C 4.1.32: Determines the meaning of a word based on its context in a sentence.</div>
  <div class="s-item">S1 LO C 4.1.33: Identifies an antonym for a given word in a text.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.
  </div>
  <div class="s-item">S1 LO C 4.2.35: Determines the meaning of a domain-specific word in a short passage.</div>
  <div class="s-item">S1 LO C 4.2.36: Recognises the context in which a domain-specific word is used in a short passage.</div>
</div>



   `,
 4: `
<div class="container en">
  <div class="header-com">Class 4 - English</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Develops the ability to read with comprehension by gaining a basic understanding of different forms of familiar and unfamiliar texts (such as prose and poetry).
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Applies varied comprehension strategies (inferring, predicting, visualising) to understand different texts.
  </div>
  <div class="s-item">S1 LO D 2.1.1: Anticipates the consequences of a character’s action in a short story.</div>
  <div class="s-item">S1 LO D 2.1.2: Anticipates the consequences of a character’s action in a poem.</div>
  <div class="s-item">S1 LO D 2.1.3: Infers the reason for a character’s behaviour based on text clues.</div>
  <div class="s-item">S1 LO D 2.1.4: Infers the reason for a character’s decision based on text clues.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Understands main ideas and draws essential conclusions from the material read.
  </div>
  <div class="s-item">S1 LO D 2.2.5: Distinguishes the central idea in a paragraph.</div>
  <div class="s-item">S1 LO D 2.2.6: Distinguishes the central idea in a poem.</div>
  <div class="s-item">S1 LO D 2.2.7: Identifies key supporting details in a paragraph.</div>
  <div class="s-item">S1 LO D 2.2.8: Identifies key supporting details in a poem.</div>
  <div class="s-item">S1 LO D 2.2.9: Determines an appropriate heading for a paragraph based on its theme.</div>
  <div class="s-item">S1 LO D 2.2.10: Determines an appropriate title for a poem based on its theme.</div>
  <div class="s-item">S1 LO D 2.2.11: Draws a logical conclusion from a paragraph.</div>
  <div class="s-item">S1 LO D 2.2.12: Draws a logical conclusion from a poem.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Develops the ability to write simple and compound sentence structures to express their understanding and experiences.
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Uses writing strategies, such as sequencing, identifying headings/sub-headings, the beginning, and ending, and forming paragraphs.
  </div>
  <div class="s-item">S1 LO D 3.1.13: Identifies the sentence that best completes a paragraph’s sequence.</div>
  <div class="s-item">S1 LO D 3.1.14: Determines an appropriate opening sentence to complete a paragraph meaningfully.</div>
  <div class="s-item">S1 LO D 3.1.15: Determines an appropriate closing sentence to complete a paragraph meaningfully.</div>
  <div class="s-item">S1 LO D 3.1.16: Identifies a suitable heading for a paragraph based on its main idea.</div>
  <div class="s-item">S1 LO D 3.1.17: Identifies suitable subheadings to organise related information in a text.</div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or on a reading of a text.
  </div>
  <div class="s-item">S1 LO D 3.2.18: Detects a sentence in a paragraph that does not fit due to a shift in topic or tone.</div>
  <div class="s-item">S1 LO D 3.2.19: Identifies a sentence in a paragraph that disrupts the logical sequence of ideas.</div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.
  </div>
  <div class="s-item">S1 LO D 3.3.20: Determines the most appropriate format (e.g., invitation, poem, story) for a given writing purpose.</div>
  <div class="s-item">S1 LO D 3.3.21: Identifies suitable content features for the chosen format.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Uses appropriate grammar and structure in their writing.
  </div>
  <div class="s-item">S1 LO D 3.4.22: Recognises correct grammar in a compound or complex sentence.</div>
  <div class="s-item">S1 LO D 3.4.23: Detects correct punctuation in compound or complex sentences.</div>
  <div class="s-item">S1 LO D 3.4.24: Evaluates the sentence structure for correctness.</div>
  <div class="s-item">S1 LO D 3.4.25: Identifies subject–verb agreement in a sentence.</div>


  <div class="cg-line">
    CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.
  </div>
  <div class="s-item">S1 LO D 4.1.26: Determines the meaning of a word in context within a sentence or short passage.</div>
  <div class="s-item">S1 LO D 4.1.27: Identifies coordinating conjunctions in short sentences.</div>
  <div class="s-item">S1 LO D 4.1.28: Identifies a synonym/antonym for a word used in a short text.</div>
  <div class="s-item">S1 LO D 4.1.29: Recognises a word’s meaning using picture clues or familiar context.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.
  </div>
  <div class="s-item">S1 LO D 4.2.30: Identifies the meaning of subject- or theme-specific words in a passage.</div>
</div>

   `,
 5: `<div class="container en">
  <div class="header-com">Class 5 - English</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Develops the ability to read with comprehension by gaining a basic understanding of different forms of familiar and unfamiliar texts (such as prose and poetry).
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Applies varied comprehension strategies (inferring, predicting, visualising) to understand different texts.
  </div>
  <div class="s-item">S1 LO E 2.1.1: Anticipates the most likely outcome in a multi-paragraph narrative using contextual evidence from earlier sections.</div>
  <div class="s-item">S1 LO E 2.1.2: Infers what external situation or event led a character to act, using clues from the text.</div>
  <div class="s-item">S1 LO E 2.1.3: Infers what personal reason or intention made a character act, using clues from the text.</div>
  <div class="s-item">S1 LO E 2.1.4: Visualises the setting or scene in a narrative based on descriptive language to support comprehension.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Understands main ideas and draws essential conclusions from the material read.
  </div>
  <div class="s-item">S1 LO E 2.2.5: Determines the main message or moral of a narrative text.</div>
  <div class="s-item">S1 LO E 2.2.6: Determines the main message or moral of a poem.</div>
  <div class="s-item">S1 LO E 2.2.7: Identifies supporting lines or events that reinforce the message or moral in a text.</div>
  <div class="s-item">S1 LO E 2.2.8: Determines an appropriate title for a multi-paragraph text based on its theme.</div>
  <div class="s-item">S1 LO E 2.2.9: Identifies an appropriate title for a multi-paragraph text based on its mood.</div>
  <div class="s-item">S1 LO E 2.2.10: Determines an appropriate title for a multi-paragraph text that highlights a key event.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Develops the ability to write simple and compound sentence structures to express their understanding and experiences.
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Uses writing strategies, such as sequencing, identifying headings/sub-headings, the beginning, and ending, and forming paragraphs.
  </div>
  <div class="s-item">S1 LO E 3.1.11: Identifies the correct next sentence to maintain coherence in a paragraph.</div>
 <div class="s-item">S1 LO E 3.1.12: Determines an appropriate opening sentence that sets the tone and topic of a paragraph.</div>
  <div class="s-item">S1 LO E 3.1.13: Determines an appropriate closing sentence that sums up the tone and topic of a paragraph.</div>
  <div class="s-item">S1 LO E 3.1.14: Identifies a heading for a paragraph based on its main idea and tone.</div>
  <div class="s-item">S1 LO E 3.1.15: Determines suitable subheadings to organise sections of a multi-paragraph text.</div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Writes clear and coherent paragraphs that convey their understanding of a given topic/concept or a reading of a text.
  </div>
  <div class="s-item">S1 LO E 3.2.16: Detects and removes a sentence that breaks paragraph coherence due to a tense shift.</div>
  <div class="s-item">S1 LO E 3.2.17: Recognises and removes a sentence that breaks paragraph coherence due to an off-topic idea.</div>
  <div class="s-item">S1 LO E 3.2.18: Evaluates and removes a sentence that breaks paragraph coherence due to a change in tone.</div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Creates posters, invites, simple poems, stories, and dialogues with appropriate information and purpose.
  </div>
  <div class="s-item">S1 LO E 3.3.19: Recognises a written sample that suits the purpose, audience, and tone.</div>
  <div class="s-item">S1 LO E 3.3.20: Identifies revisions needed in a written sample to better match its intended purpose, audience, and tone.</div>
  <div class="s-item">S1 LO E 3.3.21: Determines changes to a written draft to make it clearer or more engaging for its audience.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Uses appropriate grammar and structure in their writing.
  </div>
  <div class="s-item">S1 LO E 3.4.22: Recognises grammatically accurate compound sentences with correct punctuation.</div>
  <div class="s-item">S1 LO E 3.4.23: Recognises grammatically accurate complex sentences with correct punctuation.</div>
  <div class="s-item">S1 LO E 3.4.24: Evaluates sentences for correct tense consistency.</div>
  <div class="s-item">S1 LO E 3.4.25: Identifies the correct use of conjunctions in compound and complex sentences.</div>
 <div class="cg-line">
    CG-4: Acquires a more comprehensive range of words in various contexts (of home and school experience) through different sources.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts.
  </div>
  <div class="s-item">S1 LO E 4.1.26: Infers the meaning of unfamiliar words or phrases using context clues like contrast, examples, or explanation.</div>
  <div class="s-item">S1 LO E 4.1.27: Determines the meaning of subject- or domain-specific words in a given text.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Discusses meanings of words and develops vocabulary by listening to and reading a variety of texts or other content areas.
  </div>
  <div class="s-item">S1 LO E 4.2.28: Identifies the meaning of subject-specific words in grade-level passages.</div>
  <div class="s-item">S1 LO E 4.2.29: Applies the meaning of subject-specific words to show understanding in context.</div>
</div>



   `,
  6: `<div class="container en">
  <div class="header-com">Class 6 - English</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Develops the capacity for effective communication using Language skills for description, analysis, and response.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Identifies main points and summarises from a careful listening or reading of the text (news articles, reports, editorials).
  </div>
  <div class="s-item">S1 LO F 1.1.1: Identifies the main idea of a news article, report, or editorial.</div>
  <div class="s-item">S1 LO F 1.1.2: Distinguishes supporting details from the main idea in an informational text.</div>
  <div class="s-item">S1 LO F 1.1.3: Determines the most appropriate summary of an informational text based on completeness and clarity.</div>
  <div class="s-item">S1 LO F 1.1.4: Identifies off-topic or misleading sentences that weaken the coherence of a summary or paragraph.</div>
  <div class="s-item">S1 LO F 1.1.5: Identifies the correct next point to maintain the logical sequence in a short article.</div>
  <div class="s-item">S1 LO F 1.1.6: Distinguishes between fact, opinion, and reasoned judgment in short informational or argumentative texts.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Listens to, plans, and conducts different kinds of interviews (structured and unstructured).
  </div>
  <div class="s-item">S1 LO F 1.2.7: Identifies features of structured and unstructured interviews based on format, flow, and question type.</div>
  <div class="s-item">S1 LO F 1.2.8: Determines relevant and appropriate interview questions for a given context.</div>
  <div class="s-item">S1 LO F 1.2.9: Identifies irrelevant, repetitive, or off-topic questions in an interview context.</div>
  <div class="s-item">S1 LO F 1.2.10: Infers the intent or focus of a question in an interview (fact, opinion, feeling).</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Raises probing questions about social experiences using appropriate language (open-ended/closed-ended, formal/informal, relevant to context, with sensitivity).
  </div>
  <div class="s-item">S1 LO F 1.3.11: Identifies the most appropriate type of question (open-ended or closed-ended) to gather specific information in a social context.</div>
  <div class="s-item">S1 LO F 1.3.12: Determines context-appropriate questions based on tone, formality, and sensitivity in social conversations.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Writes different kinds of letters, essays, and reports using appropriate style and registers for different audiences and purposes.
  </div>
  <div class="s-item">S1 LO F 1.4.13: Identifies the correct format for different types of writing tasks (letters, essays, reports).</div>
  <div class="s-item">S1 LO F 1.4.14: Identifies the appropriate organisational structure for different types of writing tasks.</div>
  <div class="s-item">S1 LO F 1.4.15: Evaluates the appropriate tone for a piece of writing based on audience and purpose.</div>
  <div class="s-item">S1 LO F 1.4.16: Identifies the appropriate style for a piece of writing based on audience and purpose.</div>
  <div class="s-item">S1 LO F 1.4.17: Determines the appropriate language register for a piece of writing based on audience and purpose.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Appreciates the language and literary and cultural heritage in and related to the Language by exploring the various forms of literary devices.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Identifies and appreciates different forms of literature (prose, poetry, drama) and styles of writing (narrative, descriptive, expository, persuasive) from various cultures and time periods.
  </div>
  <div class="s-item">S1 LO F 2.1.18: Identifies the form of a literary text (prose, poetry, or drama).</div>
  <div class="s-item">S1 LO F 2.1.19: Recognises key structural features of a literary text.</div>
  <div class="s-item">S1 LO F 2.1.20: Distinguishes between different styles of writing—narrative, descriptive, expository, and persuasive—based on content, structure, and purpose.</div>
  <div class="s-item">S1 LO F 2.1.21: Identifies cultural or contextual clues (names, customs, settings) that reflect the origin or background of a literary text.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Identifies literary devices [simile, metaphor, personification, hyperbole, alliteration, idioms, proverbs, and riddles] by reading a variety of literature and uses them in writing.
  </div>
  <div class="s-item">S1 LO F 2.2.22: Identifies literary devices such as simile, metaphor, personification, and hyperbole in short literary texts.</div>
  <div class="s-item">S1 LO F 2.2.23: Interprets the meaning of a literary device in the context of a short literary text.</div>
  <div class="s-item">S1 LO F 2.2.24: Recognises figurative expressions such as alliteration, idioms, proverbs, and riddles in short literary texts.</div>
  <div class="s-item">S1 LO F 2.2.25: Interprets the meaning of a figurative expression in context.</div>
   <div class="cg-line">
    CG-3: Develops the ability to recognise basic linguistic aspects (word and sentence structure) and use them in oral and written expression.
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Interprets and understands basic linguistic aspects (rules), such as sentence structure, punctuation, tense, gender, and parts of speech, while reading different forms of literature, and applies them while writing.
  </div>
  <div class="s-item">S1 LO F 3.1.26: Identifies grammatically correct and complete sentences, including correct tense and subject–verb agreement.</div>
  <div class="s-item">S1 LO F 3.1.27: Identifies punctuation errors in compound and complex sentences, including commas, quotation marks, and clause boundaries.</div>
  <div class="s-item">S1 LO F 3.1.28: Corrects punctuation errors in compound and complex sentences to maintain clarity and meaning.</div>
  <div class="s-item">S1 LO F 3.1.29: Identifies and applies correct parts of speech and gender agreement in compound and complex sentences to maintain grammatical accuracy.</div>
  <div class="s-item">S1 LO F 3.1.30: Identifies errors in sentence structure, such as fragments, misplaced modifiers, or word order that affect clarity.</div>

  <div class="cg-line">
    CG-5: Develops an appreciation of the distinctive features of the particular language, including its alphabet and script, sounds, rhymes, puns, and other wordplays and games unique to the language.
  </div>

  <!-- C-5.2 -->
  <div class="c-item">
    C-5.2: Engages in the use of puns, rhymes, alliteration, and other wordplays in the language to make speech and writing more interesting and enjoyable.
  </div>
  <div class="s-item">S1 LO F 5.2.31: Identifies rhyme, alliteration, and simple wordplay (such as puns and homophones) in short texts or poems.</div>
  <div class="s-item">S1 LO F 5.2.32: Interprets the effect or meaning of rhyme, alliteration, or wordplay in short texts or poems.</div>
  <div class="s-item">S1 LO F 5.2.33: Identifies the best example of rhyme, alliteration, or wordplay to make a sentence more engaging.</div>

  <!-- C-5.3 -->
  <div class="c-item">
    C-5.3: Becomes familiar with some of the major word games in the language (e.g., palindromes, spoonerisms, sentences without given letters or sounds, riddles, jokes, antakshari, anagrams, crosswords).
  </div>
  <div class="s-item">S1 LO F 5.3.34: Identifies examples of simple language-based word games such as palindromes, anagrams, and riddles.</div>
  <div class="s-item">S1 LO F 5.3.35: Recognises the correct answer to a simple language-based word game presented in written form.</div>
</div>

     `,
  7: `<div class="container en">
  <div class="header-com">Class 7 - English</div>

  <div class="cg-line">
    CG-1: Develops the capacity for effective communication using Language skills for description, analysis, and response.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Identifies main points and summarises from a careful listening or reading of the text (news articles, reports, editorials)
  </div>
  <div class="s-item">S1 LO G 1.1.1: Identifies implicit main ideas or themes in editorials, reports, or news articles.</div>
  <div class="s-item">S1 LO G 1.1.2: Evaluates the overall effectiveness of a summary in conveying the central idea, tone, and logical flow of an informational text.</div>
  <div class="s-item">S1 LO G 1.1.3: Identifies biased or subjective language that affects objectivity in summaries.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Listens to, plans, and conducts different kinds of interviews (structured and unstructured).
  </div>
  <div class="s-item">S1 LO G 1.2.4: Distinguishes between factual and opinion-based responses in structured/unstructured interview excerpts.</div>
  <div class="s-item">S1 LO G 1.2.5: Identifies logical inconsistencies, redundancies, or ambiguities in interview questions/responses.</div>
  <div class="s-item">S1 LO G 1.2.6: Identifies a logical and effective sequence of questions for a structured/unstructured interview.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Raises probing questions about social experiences using appropriate language (open-ended/closed-ended, formal/informal, relevant to context, with sensitivity).
  </div>
  <div class="s-item">S1 LO G 1.3.7: Analyses whether a question is appropriate and effective in eliciting relevant information, considering openness, tone, and context.</div>
  <div class="s-item">S1 LO G 1.3.8: Determines the most context-appropriate question to extend a conversation or clarify a point in a social exchange.</div>
  <div class="s-item">S1 LO G 1.3.9: Identifies whether a question uses appropriate formality and sensitivity in social situations.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Writes different kinds of letters, essays, and reports using appropriate style and registers for different audiences and purposes.
  </div>
  <div class="s-item">S1 LO G 1.4.10: Identifies deviations from formal or informal tone in letters, essays, or reports written for specific purposes.</div>
  <div class="s-item">S1 LO G 1.4.11: Determines the most appropriate organisational pattern or transition to revise structurally weak letters, essays, or reports.</div>
  <div class="s-item">S1 LO G 1.4.12: Identifies the correct format features of letters, essays, and reports for a given audience and purpose.</div>

  <div class="cg-line">
    CG-2: Appreciates the language and literary and cultural heritage in and related to the Language by exploring the various forms of literary devices.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Identifies and appreciates different forms of literature (prose, poetry, drama) and styles of writing (narrative, descriptive, expository, persuasive) from various cultures and time periods.
  </div>
  <div class="s-item">S1 LO G 2.1.13: Identifies subjective versus objective tone in letters, essays, or short reports.</div>
  <div class="s-item">S1 LO G 2.1.14: Analyses how the structure and features of prose, poetry, or drama influence meaning or emotional effect.</div>
  <div class="s-item">S1 LO G 2.1.15: Compares and contrasts different styles of writing (e.g., narrative vs. expository) based on purpose, tone, and structure.</div>
  <div class="s-item">S1 LO G 2.1.16: Identifies how cultural context, historical period, or setting influences the content and expression in literary texts.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Identifies literary devices [simile, metaphor, personification, hyperbole, alliteration, idioms, proverbs, and riddles] by reading a variety of literature and uses them in writing.
  </div>
  <div class="s-item">S1 LO G 2.2.17: Distinguishes between similar literary devices (e.g., simile vs. metaphor, personification vs. hyperbole) by interpreting their use in context.</div>
  <div class="s-item">S1 LO G 2.2.18: Analyses how specific literary devices (e.g., idioms, proverbs, riddles) shape the tone, humour, and meaning of a literary passage.</div>
  <div class="s-item">S1 LO G 2.2.19: Identifies the most suitable literary device to enhance meaning or style in a given sentence or paragraph.</div>

  <div class="cg-line">
    CG-3: Develops the ability to recognise basic linguistic aspects (word and sentence structure) and use them in oral and written expression.
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Interprets and understands basic linguistic aspects (rules), such as sentence structure, punctuation, tense, gender, and parts of speech, while reading different forms of literature, and applies them while writing.
  </div>
  <div class="s-item">S1 LO G 3.1.20: Identifies and corrects errors in complex sentence structures, including tense shifts, faulty parallelism, and misplaced modifiers.</div>
  <div class="s-item">S1 LO G 3.1.21: Determines the correct punctuation to maintain clarity in compound and complex sentences.</div>
  <div class="s-item">S1 LO G 3.1.22: Analyses how words or phrases (e.g., participial phrases, subordinating conjunctions) function within a sentence to create meaning or structure.</div>
  <div class="s-item">S1 LO G 3.1.23: Identifies errors in gender agreement in complex sentences.</div>
  <div class="s-item">S1 LO G 3.1.24: Identifies whether a sentence is written in active or passive voice in a short text.</div>
  <div class="s-item">S1 LO G 3.1.25: Identifies whether a highlighted group of words functions as a noun, adjective, or adverb clause in a short text.</div>
  <div class="s-item">S1 LO G 3.1.26: Identifies the correct use of modals or conditional structures in short sentences.</div>
  <div class="s-item">S1 LO G 3.1.27: Identifies the correct reporting verb and reporting structure in simple statements converted from direct to indirect speech.</div>
  <div class="s-item">S1 LO G 3.1.28: Recognises correct tense changes in reported speech for present-to-past transformations in simple statements.</div>
  <div class="s-item">S1 LO G 3.1.29: Identifies the correct pronoun or time expression change in a simple reported statement.</div>
<div class="cg-line">
    CG-5: Develops an appreciation of the distinctive features of the particular language, including its alphabet and script, sounds, rhymes, puns, and other wordplays and games unique to the language.
  </div>

  <!-- C-5.2 -->
  <div class="c-item">
    C-5.2: Engages in the use of puns, rhymes, alliteration, and other wordplays in the language to make speech and writing more interesting and enjoyable.
  </div>
  <div class="s-item">S1 LO G 5.2.30: Interprets the meaning and humour created through puns, rhymes, or homophones in short written texts.</div>
  <div class="s-item">S1 LO G 5.2.31: Identifies examples of alliteration and other sound-based devices, and analyses their impact on tone and mood.</div>
  <div class="s-item">S1 LO G 5.2.32: Determines the most suitable wordplay (e.g., pun, rhyme, alliteration) to make a short text more interesting or enjoyable.</div>

  <!-- C-5.3 -->
  <div class="c-item">
    C-5.3: Becomes familiar with some of the major word games in the language (e.g., palindromes, spoonerisms, sentences without given letters or sounds, riddles, jokes, anagrams, crosswords).
  </div>
  <div class="s-item">S1 LO G 5.3.33: Identifies the underlying word pattern or rule (e.g., letter reversal, sound swap, alphabet sequence) in language-based word games.</div>
  <div class="s-item">S1 LO G 5.3.34: Identifies the correct solution to a palindrome, spoonerism, riddle, or anagram based on a written clue.</div>
  </div>
















     `,
    8: `
      <div class="container en">
  <div class="header-com">Class 8 - English</div>

  <div class="cg-line">
    CG-1: Develops the capacity for effective communication using Language skills for description, analysis, and response.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Identifies main points and summarises from a careful listening or reading of the text (news articles, reports, editorials).
  </div>
  <div class="s-item">S1 LO H 1.1.1: Infers the central idea of an editorial or opinion piece even when it is implied or spread across paragraphs.</div>
  <div class="s-item">S1 LO H 1.1.2: Evaluates the logical progression of a summary.</div>
  <div class="s-item">S1 LO H 1.1.3: Evaluates the tone of a summary.</div>
  <div class="s-item">S1 LO H 1.1.4: Evaluates whether a summary preserves the core argument.</div>
  <div class="s-item">S1 LO H 1.1.5: Detects bias or rhetorical slant in how main ideas or facts are framed in journalistic writing.</div>
  <div class="s-item">S1 LO H 1.1.6: Identifies sentences that distort or dilute the main idea when included in a summary.</div>
  <div class="s-item">S1 LO H 1.1.7: Interprets simple data presented in charts, tables, or diagrams to identify key information.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Listens to, plans, and conducts different kinds of interviews (structured and unstructured).
  </div>
  <div class="s-item">S1 LO H 1.2.8: Analyses the structure and flow of an interview transcript to determine whether it is structured or unstructured.</div>
  <div class="s-item">S1 LO H 1.2.9: Evaluates the tone of a question in an interview.</div>
  <div class="s-item">S1 LO H 1.2.10: Evaluates the clarity of a question in an interview.</div>
  <div class="s-item">S1 LO H 1.2.11: Evaluates the relevance of a question in an interview.</div>
  <div class="s-item">S1 LO H 1.2.12: Detects shifts in power in an interview based on language cues.</div>
  <div class="s-item">S1 LO H 1.2.13: Detects shifts in emotion in an interview based on language cues.</div>
  <div class="s-item">S1 LO H 1.2.14: Detects shifts in intent in an interview based on language cues.</div>
  <div class="s-item">S1 LO H 1.2.15: Identifies how to improve the flow, clarity, or neutrality of a given interview excerpt.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Raises probing questions about social experiences using appropriate language (open-ended/closed-ended), formal/informal, relevant to context, with sensitivity).
  </div>
  <div class="s-item">S1 LO H 1.3.16: Evaluates whether a given question is likely to elicit a thoughtful or informative response in a specific social scenario.</div>
  <div class="s-item">S1 LO H 1.3.17: Identifies improvements to the tone of a poorly framed question.</div>
  <div class="s-item">S1 LO H 1.3.18: Identifies improvements to the sensitivity of a poorly framed question.</div>
  <div class="s-item">S1 LO H 1.3.19: Identifies improvements to the clarity of a poorly framed question.</div>
  <div class="s-item">S1 LO H 1.3.20: Differentiates between questions that are appropriate for gathering factual, emotional, or opinion-based responses in diverse social contexts.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Writes different kinds of letters, essays, and reports using appropriate style and registers for different audiences and purposes.
  </div>
  <div class="s-item">S1 LO H 1.4.21: Evaluates whether the tone, style, and structure of a sample letter, essay, or report are appropriate for its intended audience and purpose.</div>
  <div class="s-item">S1 LO H 1.4.22: Identifies logical flaws and recognises appropriate ways to revise the organisation or argument flow of essays and reports.</div>
  <div class="s-item">S1 LO H 1.4.23: Identifies how the format and style should change to suit a different audience or purpose.</div>
  <div class="s-item">S1 LO H 1.4.24: Identifies flaws in coherence or paragraph sequence in longer writing samples.</div>
  <div class="s-item">S1 LO H 1.4.25: Distinguishes between subjective and objective tone in formal or informal writing samples.</div>

  <div class="cg-line">
    CG-2: Appreciates the language and literary and cultural heritage in and related to the Language by exploring the various forms of literary devices.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Identifies and appreciates different forms of literature (prose, poetry, drama) and styles of writing (narrative, descriptive, expository, persuasive) from various cultures and time periods.
  </div>
  <div class="s-item">S1 LO H 2.1.26: Compares the use of structure and narrative techniques across prose, poetry, and drama to explain how they shape meaning or emotional impact.</div>
  <div class="s-item">S1 LO H 2.1.27: Evaluates how the choice of writing style (e.g., expository vs. persuasive) affects clarity in a given passage.</div>
  <div class="s-item">S1 LO H 2.1.28: Evaluates how the choice of writing style (e.g., expository vs. persuasive) affects impact in a given passage.</div>
  <div class="s-item">S1 LO H 2.1.29: Evaluates how the choice of writing style (e.g., expository vs. persuasive) affects bias in a given passage.</div>
  <div class="s-item">S1 LO H 2.1.30: Interprets how cultural, historical, or geographical context shapes character, setting, or theme in a literary work.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Identifies literary devices [simile, metaphor, personification, hyperbole, alliteration, idioms, proverbs, and riddles] by reading a variety of literature and uses them in writing.
  </div>
  <div class="s-item">S1 LO H 2.2.31: Analyses how literary devices such as simile, metaphor, personification, or hyperbole contribute to tone in literary texts.</div>
  <div class="s-item">S1 LO H 2.2.32: Analyses how literary devices such as simile, metaphor, personification, or hyperbole contribute to imagery in literary texts.</div>
  <div class="s-item">S1 LO H 2.2.33: Analyses how literary devices such as simile, metaphor, personification, or hyperbole contribute to the theme in literary texts.</div>
  <div class="s-item">S1 LO H 2.2.34: Evaluates the effectiveness of idioms, proverbs, or figurative expressions in reinforcing meaning, humour, or argument.</div>
  <div class="s-item">S1 LO H 2.2.35: Identifies shifts in meaning or tone created through literary ambiguity, irony, or pun in short texts.</div>
  <div class="s-item">S1 LO H 2.2.3: Identifies persuasive rhetorical devices (e.g., ethos, pathos, logos) used in short persuasive passages.</div>
      <div class="cg-line">
    CG-3: Develops the ability to recognise basic linguistic aspects (word and sentence structure) and use them in oral and written expression.
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Interprets and understands basic linguistic aspects (rules), such as sentence structure, punctuation, tense, gender, and parts of speech, while reading different forms of literature, and applies them while writing.
  </div>
  <div class="s-item">S1 LO H 3.1.37: Identifies and corrects errors in advanced sentence constructions, such as dangling modifiers, faulty comparisons, or incorrect tense shifts in multi-clause sentences.</div>
  <div class="s-item">S1 LO H 3.1.38: Identifies the role of relative clauses in joining ideas in complex sentences.</div>
  <div class="s-item">S1 LO H 3.1.39: Evaluates the appropriateness of punctuation in clarifying meaning in sentences containing direct and indirect speech, parenthetical elements, or complex lists.</div>
  <div class="s-item">S1 LO H 3.1.40: Analyses the grammatical function and relationship of different sentence elements such as noun phrases, clauses, and conjunctions in context.</div>
  <div class="s-item">S1 LO H 3.1.41: Identifies the type and function of a clause (noun, adjective, adverb) in a multi-clause sentence.</div>
  <div class="s-item">S1 LO H 3.1.42: Identifies the correct changes of tense, pronoun, or time expression in a simple reported speech sentence.</div>
  <div class="s-item">S1 LO H 3.1.43: Identifies whether a highlighted verb in a short text is an infinitive, gerund, or participle.</div>

  <div class="cg-line">
    CG-5: Develops an appreciation of the distinctive features of the particular language, including its alphabet and script, sounds, rhymes, puns, and other wordplays and games unique to the language.
  </div>

  <!-- C-5.2 -->
  <div class="c-item">
    C-5.2: Engages in the use of puns, rhymes, alliteration, and other wordplays in the language to make speech and writing more interesting and enjoyable.
  </div>
  <div class="s-item">S1 LO H 5.2.44: Interprets layered wordplays (e.g., puns, rhymes, homonyms) in poems, riddles, or short narrative excerpts.</div>
  <div class="s-item">S1 LO H 5.2.45: Analyses the impact of layered wordplay on tone.</div>
  <div class="s-item">S1 LO H 5.2.46: Analyses the impact of layered wordplay on humour.</div>
  <div class="s-item">S1 LO H 5.2.47: Analyses the impact of layered wordplay on meaning.</div>
  <div class="s-item">S1 LO H 5.2.48: Analyses how sound-based literary devices such as alliteration, internal rhyme, and repetition contribute to mood, rhythm, or emphasis in short literary texts.</div>

  <!-- C-5.3 -->
  <div class="c-item">
    C-5.3: Becomes familiar with some of the major word games in the language (e.g., palindromes, spoonerisms, sentences without given letters or sounds, riddles, jokes, antakshari, anagrams, crosswords).
  </div>
  <div class="s-item">S1 LO H 5.3.49: Analyses the logic or pattern behind a language-based word game (e.g., palindromes, anagrams, spoonerisms, crosswords).</div>
  <div class="s-item">S1 LO H 5.3.50: Analyses the reasoning that makes a language-based word game clever.</div>
  <div class="s-item">S1 LO H 5.3.51: Identifies the correct solution for a moderately complex word game using clues about structure, meaning, or alphabetic constraints.</div>
</div>

       `,

  },

  math: {

     1: `<div class="container en">
  <div class="header-com">Class 1 - Mathematics</div>

  <!-- CG-8 -->
  <div class="cg-line">CG-8: Children develop mathematical understanding and abilities to recognize the world through quantities, shapes, and measures.</div>

  <!-- C-8.1 -->
  <div class="c-item">C-8.1: Sorts objects into groups and sub-groups based on more than one property.</div>
  <div class="s-item">S2 LO A 8.1.1: Sorts objects into 2 groups (big-small, long-short, light-heavy) based on size, length, height, and weight.</div>

  <!-- C-8.2 -->
  <div class="c-item">C-8.2: Identifies and extends simple patterns in their surroundings, shapes, and numbers.</div>
  <div class="s-item">S2 LO A 8.2.2: Completes simple, repeating patterns in shapes and numbers.</div>

  <!-- C-8.3 -->
  <div class="c-item">C-8.3: Counts up to 99 both forwards and backwards, and in groups of 10s and 20s.</div>
  <div class="s-item">S2 LO A 8.3.3: Counts objects beyond 20 but up to 99 using number names and recognizes grouping in tens.</div>

  <!-- C-8.5 -->
  <div class="c-item">C-8.5: Recognises and uses numerals to represent quantities up to 99 with an understanding of the decimal place value system.</div>
  <div class="s-item">S2 LO A 8.5.4: Recognizes the symbol zero to represent the absence of an object/thing.</div>
  <div class="s-item">S2 LO A 8.5.5: Identifies numerals up to 20 and number-names up to 10.</div>
  <div class="s-item">S2 LO A 8.5.6: Compares two numbers up to 20 and uses vocabulary like ‘bigger than’ or ‘smaller than’.</div>

  <!-- C-8.6 -->
  <div class="c-item">C-8.6: Performs addition and subtraction of 2-digit numbers using flexible strategies of composition and decomposition.</div>
  <div class="s-item">S2 LO A 8.6.7: Models and solves addition sums up to 18 based on real-world situations.</div>
  <div class="s-item">S2 LO A 8.6.8: Models and solves subtraction sums up to 9 based on real-world situations.</div>

  <!-- C-8.7 -->
  <div class="c-item">C-8.7: Recognises multiplication as repeated addition and division as equal sharing.</div>
  <div class="s-item">S2 LO A 8.7.9: Solves small number multiplication problems by grouping and adding.</div>
  <div class="s-item">S2 LO A 8.7.10: Solves division problems by using equal sharing.</div>

  <!-- C-8.8 -->
  <div class="c-item">C-8.8: Recognises, makes, and classifies basic geometric shapes and their observable properties, and understands and explains the relative relation of objects in space.</div>
  <div class="s-item">S2 LO A 8.8.11: Uses vocabulary of spatial relationships (e.g., top, bottom, on, under, inside, outside, above, below, near, far, before, after).</div>
  <div class="s-item">S2 LO A 8.8.12: Sorts, classifies, and describes the objects based on shapes and other observable properties.</div>
     <div class="s-item">S2 LO A 8.8.13: Observes and describes the physical features of various solids/shapes (e.g., a ball rolls, a box slides).</div>
  <div class="s-item">S2 LO A 8.8.14: Describes the observable characteristics of 2D shapes by their names (e.g., the pages of a book are rectangular and have 4 sides, 4 corners).</div>

  <!-- C-8.9 -->
  <div class="c-item">C-8.9: Selects appropriate tools and units to perform simple measurements of length, weight, and volume of objects in their immediate environment.</div>
  <div class="s-item">S2 LO A 8.9.15: Identifies the tools and units that can be used to measure length of objects in their immediate environment.</div>
  <div class="s-item">S2 LO A 8.9.16: Identifies the tools and units that can be used to measure weight of objects in their immediate environment.</div>
  <div class="s-item">S2 LO A 8.9.17: Identifies the tools and units that can be used to measure volume of objects in their immediate environment.</div>

  <!-- C-8.11 -->
  <div class="c-item">C-8.11: Performs simple transactions using money up to ₹ 100.</div>
  <div class="s-item">S2 LO A 8.11.18: Adds up notes and coins to form amounts up to ₹ 20.</div>
</div>



`,




 2: `<div class="container en">
  <div class="header-com">Class 2 - Mathematics</div>

  <div class="cg-line">
    CG-8: Children develop mathematical understanding and abilities to recognize the world through quantities, shapes, and measures.
  </div>

  <!-- C-8.1 -->
  <div class="c-item">
    C-8.1: Sorts objects into groups and sub-groups based on more than one property.
  </div>
  <div class="s-item">S2 LO B 8.1.1: Sorts objects into groups and subgroups based on attributes they recognize and describes the rule of sorting.</div>

  <!-- C-8.2 -->
  <div class="c-item">
    C-8.2: Identifies and extends simple patterns in their surroundings, shapes, and numbers.
  </div>
  <div class="s-item">S2 LO B 8.2.2: Describes and extends repeating or growing patterns using numbers, shapes, or symbols.</div>

  <!-- C-8.4 -->
  <div class="c-item">
    C-8.4: Arranges numbers up to 99 in ascending and descending order.
  </div>
  <div class="s-item">S2 LO B 8.4.3: Arranges numbers from a given set of numbers in ascending and descending order.</div>

  <!-- C-8.5 -->
  <div class="c-item">
    C-8.5: Recognises and uses numerals to represent quantities up to 99 with the understanding of decimal place value system.
  </div>
  <div class="s-item">S2 LO B 8.4.4: Recognises, reads, writes number names and numerals up to 99 using place value concept.</div>
  <div class="s-item">S2 LO B 8.5.5: Forms and compares greatest and smallest 2-digit numbers using given digits (with/without repetition).</div>

  <!-- C-8.6 -->
  <div class="c-item">
    C-8.6: Performs addition and subtraction of 2-digit numbers fluently using flexible strategies of composition and decomposition.
  </div>
  <div class="s-item">S2 LO B 8.6.6: Uses flexible strategies and derives combinations of composing (add together) and decomposing numbers (take away for the set).</div>
  <div class="s-item">S2 LO B 8.6.7: Adds two numbers using place value concept (sum not exceeding 99) and applies them to solve simple daily life problems/situations.</div>
  <div class="s-item">S2 LO B 8.6.8: Subtracts two numbers up to 99 using place value and applies them to solve simple daily life problems/situations.</div>
  <div class="s-item">S2 LO B 8.6.9: Identifies appropriate operation (addition or subtraction) to solve problems in a familiar situation/context.</div>
  <div class="s-item">S2 LO B 8.6.10: Solves one-step word problems involving addition or subtraction.</div>

  <!-- C-8.7 -->
  <div class="c-item">
    C-8.7: Recognises multiplication as repeated addition and division as equal sharing.
  </div>
  <div class="s-item">S2 LO B 8.7.11: Uses repeated adding to solve simple multiplication problems up to 99.</div>
  <div class="s-item">S2 LO B 8.7.12: Solves simple sharing problems (division) using equal groups.</div>

  <!-- C-8.8 -->
  <div class="c-item">
    C-8.8: Recognises, makes, and classifies basic geometric shapes and their observable properties, and understands and explains the relative relation of objects in space.
  </div>
  <div class="s-item">S2 LO B 8.8.13: Describes features of 2D and 3D shapes using everyday language.</div>
  <div class="s-item">S2 LO B 8.8.14: Compares shapes based on specific attributes (e.g., length, area, volume).</div>
  <div class="s-item">S2 LO B 8.8.15: Identifies 3D shapes by their names and describes their observable characteristics.</div>

  <!-- C-8.9 -->
  <div class="c-item">
    C-8.9: Selects appropriate tools and units to perform simple measurements of length, weight, and volume of objects in their immediate environment.
  </div>
  <div class="s-item">S2 LO B 8.9.16: Estimates and measures length/distances and capacities of containers using uniform non-standard units like a rod/pencil, cup/spoon/bucket.</div>
  <div class="s-item">S2 LO B 8.9.17: Chooses the most appropriate non-standard unit to measure volume from a set of pictures.</div>

  <!-- C-8.11 -->
  <div class="c-item">
    C-8.11: Performs simple transactions using money up to ₹100.
  </div>
  <div class="s-item">S2 LO B 8.11.18: Adds up notes and coins to form amounts up to ₹100.</div>
  <div class="s-item">S2 LO B 8.11.19: Finds how much more is needed to make a given amount.</div>
</div>

`,
 3: `<div class="container en">
  <div class="header-com">Class 3 - Mathematics</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.
  </div>
  <div class="s-item">S2 LO C 1.1.1: Reads and writes numbers up to 1000.</div>
  <div class="s-item">S2 LO C 1.1.2: Identifies and creates the greatest and smallest numbers using given digits (with/without repetition).</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.
  </div>
  <div class="s-item">S2 LO C 1.2.3: Identifies and names unit fractions (e.g., 1/2, 1/4, 1/3).</div>
  <div class="s-item">S2 LO C 1.2.4: Compares unit fractions using visuals or real-life contexts.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 and applies the four basic operations on whole numbers to solve daily life problems.
  </div>
  <div class="s-item">S2 LO C 1.3.5: Adds and subtracts 3-digit numbers with and without regrouping.</div>
  <div class="s-item">S2 LO C 1.3.6: Makes reasonable estimates of sums and differences.</div>
  <div class="s-item">S2 LO C 1.3.7: Understands division as repeated subtraction or equal sharing and finds quotients and remainders for simple division facts.</div>
  <div class="s-item">S2 LO C 1.3.8: Solves simple word problems involving addition, subtraction, multiplication, and division within 1000.</div>
  <div class="s-item">S2 LO C 1.3.9: Solves 2-step word problems using different operations sequentially.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.
  </div>
  <div class="s-item">S2 LO C 1.4.10: Classifies numbers as odd or even using real-life contexts.</div>
  <div class="s-item">S2 LO C 1.4.11: Recognizes and generates number patterns through skip counting by 2s, 5s, and 10s.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Analyses the characteristics and properties of two- and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.
  </div>
  <div class="s-item">S2 LO C 2.1.12: Describes 2D shapes based on number of sides and vertices.</div>
  <div class="s-item">S2 LO C 2.1.13: Identifies and names basic 3D shapes (e.g., cube, cuboid, sphere, cylinder, cone) in surroundings.</div>

  <!-- C-2.3 -->
  <div class="c-item">
    C-2.3: Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.
  </div>
  <div class="s-item">S2 LO C 2.3.14: Identifies simple lines of symmetry in regular shapes using folding or drawing.</div>
  <div class="s-item">S2 LO C 2.3.15: Identifies the mirror reflection using objects or paper-folding.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.
  </div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.
  </div>
  <div class="s-item">S2 LO C 3.3.16: Converts larger units to smaller units for length and capacity, e.g., m to cm, l to ml, within simple contexts.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Understands the definition and formula for the area of a square or rectangle as length times breadth.
  </div>
  <div class="s-item">S2 LO C 3.4.17: Determines the area of a 2D shape by counting unit squares.</div>

  <!-- C-3.5 -->
  <div class="c-item">
    C-3.5: Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume and verifies the same using standard units.
  </div>
  <div class="s-item">S2 LO C 3.5.18: Calculates duration of time in hours and minutes in simple scenarios.</div>
  <div class="s-item">S2 LO C 3.5.19: Solves simple elapsed time word problems involving both a.m. and p.m.</div>
  <div class="s-item">S2 LO C 3.5.20: Compares perimeter of simple shapes without actual measurements.</div>

  <!-- C-3.6 -->
  <div class="c-item">
    C-3.6: Deduces that shapes having equal areas can have different perimeters and shapes having equal perimeters can have different areas.
  </div>
  <div class="s-item">S2 LO C 3.6.21: Knows that different shapes can have the same perimeter using concrete examples.</div>

  <!-- C-3.7 -->
  <div class="c-item">
    C-3.7: Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.
  </div>
  <div class="s-item">S2 LO C 3.7.22: Demonstrates conservation of length (e.g., string length remains constant regardless of arrangement).</div>
  <div class="s-item">S2 LO C 3.7.23: Identifies which containers hold the same volume based on visual cues.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).
  </div>
  <div class="s-item">S2 LO C 4.1.24: Solves puzzles involving one or more operations on whole numbers.</div>
</div>

`,
 4: `<div class="container en">
  <div class="header-com">Class 4 - Mathematics</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.
  </div>
  <div class="s-item">S2 LO D 1.1.1: Compares and orders numbers up to 10,000.</div>
  <div class="s-item">S2 LO D 1.1.2: Forms the greatest/smallest numbers using the given digits (with/without repetition).</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines and as divisions of whole numbers.
  </div>
  <div class="s-item">S2 LO D 1.2.3: Compares like and unlike fractions visually and numerically.</div>
  <div class="s-item">S2 LO D 1.2.4: Solves problems involving sharing/partitioning objects in fractional parts.</div>
  <div class="s-item">S2 LO D 1.2.5: Demonstrates understanding of equivalent fractions using visuals or number lines.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10 (Pahade), and applies the four basic operations on whole numbers to solve daily life problems.
  </div>
  <div class="s-item">S2 LO D 1.3.6: Identifies and applies the correct operation (addition, subtraction, multiplication, or division) to solve contextual problems.</div>
  <div class="s-item">S2 LO D 1.3.7: Solves multi-step problems involving a combination of operations (Olympiad Enrichment).</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.
  </div>
  <div class="s-item">S2 LO D 1.4.8: Identifies factors of numbers less than 50 using grouping or array models.</div>
  <div class="s-item">S2 LO D 1.4.9: Identifies, completes, and extends number and shape patterns.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Analyses the characteristics and properties of two- and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Identifies, compares, and analyses attributes of two- and three-dimensional shapes and develops vocabulary to describe their attributes or properties.
  </div>
  <div class="s-item">S2 LO D 2.1.10: Identifies 3D shapes (cube, cuboid, sphere, cone, cylinder) and their features (edges, faces, vertices).</div>
  <div class="s-item">S2 LO D 2.1.11: Identifies the top, front, and side views of simple 3D objects.</div>

  <!-- C-2.3 -->
  <div class="c-item">
    C-2.3: Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.
  </div>
  <div class="s-item">S2 LO D 2.3.12: Selects shapes that show symmetry from given visual options.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.
  </div>
  <div class="s-item">S2 LO D 2.4.13: Recognizes and extends simple patterns involving 2D shapes.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time using non-standard and standard units.
  </div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.
  </div>
  <div class="s-item">S2 LO D 3.2.14: Selects and uses appropriate tools (ruler, clock, balance, measuring cup) and units (cm/m, g/kg, ml/l, min/hr) to measure length, time, weight, and volume in real-life contexts.</div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Carries out simple unit conversions, such as from centimetres to metres, within a system of measurement.
  </div>
  <div class="s-item">S2 LO D 3.3.15: Converts centimetres to metres and vice versa; millilitres to litres and vice versa.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Understands the definition and formula for the area of a square or rectangle as length times breadth.
  </div>
  <div class="s-item">S2 LO D 3.4.16: Estimates and calculates the perimeter and area of rectangles/squares using non-standard and square units.</div>

  <!-- C-3.5 -->
  <div class="c-item">
    C-3.5: Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume, and verifies the same using standard units.
  </div>
  <div class="s-item">S2 LO D 3.5.17: Estimates time intervals in hours and minutes.</div>

  <!-- C-3.6 -->
  <div class="c-item">
    C-3.6: Deduces that shapes having equal areas can have different perimeters and shapes having equal perimeters can have different areas.
  </div>
  <div class="s-item">S2 LO D 3.6.18: Compares areas and perimeters of different shapes using examples.</div>

  <!-- C-3.7 -->
  <div class="c-item">
    C-3.7: Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.
  </div>
  <div class="s-item">S2 LO D 3.7.19: Solves daily-life problems involving measurement (e.g., calculating total length, weight, or capacity).</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).
  </div>
  <div class="s-item">S2 LO D 4.1.20: Translates simple daily life situations into mathematical problems or puzzles.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Learns to systematically count and list all possible permutations or combinations given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).
  </div>
  <div class="s-item">S2 LO D 4.2.21: Lists all possible outcomes of a simple event (e.g., combinations of two clothes or two fruits).</div>
  <div class="s-item">S2 LO D 4.2.22: Uses diagrams, tables, or lists to systematically find all combinations/permutations in small sets.</div>
  <div class="s-item">S2 LO D 4.2.23: Identifies missing or repeated combinations and corrects the list accordingly.</div>
</div>


  `,
 5: `<div class="container en">
  <div class="header-com">Class 5 - Mathematics</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Understands numbers (counting numbers and fractions), represents whole numbers using the Indian place value system, understands and carries out the four basic operations with whole numbers, and discovers and recognises patterns in number sequences.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Represents numbers using the place value structure of the Indian number system, compares whole numbers, and knows and can read the names of very large numbers.
  </div>
  <div class="s-item">S2 LO E 1.1.1: Reads, writes, and expands numbers up to 1,00,000 using place value.</div>
  <div class="s-item">S2 LO E 1.1.2: Compares and orders large numbers up to 1,00,000.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Represents and compares commonly used fractions in daily life (such as ½, ¼) as parts of unit wholes, as locations on number lines, and as divisions of whole numbers.
  </div>
  <div class="s-item">S2 LO E 1.2.3: Compares and orders like and unlike proper, improper, and mixed fractions.</div>
  <div class="s-item">S2 LO E 1.2.4: Adds and subtracts like fractions and solves contextual problems.</div>
  <div class="s-item">S2 LO E 1.2.5: Converts fractions to decimals and vice versa.</div>
  <div class="s-item">S2 LO E 1.2.6: Compares decimals up to hundredths (0.01) using place value.</div>
  <div class="s-item">S2 LO E 1.2.7: Adds and subtracts decimals in real-world contexts (e.g., money, length).</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Understands and visualises arithmetic operations and the relationships among them, knows addition and multiplication tables at least up to 10×10, and applies the four basic operations on whole numbers to solve daily life problems.
  </div>
  <div class="s-item">S2 LO E 1.3.8: Prepares bills and solves problems involving profit/loss, simple discount.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Recognises, describes, and extends simple number patterns such as odd numbers, even numbers, square numbers, cubes, powers of 2, powers of 10, and Virahanka-Fibonacci numbers.
  </div>
  <div class="s-item">S2 LO E 1.4.9: Distinguishes between prime and composite numbers using the number of factors (up to 100).</div>
  <div class="s-item">S2 LO E 1.4.10: Applies understanding of factors, multiples, and primes in solving reasoning-based questions (e.g., smallest common multiple, common factors, identifying prime-rich patterns).</div>
  <div class="s-item">S2 LO E 1.4.11: Applies simple divisibility tests to identify properties of numbers.</div>
  <div class="s-item">S2 LO E 1.4.12: Finds LCM and HCF of small numbers using listing/common multiples.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Analyses the characteristics and properties of two and three-dimensional geometric shapes, specifies locations and describes spatial relationships, and recognises and creates shapes that have symmetry.
  </div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Describes location and movement using both common language and mathematical vocabulary; understands the notion of map.
  </div>
  <div class="s-item">S2 LO E 2.2.13: Describes the relative positions of objects using coordinates in simple grids.</div>

  <!-- C-2.3 -->
  <div class="c-item">
    C-2.3: Recognises and creates symmetry (reflection, rotation) in familiar 2D and 3D shapes.
  </div>
  <div class="s-item">S2 LO E 2.3.14: Identifies and classifies right, acute, and obtuse angles in real life contexts.</div>
  <div class="s-item">S2 LO E 2.3.15: Estimates angle measurements to the nearest 5°.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Discovers, recognises, describes, and extends patterns in 2D and 3D shapes.
  </div>
  <div class="s-item">S2 LO E 2.4.16: Analyzes and creates complex geometric patterns, including tessellations.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Understands measurable attributes of objects and the units, systems, and processes of such measurement, including those related to distance, length, weight, area, volume, and time, using non-standard and standard units.
  </div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Uses an appropriate unit and tool for the attribute (like length, perimeter, time, weight, volume) being measured.
  </div>
  <div class="s-item">S2 LO E 3.2.17: Identifies and uses appropriate tools and units for measuring length, weight, capacity, and time in daily-life situations.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Understands the definition and formula for the area of a square or rectangle as length times breadth.
  </div>
  <div class="s-item">S2 LO E 3.4.18: Calculates the area and perimeter of rectangles and composite figures using standard formulae.</div>
  <div class="s-item">S2 LO E 3.4.19: Estimates and calculates volume using unit cubes in varied orientations and arrangements.</div>

  <!-- C-3.5 -->
  <div class="c-item">
    C-3.5: Devises strategies for estimating the distance, length, time, perimeter (for regular and irregular shapes), area (for regular and irregular shapes), weight, and volume, and verifies the same using standard units.
  </div>
  <div class="s-item">S2 LO E 3.5.20: Solves real-life problems combining area, perimeter, or volume.</div>

  <!-- C-3.7 -->
  <div class="c-item">
    C-3.7: Evaluates the conservation of attributes like length and volume, and solves daily-life problems related to them.
  </div>
  <div class="s-item">S2 LO E 3.7.21: Solves daily-life problems involving conversion and comparison of lengths, weights, and capacities.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Develops problem-solving skills with procedural fluency to solve mathematical puzzles as well as daily-life problems, and as a step towards developing computational thinking.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Solves puzzles and daily-life problems involving one or more operations on whole numbers (including word puzzles and puzzles from 'recreational' areas, such as the construction of magic squares).
  </div>
  <div class="s-item">S2 LO E 4.1.22: Solves contextual word problems involving 1–2 arithmetic operations.</div>
  <div class="s-item">S2 LO E 4.1.23: Solves magic square or missing-value puzzles with arithmetic reasoning.</div>
  <div class="s-item">S2 LO E 4.1.24: Interprets and compares information from two or more data forms (e.g., pictograph and table) to solve reasoning-based problems.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Learns to systematically count and list all possible permutations or combinations given a constraint, in simple situations (e.g., how to make a committee of two people from a group of five people).
  </div>
  <div class="s-item">S2 LO E 4.2.25: Lists all possible combinations or arrangements in constrained situations (e.g., choosing outfits, seating pairs, simple committee formation).</div>

  <!-- C-4.3 -->
  <div class="c-item">
    C-4.3: Selects appropriate methods and tools for computing with whole numbers, such as mental computation, estimation, or paper-pencil calculation, in accordance with the context.</div>
 <div class="s-item">S2 LO E 4.3.26: Estimates and rounds numbers in the context of operations or measurement.</div>
  <div class="s-item">S2 LO E 4.3.27: Collects and organizes data in tables, tally charts, and bar graphs.</div>
  <div class="s-item">S2 LO E 4.3.28: Constructs bar graphs with appropriate labels and scales.</div>
  <div class="s-item">S2 LO E 4.3.29: Interprets bar graphs and compares categories.</div>

  <!-- CG-5 -->
  <div class="cg-line">
    CG-5: Knows and appreciates the development in India of the decimal place value system that is used around the world today.
  </div>

  <!-- C-5.1 -->
  <div class="c-item">
    C-5.1: Understands the development of zero in India and the Indian place value system for writing numerals, the history of its transmission to the world, and its modern impact on our lives and in all technology.
  </div>
  <div class="s-item">S2 LO E 5.1.30: Recognises key contributions of Indian mathematicians (e.g., zero, decimal system) and their influence on global mathematics.</div>
  </div>

  `,
 6: `<div class="container en">
  <div class="header-com">Class 6 - Mathematics</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers.
  </div>
  <div class="s-item">S2 LO F 1.1.1: Compares and orders large numbers (up to 20 digits) using Indian and International place value systems, and applies this understanding to solve problems involving relative magnitude in real-world contexts.</div>
  <div class="s-item">S2 LO F 1.1.2: Estimates the outcome of arithmetic operations (sum, difference, product, quotient) involving large numbers, justifying the chosen rounding strategy for a given context.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns.
  </div>
  <div class="s-item">S2 LO F 1.2.3: Analyzes and identifies the underlying rules for given numerical patterns (e.g., arithmetic, simple geometric progression involving multiplication by whole numbers, multiples, prime numbers), and predicts subsequent terms.</div>
  <div class="s-item">S2 LO F 1.2.4: Analyzes and articulates relationships between different number patterns (e.g., relation between even numbers and multiples of 2, squares and sums of odd numbers), and uses these relationships to solve related problems.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta.
  </div>
  <div class="s-item">S2 LO F 1.3.5: Solves multi-step problems involving all four basic operations on integers, including real-life scenarios like temperature changes or financial transactions.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line.
  </div>
  <div class="s-item">S2 LO F 1.4.6: Classifies numbers as natural, whole, integers, or rational based on their defining properties, and applies this classification to interpret and solve problems involving numerical relationships and ordering on a number line.</div>

  <!-- C-1.5 -->
  <div class="c-item">
    C-1.5: Explores the idea of percentage and applies it to solve problems.
  </div>
  <div class="s-item">S2 LO F 1.5.7: Converts fluently between fractions, decimals, and percentages, and strategically applies these conversions to solve multi-step problems involving proportions and comparisons in various real-life scenarios.</div>
  <div class="s-item">S2 LO F 1.5.8: Solves multi-step real-life problems involving finding a percentage of a quantity, finding a quantity given a percentage, or calculating percentage increase/decrease.</div>

  <!-- C-1.6 -->
  <div class="c-item">
    C-1.6: Explores and applies fractions (both as ratios and in decimal form) in daily-life situations.
  </div>
  <div class="s-item">S2 LO F 1.6.9: Performs multi-step calculations involving all four operations on fractions and decimals, applying them to solve real-world problems.</div>
  <div class="s-item">S2 LO F 1.6.10: Analyzes and applies fractional understanding to solve complex real-life problems involving ratios, including determining unknown quantities or comparing proportional relationships.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency.
  </div>

  <!-- C-2.3 -->
  <div class="c-item">
    C-2.3: Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations.
  </div>
  <div class="s-item">S2 LO F 2.3.10: Translates complex real-life scenarios into appropriate algebraic expressions using variables, constants, and coefficients, and interprets the meaning of each component within the given context.</div>
  <div class="s-item">S2 LO F 2.3.11: Simplifies and evaluates algebraic expressions involving multiple operations (addition, subtraction, and multiplication), and applies these skills to solve problems where algebraic simplification is a key step.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems.
  </div>
  <div class="s-item">S2 LO F 2.4.12: Solves one-variable linear equations, including those requiring multiple operations or derived from complex real-life word problems, and interprets the solution in the context of the problem.</div>

  <!-- C-2.5 -->
  <div class="c-item">
    C-2.5: Develops own methods to solve puzzles and problems using algebraic thinking.
  </div>
  <div class="s-item">S2 LO F 2.5.13: Applies algebraic thinking, including systematic variable assignment and equation formulation, to solve complex arithmetic puzzles and pattern-based problems, and evaluates the efficiency of different solution approaches.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D).
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes.
  </div>
  <div class="s-item">S2 LO F 3.1.14: Classifies and differentiates 2D shapes (angles, lines, triangles, quadrilaterals) and basic 3D shapes (cubes, cuboids, cylinders, cones) based on their defining properties and attributes, and uses these properties to analyze and solve problems involving geometric figures.</div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems.
  </div>
  <div class="s-item">S2 LO F 3.2.15: Applies properties of lines (intersecting, parallel, perpendicular) and angles (adjacent, vertically opposite, complementary, supplementary) to solve multi-step problems involving complex arrangements of lines and angles, justifying each step of the solution.</div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems.
  </div>
  <div class="s-item">S2 LO F 3.3.16: Analyzes 2D nets to identify corresponding 3D shapes (cubes, cuboids, prisms, pyramids), and predicts the resulting 3D shape from a given net, or constructs a net for a given 3D shape, justifying the spatial arrangement.</div>

  <!-- C-3.4 -->
  <div class="c-item">
    C-3.4: Draws and constructs geometric shapes, such as lines, parallel lines, perpendicular lines, angles, and simple triangles, with specified properties using a compass and straightedge.
  </div>
  <div class="s-item">S2 LO F 3.4.17: Determines the conditions necessary for constructing specific geometric shapes (e.g., triangles, parallel/perpendicular lines) given properties or constraints.</div>

  <!-- C-3.5 -->
  <div class="c-item">
    C-3.5: Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles.
  </div>
  <div class="s-item">S2 LO F 3.5.18: Compares and identifies congruent and similar 2D shapes based on corresponding measurements of sides and angles, and applies congruence and similarity criteria to solve problems</div>
 <div class="cg-line">
    CG-4: Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium, and develops strategies to find the areas of composite 2D shapes.
  </div>
  <div class="s-item">S2 LO F 4.1.19: Solves multi-step real-world problems involving the perimeter and area of rectangles, squares, triangles, and simple composite shapes, by applying appropriate formulae and decomposition strategies.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.
  </div>
  <div class="s-item">S2 LO F 4.2.20: Interprets visual representations of the relationship between the areas of squares on the sides of a right-angled triangle to understand the concept of the Pythagorean property.</div>

  <!-- C-4.3 -->
  <div class="c-item">
    C-4.3: Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world.
  </div>
  <div class="s-item">S2 LO F 4.3.21: Identifies and describes characteristics of tiling patterns (tessellations) and applies principles of basic symmetry (line, rotational) to analyze geometric designs.</div>

  <!-- C-4.4 -->
  <div class="c-item">
    C-4.4: Develops familiarity with the notion of fractals and identifies and appreciates the appearances of fractals in nature and art in India and around the world.
  </div>
  <div class="s-item">S2 LO F 4.4.22: Identifies and distinguishes patterns in natural forms and art that exhibit recursive or self-similar properties, relating them to the concept of fractals.</div>

  <!-- CG-5 -->
  <div class="cg-line">
    CG-5: Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences.
  </div>

  <!-- C-5.1 -->
  <div class="c-item">
    C-5.1: Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median.
  </div>
  <div class="s-item">S2 LO F 5.1.23: Organizes raw data into tables and calculates the mean of simple datasets, interpreting its meaning in context.</div>
  <div class="s-item">S2 LO F 5.1.24: Selects and justifies appropriate data collection methods and methods for organizing data (e.g., tally marks, frequency tables) for simple real-life scenarios.</div>

  <!-- C-5.2 -->
  <div class="c-item">
    C-5.2: Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.
  </div>
  <div class="s-item">S2 LO F 5.2.25: Interprets and compares information presented in bar graphs, pictographs, and simple pie charts to draw conclusions and answer analytical questions.</div>
  <div class="s-item">S2 LO F 5.2.26: Determines the most appropriate type of graphical representation (pictograph, bar graph, pie chart) for a given set of data and purpose.</div>

  <!-- CG-6 -->
  <div class="cg-line">
    CG-6: Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.
  </div>

  <!-- C-6.1 -->
  <div class="c-item">
    C-6.1: Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.
  </div>
  <div class="s-item">S2 LO F 6.1.27: Applies inductive and deductive reasoning to identify valid conclusions, complete logical sequences, and solve mathematical problems involving patterns and relationships.</div>

  <!-- CG-7 -->
  <div class="cg-line">
    CG-7: Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.
  </div>

  <!-- C-7.1 -->
  <div class="c-item">
    C-7.1: Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.
  </div>
  <div class="s-item">S2 LO F 7.1.28: Solves mathematical puzzles and riddles by employing logical strategies, identifying underlying patterns, and applying number properties.</div>

  <!-- CG-8 -->
  <div class="cg-line">
    CG-8: Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.
  </div>

  <!-- C-8.1 -->
  <div class="c-item">
    C-8.1: Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations, and reformulates problems into a series of ordered steps (i.e., algorithmic thinking).
  </div>
  <div class="s-item">S2 LO F 8.1.29: Identifies the logical sequence of steps (algorithm) required to solve multi-step mathematical problems or complete specific computational tasks.</div>

  <!-- C-8.2 -->
  <div class="c-item">
    C-8.2: Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.
  </div>
  <div class="s-item">S2 LO F 8.2.30: Interprets simple flowcharts or step-by-step instructions to predict the outcome of mathematical processes or operations.</div>
  <div class="s-item">S2 LO F 8.2.31: Analyzes iterative or recursive patterns to determine missing terms or predict the behavior of the sequence.</div>

  <!-- CG-9 -->
  <div class="cg-line">
    CG-9: Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.
  </div>

  <!-- C-9.1 -->
  <div class="c-item">
    C-9.1: Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations.
  </div>
  <div class="s-item">S2 LO F 9.1.32: Explains the significance of cultural and historical developments of fundamental mathematical concepts (e.g., number systems, the concept of zero, early algebraic ideas) from diverse civilizations.</div>

  <!-- CG-10 -->
  <div class="cg-line">
    CG-10: Knows about and appreciates the interaction of Mathematics with each of their other school subjects.
  </div>

  <!-- C-10.1 -->
  <div class="c-item">
    C-10.1: Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.
  </div>
  <div class="s-item">S2 LO F 10.1.33: Identifies and explains the application of mathematical concepts (e.g., patterns, measurement, symmetry, logical reasoning) in real-world contexts across various subjects like science, art, music, or sports.</div>
 </div>



  `,
 7: `<div class="container en">
  <div class="header-com">Class 7 - Mathematics</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers.
  </div>
  <div class="s-item">S2 LO G 1.1.1: Compares and orders large numbers (up to 12 digits, including billions and trillions) using both Indian and International place value systems in real-life contexts.</div>
  <div class="s-item">S2 LO G 1.1.2: Expresses and converts large numbers between standard form and exponential notation (powers of 10), interpreting the significance of the exponent.</div>
  <div class="s-item">S2 LO G 1.1.3: Estimates the outcome of multi-step arithmetic operations involving large numbers, selecting and justifying appropriate rounding strategies for specific real-life contexts.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns.
  </div>
  <div class="s-item">S2 LO G 1.2.4: Analyzes and extends numerical patterns involving powers, multiples, and simple arithmetic or geometric progressions, explaining their underlying rules.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Learns about the inclusion of zero and negative quantities as numbers, and the arithmetic operations on them, as given by Brahmagupta.
  </div>
  <div class="s-item">S2 LO G 1.3.5: Solves multi-step real-world problems involving all four basic operations on integers, interpreting the results and demonstrating conceptual understanding of operations with zero and negative numbers.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line.
  </div>
  <div class="s-item">S2 LO G 1.4.6: Classifies rational numbers and differentiates them from other number sets (e.g., integers, fractions, whole numbers), accurately locating them on the number line.</div>
  <div class="s-item">S2 LO G 1.4.7: Analyzes and applies the properties of rational numbers (closure, commutativity, associativity, identity, inverse, and distributivity) under various arithmetic operations to simplify expressions or justify steps.</div>

  <!-- C-1.5 -->
  <div class="c-item">
    C-1.5: Explores the idea of percentage and applies it to solve problems.
  </div>
  <div class="s-item">S2 LO G 1.5.8: Solves multi-step real-life problems involving profit, loss, discount, and simple interest using percentages.</div>

  <!-- C-1.6 -->
  <div class="c-item">
    C-1.6: Explores and applies fractions (both as ratios and in decimal form) in daily-life situations.
  </div>
  <div class="s-item">S2 LO G 1.6.9: Performs multi-step calculations with fractions, mixed numbers, and decimals in real-world contexts, including operations in measurements, money, and unit conversions.</div>
  <div class="s-item">S2 LO G 1.6.10: Applies ratios and proportions to solve real-life problems involving direct variation, unit rates, and scale factors.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Understands equality between numerical expressions and learns to check arithmetical equations.
  </div>
  <div class="s-item">S2 LO G 2.1.11: Determines the equivalence of algebraic expressions by applying properties of operations (e.g., distributive property) or by substituting values.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Extends the representation of a number in the form of a variable or an algebraic expression using a variable.
  </div>
  <div class="s-item">S2 LO G 2.2.12: Translates complex real-life scenarios into algebraic expressions or one-variable linear equations, and uses variables to generalize arithmetic or simple geometric patterns.</div>

  <!-- C-2.3 -->
  <div class="c-item">
    C-2.3: Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations.
  </div>
  <div class="s-item">S2 LO G 2.3.13: Simplifies and evaluates algebraic expressions involving multiple operations (addition, subtraction, and multiplication of monomials), including applying the distributive property.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems.
  </div>
  <div class="s-item">S2 LO G 2.4.14: Frames and solves multi-step one-variable linear equations from complex real-life situations or puzzles, including those requiring the use of distributive property or combining like terms.</div>

  <!-- C-2.5 -->
  <div class="c-item">
    C-2.5: Develops own methods to solve puzzles and problems using algebraic thinking.
  </div>
  <div class="s-item">S2 LO G 2.5.15: Solves complex logic-based algebraic puzzles by applying systematic methods and identifying efficient solution strategies.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D)
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes.
  </div>
  <div class="s-item">S2 LO G 3.1.16: Classifies and differentiates various types of angles (e.g., adjacent, linear pair, vertically opposite, complementary, supplementary, corresponding, alternate interior/exterior), lines (e.g., transversal), triangles (by angles/sides), and quadrilaterals (e.g., rhombus, parallelogram, trapezium) based on their defining properties.</div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems.
  </div>
  <div class="s-item">S2 LO G 3.2.17: Applies angle sum property of triangles and quadrilaterals, and properties of angles formed by parallel lines intersected by a transversal, to solve problems involving unknown angle measures.</div>

  <!-- C-3.3 -->
  <div class="c-item">
    C-3.3: Identifies attributes of three-dimensional shapes (cubes, parallelepipeds, cylinders, cones), works hands-on with material to construct these shapes, and also uses two-dimensional representations of three-dimensional objects to visualise and solve problems.
  </div>
  <div class="s-item">S2 LO G 3.3.18: Analyzes and identifies the correct 2D nets for prisms, pyramids, and cylinders, and visualizes the formation of the 3D shape from its net.</div>

  <!-- C-3.5 -->
  <div class="c-item">
    C-3.5: Understands congruence and similarity as it applies to geometric shapes and identifies similar and congruent triangles.
  </div>
  <div class="s-item">S2 LO G 3.5.19: Determines if two triangles are congruent using appropriate congruence criteria (SSS, SAS, ASA, RHS) and applies this understanding to solve problems involving geometric figures.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.</div>
 <div class="c-item">
    C-4.1: Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium, and develops strategies to find the areas of composite 2D shapes.
  </div>
  <div class="s-item">S2 LO G 4.1.20: Solves multi-step real-world problems involving the perimeter and area of parallelograms, triangles, trapeziums, and circles.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.
  </div>
  <div class="s-item">S2 LO G 4.2.21: Applies the Pythagorean property to find unknown side lengths in right-angled triangles in various geometric and real-world contexts.</div>

  <!-- C-4.3 -->
  <div class="c-item">
    C-4.3: Constructs various designs (using tiling) on a plane surface using different 2D shapes and appreciates their appearances in art in India and around the world.
  </div>
  <div class="s-item">S2 LO G 4.3.22: Identifies and describes the type of geometric transformation (reflection, rotation, translation) applied to shapes within a given pattern or design, and predicts the result of a simple transformation.</div>

  <!-- CG-5 -->
  <div class="cg-line">
    CG-5: Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences.
  </div>

  <!-- C-5.1 -->
  <div class="c-item">
    C-5.1: Collects, organises, and interprets the data using measures of central tendency such as average/mean, mode, and median.
  </div>
  <div class="s-item">S2 LO G 5.1.23: Calculates and interprets the mean, median, and mode for given real-life datasets, and justifies the most appropriate measure of central tendency for a specific context.</div>

  <!-- C-5.2 -->
  <div class="c-item">
    C-5.2: Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.
  </div>
  <div class="s-item">S2 LO G 5.2.24: Analyzes and interprets information from various graphical representations (bar graphs, pie charts, line graphs, and histograms), drawing conclusions and determining the most appropriate representation for a given dataset and purpose.</div>

  <!-- CG-6 -->
  <div class="cg-line">
    CG-6: Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.
  </div>

  <!-- C-6.1 -->
  <div class="c-item">
    C-6.1: Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.
  </div>
  <div class="s-item">S2 LO G 6.1.25: Analyzes and generalizes patterns in arithmetic or simple geometric sequences to predict future terms, derive rules, and apply them in problem-solving.</div>

  <!-- CG-7 -->
  <div class="cg-line">
    CG-7: Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.
  </div>

  <!-- C-7.1 -->
  <div class="c-item">
    C-7.1: Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.
  </div>
  <div class="s-item">S2 LO G 7.1.26: Solves complex mathematical puzzles and riddles by employing logical deduction, systematic trial-and-error, or spatial visualization strategies, and evaluates different problem-solving approaches for efficiency.</div>

  <!-- CG-8 -->
  <div class="cg-line">
    CG-8: Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.
  </div>

  <!-- C-8.1 -->
  <div class="c-item">
    C-8.1: Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into series of ordered steps (i.e., algorithmic thinking).
  </div>
  <div class="s-item">S2 LO G 8.1.27: Decomposes complex real-world problems into a series of logical, ordered steps (algorithm) to plan an effective solution strategy.</div>

  <!-- C-8.2 -->
  <div class="c-item">
    C-8.2: Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.
  </div>
  <div class="s-item">S2 LO G 8.2.28: Interprets and analyzes complex flowcharts or iterative processes to trace algorithmic execution, predict outputs, and evaluate their correctness or efficiency.</div>

  <!-- CG-9 -->
  <div class="cg-line">
    CG-9: Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.
  </div>

  <!-- C-9.1 -->
  <div class="c-item">
    C-9.1: Recognises how concepts (like counting numbers, whole numbers, negative numbers, rational numbers, zero, concepts of algebra, geometry) evolved over a period of time in different civilisations.
  </div>
  <div class="s-item">S2 LO G 9.1.29: Analyzes and compares the significant contributions of various ancient civilizations (e.g., Indian, Babylonian, Egyptian, Greek) to the development and evolution of specific mathematical concepts (e.g., number systems, place value, early algebra, geometry, concept of zero).</div>

  <!-- CG-10 -->
  <div class="cg-line">
    CG-10: Knows about and appreciates the interaction of Mathematics with each of their other school subjects.
  </div>

  <!-- C-10.1 -->
  <div class="c-item">
    C-10.1: Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.
  </div>
  <div class="s-item">S2 LO G 10.1.30: Analyzes interdisciplinary scenarios to identify and explain the application of specific mathematical concepts (e.g., patterns in music, ratios in cooking, statistics in social studies, geometry in architecture) across various subjects.</div>


  `,
 8: `<div class="container en">
  <div class="header-com">Class 8 - Mathematics</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Understands numbers and sets of numbers (whole numbers, fractions, integers, rational numbers, and real numbers), looks for patterns, and appreciates relationships between numbers.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Develops a sense for and an ability to manipulate (e.g., read, write, form, compare, estimate, and apply operations) and name (in words) large whole numbers of up to 20 digits, and expresses them in scientific notation using exponents and powers.
  </div>
  <div class="s-item">S2 LO H 1.1.1: Applies scientific notation and powers of 10 to represent and solve problems involving very large or very small numbers, interpreting their practical significance in real-world contexts.</div>
  <div class="s-item">S2 LO H 1.1.2: Computes and interprets squares, cubes, square roots, and cube roots of numbers, including real-world applications.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Discovers, identifies, and explores patterns in numbers and describes rules for their formation (e.g., multiples of 7, powers of 3, prime numbers), and explains relations between different patterns.
  </div>
  <div class="s-item">S2 LO H 1.2.3: Analyzes and describes the rules for complex numeric and geometric patterns (including recursive, arithmetic, and basic geometric sequences), predicting and verifying terms.</div>
  <div class="s-item">S2 LO H 1.2.4: Formulates algebraic expressions or rules to represent general terms of numerical patterns derived from real-life or symbolic contexts.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Explores and understands sets of numbers, such as whole numbers, fractions, integers, rational numbers, and real numbers, and their properties, and visualises them on the number line.
  </div>
  <div class="s-item">S2 LO H 1.4.5: Compares and contrasts properties of rational and irrational numbers, including their representation on the number line.</div>

  <!-- C-1.5 -->
  <div class="c-item">
    C-1.5: Explores the idea of percentage and applies it to solve problems.
  </div>
  <div class="s-item">S2 LO H 1.5.6: Solves multi-step real-life problems involving percentages, including profit, loss, discount, simple interest, and basic compound interest scenarios, justifying the calculation methods.</div>

  <!-- C-1.6 -->
  <div class="c-item">
    C-1.6: Explores and applies fractions (both as ratios and in decimal form) in daily-life situations.
  </div>
  <div class="s-item">S2 LO H 1.6.7: Solves complex real-life problems involving direct and inverse proportions, using ratios, fractions, or decimals as appropriate.</div>
  <div class="s-item">S2 LO H 1.6.8: Solves complex real-life problems involving ratios in shared quantities, mixtures, and scaling (e.g., maps, models, plans), including determining unknown scale factors or dimensions.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Understands the concepts of variable, constant, coefficient, expression, and (one-variable) equation, and uses these concepts to solve meaningful daily-life problems with procedural fluency.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Understands equality between numerical expressions and learns to check arithmetical equations.
  </div>
  <div class="s-item">S2 LO H 2.1.9: Simplifies complex algebraic expressions involving multiple operations, including products of binomials, and evaluates them for given variable values.</div>

  <!-- C-2.3 -->
  <div class="c-item">
    C-2.3: Forms algebraic expressions using variables, coefficients, and constants and manipulates them through basic operations.
  </div>
  <div class="s-item">S2 LO H 2.3.10: Applies standard algebraic identities (e.g., (a + b)², a² – b²) to simplify expressions, perform multiplication, and factorize polynomials.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Poses and solves linear equations to find the value of an unknown, including to solve puzzles and word problems.
  </div>
  <div class="s-item">S2 LO H 2.4.11: Solves linear equations in one variable, including those with rational coefficients and variables on both sides, and verifies the solution.</div>
  <div class="s-item">S2 LO H 2.4.12: Translates complex word problems into linear equations and interprets their solutions in context.</div>

  <!-- CG-3 -->
  <div class="cg-line">
    CG-3: Understands, formulates, and applies properties and theorems regarding simple geometric shapes (2D and 3D).
  </div>

  <!-- C-3.1 -->
  <div class="c-item">
    C-3.1: Describes, classifies, and understands relationships among different types of two- and three-dimensional shapes using their defining properties/attributes.
  </div>
  <div class="s-item">S2 LO H 3.1.13: Compares and contrasts polygons, especially quadrilaterals, based on their properties to justify classifications.</div>
  <div class="s-item">S2 LO H 3.1.14: Predicts the resulting 2D cross-sections of common 3D shapes (e.g., cubes, cylinders, cones) when cut by planes in various orientations, and accurately represents 3D objects from different perspectives (top, front, side views).</div>

  <!-- C-3.2 -->
  <div class="c-item">
    C-3.2: Outlines the properties of lines, angles, triangles, quadrilaterals, and polygons and applies them to solve related problems.
  </div>
  <div class="s-item">S2 LO H 3.2.15: Uses polygon angle theorems to determine unknown angles and regular polygon properties.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Develops understanding of perimeter and area for 2D shapes and uses them to solve day-to-day life problems.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Discovers, understands, and uses formulae to determine the area of a square, triangle, parallelogram, and trapezium and develops strategies to find the areas of composite 2D shapes.
  </div>
  <div class="s-item">S2 LO H 4.1.16: Applies formulae and develops strategies to calculate areas and perimeters of complex composite 2D shapes, including those with unknown dimensions or in real-world problem-solving contexts.</div>
  <div class="s-item">S2 LO H 4.1.17: Solves real-world problems involving the surface area and volume of cubes, cuboids, and cylinders.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Learns the Baudhayana-Pythagoras theorem on the lengths of the sides of a right-angled triangle, and discovers a geometric proof using areas of squares erected on the sides of the triangle, and other related geometric constructions from the Sulba-Sutras.
  </div>
  <div class="s-item">S2 LO H 4.2.18: Analyzes and explains different geometric proofs or justifications for the Pythagorean theorem, relating them to areas of squares on the sides of a right-angled triangle.</div>

  <!-- CG-5 -->
  <div class="cg-line">
    CG-5: Collects, organises, represents (graphically and in tables), and interprets data/information from daily-life experiences.
  </div>

  <!-- C-5.1 -->
  <div class="c-item">
    C-5.1: Collects, organises, and interprets the data using measures of central tendencies such as average/mean, mode, and median.
  </div>
  <div class="s-item">S2 LO H 5.1.19: Calculates the probability of simple events and applies basic probability concepts to real-life situations.</div>

  <!-- C-5.2 -->
  <div class="c-item">
    C-5.2: Selects, creates, and uses appropriate graphical representations (e.g., pictographs, bar graphs, histograms, line graphs, and pie charts) of data to make interpretations.
  </div>
  <div class="s-item">S2 LO H 5.2.20: Analyzes and interprets data from various graphical representations (including histograms and frequency polygons for grouped data), drawing inferences and making predictions based on observed trends.</div>

  <!-- CG-6 -->
  <div class="cg-line">
    CG-6: Develops mathematical thinking and the ability to communicate mathematical ideas logically and precisely.
  </div>

  <!-- C-6.1 -->
  <div class="c-item">
    C-6.1: Applies both inductive and deductive logic to formulate definitions and conjectures, evaluate and produce convincing arguments or proofs to turn these definitions and conjectures into theorems or correct statements, particularly in the areas of algebra, elementary number theory, and geometry.
  </div>
  <div class="s-item">S2 LO H 6.1.20: Evaluates and constructs simple logical arguments or justifications for mathematical statements in number theory, algebra, or geometry.</div>

  <!-- CG-7 -->
  <div class="cg-line">
    CG-7: Engages with puzzles and mathematical problems and develops own creative methods and strategies to solve them.
  </div>

  <!-- C-7.1 -->
  <div class="c-item">
    C-7.1: Demonstrates creativity in discovering one's own solutions to puzzles and other problems, and appreciates the work of others in finding their own, possibly different, solutions.
  </div>
  <div class="s-item">S2 LO H 7.1.21: Solves non-routine mathematical problems and complex puzzles by applying advanced problem-solving strategies, including working backwards, creating models, or identifying invariants.</div>

  <!-- CG-8 -->
  <div class="cg-line">
    CG-8: Develops basic skills and capacities of computational thinking, namely, decomposition, pattern recognition, data representation, generalisation, abstraction, and algorithms in order to solve problems where such techniques of computational thinking are effective.
  </div>

  <!-- C-8.1 -->
  <div class="c-item">
    C-8.1: Approaches problems using programmatic thinking techniques such as iteration, symbolic representation, and logical operations and reformulates problems into a series of ordered steps (i.e., algorithmic thinking).
  </div>
  <div class="s-item">S2 LO H 8.1.22: Designs or evaluates algorithms for solving mathematical problems, assessing their correctness, efficiency, and limitations.</div>

  <!-- C-8.2 -->
  <div class="c-item">
    C-8.2: Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.
  </div>
  <div class="s-item">S2 LO H 8.1.23: Interprets and analyzes complex flowcharts or iterative processes to trace algorithmic execution, predict outputs, and evaluate their correctness or efficiency.</div>

  <!-- CG-9 -->
  <div class="cg-line">
    CG-9: Knows and appreciates the development of mathematical ideas over a period of time and the contributions of past and modern mathematicians from India and across the world.
  </div>

  <!-- C-9.1 -->
  <div class="c-item">
    C-9.1: Learns systematic counting and listing, systematic reasoning about counts and iterative patterns, and multiple data representations; learns to devise and follow algorithms, with an eye towards understanding correctness, effectiveness, and efficiency of algorithms.
  </div>
  <div class="s-item">S2 LO H 8.1.24: Evaluates the interconnectedness and long-term impact of significant mathematical contributions from various ancient civilizations (e.g., Indian, Babylonian, Egyptian, Greek) on the global development of mathematical thought and modern concepts.</div>

  <!-- CG-10 -->
  <div class="cg-line">
    CG-10: Knows about and appreciates the interaction of Mathematics with each of their other school subjects.
  </div>

  <!-- C-10.1 -->
  <div class="c-item">
    C-10.1: Recognises interaction of Mathematics with multiple subjects across Science, Social Science, Visual Arts, Music, Vocational Education, and Sports.
  </div>
  <div class="s-item">S2 LO H 10.1.25: Analyzes and explains the application of mathematical principles (e.g., ratios in chemistry, transformations in art, statistical analysis in social science) to solve problems or understand phenomena in other academic disciplines.</div>
</div>
  `,
  },

  evs: {

    1: `
    <div class="container en">
  <div class="header-com">Class 1 - EVS</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Children develop habits that keep them healthy and safe.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Shows a liking for and understanding of nutritious food and does not waste food.
  </div>
  <div class="s-item">S3 LO A 1.1.1: Distinguishes healthy versus unhealthy food choices in familiar contexts, relating these to basic well-being.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Practices basic self-care and hygiene.
  </div>
  <div class="s-item">S3 LO A 1.2.2: Distinguishes personal hygiene practices from unhygienic habits in familiar daily situations.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Keeps the school/classroom hygienic and organised.
  </div>
  <div class="s-item">S3 LO A 1.3.3: Identifies the correct disposal method and bin type (wet, dry, recyclable) for everyday waste.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Practices safe use of materials and simple tools.
  </div>
  <div class="s-item">S3 LO A 1.4.4: Distinguishes safe from unsafe ways of using common home or school materials in short scenarios (e.g., scissors, glue, soap, crayons).</div>

  <!-- C-1.5 -->
  <div class="c-item">
    C-1.5: Shows awareness of safety in movements (walking, running, cycling) and acts appropriately.
  </div>
  <div class="s-item">S3 LO A 1.5.5: Distinguishes safe and unsafe behaviors while walking, running, or cycling in familiar settings.</div>

  <!-- C-1.6 -->
  <div class="c-item">
    C-1.6: Understands unsafe situations and asks for help in those situations.
  </div>
  <div class="s-item">S3 LO A 1.6.6: Recognises unsafe situations and identifies correct responses in familiar home, school, or public settings.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Children develop sharpness in sensorial perceptions.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Differentiates between shapes, colours, and their shades.
  </div>
  <div class="s-item">S3 LO A 2.1.7: Predicts colours formed by mixing two primary colours.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Develops visual memory for symbols and representations.
  </div>
  <div class="s-item">S3 LO A 2.2.8: Recognises commonly seen visual symbols (e.g., restroom signs, traffic signals, dustbin icons) and their meaning.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Differentiates multiple smells and tastes.
  </div>
  <div class="s-item">S3 LO A 2.4.9: Recognises the typical taste (sweet, salty, sour, bitter) of given familiar food items presented visually.</div>

  <!-- C-2.5 -->
  <div class="c-item">
    C-2.5: Develops discrimination in the sense of touch
  </div>
  <div class="s-item">S3 LO A 2.5.10: Identifies descriptive words for texture (smooth, rough, soft, hard) through familiar visual examples.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Children develop emotional intelligence.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Starts recognising ‘self’ as an individual belonging to a family and community.
  </div>
  <div class="s-item">S3 LO A 4.1.11: Recognises how family members help each other or the community through their work.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Recognises different emotions and makes a deliberate effort to regulate them appropriately.
  </div>
  <div class="s-item">S3 LO A 4.2.12: Identifies emotions by observing facial expressions in pictures.</div>

  <!-- C-4.5 -->
  <div class="c-item">
    C-4.5: Understands and responds positively to social norms in the classroom and school.
  </div>
  <div class="s-item">S3 LO A 4.5.13: Recognises classroom or school rules that promote safety and cooperation.</div>

  <!-- C-4.6 -->
  <div class="c-item">
    C-4.6: Shows kindness and helpfulness to others (including animals, plants) when they are in need.
  </div>
  <div class="s-item">S3 LO A 4.6.14: Identifies caring and helpful behaviours toward animals and plants in need.</div>

  <!-- C-4.7 -->
  <div class="c-item">
    C-4.7: Understands and responds positively to the different thoughts, preferences, and emotional needs of other children.
  </div>
  <div class="s-item">S3 LO A 4.7.15: Recognises inclusive and kind behaviours toward peers with different thoughts, feelings, or preferences.</div>

  <!-- CG-5 -->
  <div class="cg-line">
    CG-5: Children develop a positive attitude towards productive work and service, or ‘Seva’.
  </div>

  <!-- C-5.1 -->
  <div class="c-item">
    C-5.1: Demonstrates willingness and participation in age-appropriate physical work towards helping others.
  </div>
  <div class="s-item">S3 LO A 5.1.16: Recognises reasons for caring for plants and the environment in familiar situations.</div>

  <!-- CG-6 -->
  <div class="cg-line">
    CG-6: Children develop a positive regard for the natural environment around them.
  </div>

  <!-- C-6.1 -->
  <div class="c-item">
    C-6.1: Shows care and joy in engaging with all life forms.
  </div>
  <div class="s-item">S3 LO A 6.1.17: Identifies common local plants and animals.</div>
  <div class="s-item">S3 LO A 6.1.18: Connects key features or uses of common local plants and animals.</div>

  <!-- CG-7 -->
  <div class="cg-line">
    CG-7: Make sense of the world around through observation and logical thinking.
  </div>

  <!-- C-7.1 -->
  <div class="c-item">
    C-7.1: Observes and understands different categories of objects and relationships between them.
  </div>
  <div class="s-item">S3 LO A 7.1.19: Recognises key features of objects, animals, or people in familiar pictures.</div>
  <div class="s-item">S3 LO A 7.1.20: Groups objects as living or non-living using observable features.</div>

  <!-- C-7.2 -->
  <div class="c-item">
    C-7.2: Observes and understands cause and effect relationships in nature by forming simple hypotheses and uses observations to explain their hypothesis.
  </div>
  <div class="s-item">S3 LO A 7.2.21: Recognises sunrise and sunset patterns from daily observations.</div>
  <div class="s-item">S3 LO A 7.2.22: Recognises the pattern of day and night based on the sun and moon movement.</div>
  <div class="s-item">S3 LO A 7.2.23: Identifies features of different seasons based on observable changes in the environment (e.g., weather, trees, sky).</div>
  <div class="s-item">S3 LO A 7.2.24: Identifies human or animal actions linked to seasonal changes (e.g., wearing woollens in winter, birds migrating).</div>
  <div class="s-item">S3 LO A 7.2.25: Recognises examples of how humans depend on nature in daily life. (e.g., trees give clean air, rain grows crops)</div>

  <!-- C-7.3 -->
  <div class="c-item">
    C-7.3: Uses appropriate tools and technology in daily life situations and for learning.
  </div>
  <div class="s-item">S3 LO A 7.3.26: Identifies simple tools and technology used in daily life.</div>

  <div class="cg-line">
    CG-13: Children develop habits of learning that allow them to engage actively in formal learning environments like a school classroom.
  </div>

  <!-- C-13.2 -->
  <div class="c-item">
    C-13.2: Memory and mental flexibility: Develops adequate working memory, mental flexibility (to sustain or shift attention appropriately), and self-control (to resist impulsive actions or responses) that would assist them in learning in structured environments.
  </div>
  <div class="s-item">S3 LO A 13.2.27: Detects missing elements in two similar pictures or patterns.</div>

  <!-- C-13.3 -->
  <div class="c-item">
    C-13.3: Observation, wonder, curiosity, and exploration: Observes minute details of objects, wonders, and explores using various senses, tinkers with objects, and asks questions.
  </div>
  <div class="s-item">S3 LO A 13.3.28: Identifies natural resources and recognises their everyday uses from given pictures.</div>

  <!-- C-13.4 -->
  <div class="c-item">
    C-13.4: Classroom norms: Adopts and follows norms with agency and understanding.
  </div>
  <div class="s-item">S3 LO A 13.4.29: Recognises common classroom rules shown in familiar pictures.</div>
</div>

















   

       `,
     2: `<div class="container en">
  <div class="header-com">Class 2 - EVS</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Children develop habits that keep them healthy and safe.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Shows a liking for and understanding of nutritious food and does not waste food.
  </div>
  <div class="s-item">S3 LO B 1.1.1: Distinguishes between healthy and unhealthy packaged foods by observing labels or pictures of ingredients.</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Practices basic self-care and hygiene.
  </div>
  <div class="s-item">S3 LO B 1.2.2: Distinguishes appropriate hygiene practices from inappropriate ones in familiar daily routines.</div>
  <div class="s-item">S3 LO B 1.2.3: Recognises safe ways to store and drink water at home or school.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Keeps the school/classroom hygienic and organised.
  </div>
  <div class="s-item">S3 LO B 1.3.4: Sorts waste as wet, dry, or recyclable using pictures or real-life examples.</div>
  <div class="s-item">S3 LO B 1.3.5: Identifies the reasons why separating wet and dry waste helps maintain cleanliness and prevents health problems.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Practices safe use of materials and simple tools.
  </div>
  <div class="s-item">S3 LO B 1.4.6: Recognises safe versus unsafe uses of familiar classroom or home tools shown in scenarios.</div>

  <!-- C-1.5 -->
  <div class="c-item">
    C-1.5: Shows awareness of safety in movements (walking, running, cycling) and acts appropriately.
  </div>
  <div class="s-item">S3 LO B 1.5.7: Identifies common safety symbols (e.g., traffic light, zebra crossing).</div>
  <div class="s-item">S3 LO B 1.5.8: Interprets what action should be taken in a given safety scenario based on the symbol shown.</div>

  <!-- C-1.6 -->
  <div class="c-item">
    C-1.6: Understands unsafe situations and asks for help in those situations.
  </div>
  <div class="s-item">S3 LO B 1.6.9: Identifies safe and unsafe situations in a given scenario.</div>
  <div class="s-item">S3 LO B 1.6.10: Recognises whom to approach for help in unsafe situations.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Children develop sharpness in sensorial perceptions.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Differentiates between shapes, colours, and their shades.
  </div>
  <div class="s-item">S3 LO B 2.1.11: Associates shapes and colour shades of familiar objects with their correct names or categories.</div>

  <!-- C-2.2 -->
  <div class="c-item">
    C-2.2: Develops visual memory for symbols and representations.
  </div>
  <div class="s-item">S3 LO B 2.2.12: Associates commonly seen visual symbols to their correct meaning or use.</div>

  <!-- C-2.4 -->
  <div class="c-item">
    C-2.4: Differentiates multiple smells and tastes.
  </div>
  <div class="s-item">S3 LO B 2.4.13: Infers the dominant taste of a food item based on visual or contextual clues in a given scenario.</div>

  <!-- C-2.5 -->
  <div class="c-item">
    C-2.5: Develops discrimination in the sense of touch.
  </div>
  <div class="s-item">S3 LO B 2.5.14: Identifies objects based on texture using correct descriptive words.</div>
  <div class="s-item">S3 LO B 2.5.15: Sorts or groups familiar objects based on differences or similarities in texture.</div>

  <!-- CG-4 -->
  <div class="cg-line">
    CG-4: Children develop emotional intelligence.
  </div>

  <!-- C-4.1 -->
  <div class="c-item">
    C-4.1: Starts recognising ‘self’ as an individual belonging to a family and community.
  </div>
  <div class="s-item">S3 LO B 4.1.16: Identifies how adult family members’ jobs or roles help meet needs in the community.</div>

  <!-- C-4.2 -->
  <div class="c-item">
    C-4.2: Recognises different emotions and makes a deliberate effort to regulate them appropriately.
  </div>
  <div class="s-item">S3 LO B 4.2.17: Recognises appropriate ways to manage strong feelings in familiar situations.</div>

  <!-- C-4.5 -->
  <div class="c-item">
    C-4.5: Understands and responds positively to social norms in the classroom and school.
  </div>
  <div class="s-item">S3 LO B 4.5.18: Identifies reasons why classroom rules are important for safety and fairness.</div>

  <!-- C-4.6 -->
  <div class="c-item">
    C-4.6: Shows kindness and helpfulness to others (including animals, plants) when they are in need.
  </div>
  <div class="s-item">S3 LO B 4.6.19: Identifies actions that reflect kindness and helpfulness towards living beings in real-life situations.</div>

  <!-- C-4.7 -->
  <div class="c-item">
    C-4.7: Understands and responds positively to the different thoughts, preferences, and emotional needs of other children.
  </div>
  <div class="s-item">S3 LO B 4.7.20: Recognises respectful ways to respond to different thoughts or opinions of a diverse group of peers.</div>

  <!-- CG-6 -->
  <div class="cg-line">
    CG-6: Children develop a positive regard for the natural environment around them.
  </div>

  <!-- C-6.1 -->
  <div class="c-item">
    C-6.1: Shows care for and joy in engaging with all life forms.
  </div>
  <div class="s-item">S3 LO B 6.1.21: Identifies correct ways to care for pets, plants, and small animals in daily life.</div>
  <div class="s-item">S3 LO B 6.1.22: Recognises actions that may harm plants, pets, or small living beings.</div>

  <!-- CG-7 -->
  <div class="cg-line">
    CG-7: Children make sense of the world around them through observation and logical thinking.
  </div>

  <!-- C-7.1 -->
  <div class="c-item">
    C-7.1: Observes and understands different categories of objects and relationships between them.
  </div>
  <div class="s-item">S3 LO B 7.1.23: Identifies key similar and different features of animals and birds.</div>
  <div class="s-item">S3 LO B 7.1.24: Compares given objects/pictures and identifies similarities and differences.</div>

  <!-- C-7.2 -->
  <div class="c-item">
    C-7.2: Observes and understands cause and effect relationships in nature by forming simple hypotheses.
  </div>
  <div class="s-item">S3 LO B 7.2.25: Identifies the effect of one object on another (e.g., Salt dissolves in water).</div>
  <div class="s-item">S3 LO B 7.2.26: Recognises the effect of simple actions on objects (e.g., a harder kick goes farther).</div>
  <div class="s-item">S3 LO B 7.2.27: Analyses how specific human actions affect different parts of the environment in a given scenario.</div>
  <div class="s-item">S3 LO B 7.2.28: Analyses a simple scenario to identify how human actions affect the balance between needs and care for the environment.</div>

  <!-- C-7.3 -->
  <div class="c-item">
    C-7.3: Uses appropriate tools and technology in daily life situations and for learning.
  </div>
  <div class="s-item">S3 LO B 7.3.29: Recognises the purpose of simple tools used in daily life.</div>

  <!-- CG-8 -->
  <div class="cg-line">
    CG-8: Children develop mathematical understanding and abilities to recognize the world through quantities, shapes, and measures.
  </div>

  <!-- C-8.1 -->
  <div class="c-item">
    C-8.1: Sorts objects into groups and sub-groups based on more than one property.
  </div>
  <div class="s-item">S3 LO B 8.1.30: Sorts plants into groups based on multiple properties such as type or use.</div>
  <div class="s-item">S3 LO B 8.1.31: Sorts animals into groups based on multiple properties such as type or habitat.</div>

  <!-- CG-13 -->
  <div class="cg-line">
    CG-13: Children develop habits of learning that allow them to engage actively in formal learning environments like a school classroom.
  </div>

  <!-- C-13.2 -->
  <div class="c-item">
    C-13.2: Memory and mental flexibility: Develops adequate working memory, mental flexibility (to sustain or shift attention appropriately), and self-control (to resist impulsive actions or responses) that would assist them in learning in structured environments.
  </div>
  <div class="s-item">S3 LO A 13.2.32: Identifies significant differences in two similar pictures or patterns.</div>

  <!-- C-13.3 -->
  <div class="c-item">
    C-13.3: Observation, wonder, curiosity, and exploration: Observes minute details of objects, wonders, and explores using various senses, tinkers with objects, and asks questions.
  </div>
  <div class="s-item">S3 LO A 13.3.33: Identifies appropriate ways to use natural resources from the immediate surroundings responsibly.</div>
  <div class="s-item">S3 LO A 13.3.34: Recognises appropriate objects or tools shown in pictures for exploring nature.</div>

  <!-- C-13.4 -->
  <div class="c-item">
    C-13.4: Classroom norms: Adopts and follows norms with agency and understanding.
  </div>
  <div class="s-item">S3 LO A 13.4.35: Recognises appropriate classroom behaviours that support learning and cooperation.</div>
</div>

       `,   
     3: `<div class="container en">
  <div class="header-com">Class 3 - EVS</div>

  <!-- CG-1 -->
  <div class="cg-line">
    CG-1: Explores and engages with the natural and socio-cultural environment in their surroundings.
  </div>

  <!-- C-1.1 -->
  <div class="c-item">
    C-1.1: Observes and identifies the natural (insects, plants, birds, animals, geographical features, sun and moon, stars, planets, natural resources) and social (houses, relationships) components in their immediate environment.
  </div>
  <div class="s-item">S3 LO C 1.1.1: Classifies natural components into groups (e.g., living/non-living, plant/animal).</div>
  <div class="s-item">S3 LO C 1.1.2: Sequences planets in order from the Sun using names or visual cues.</div>
  <div class="s-item">S3 LO C 1.1.3: Identifies characteristics of common plants, birds, or animals that help them survive in their local surroundings.</div>
  <div class="s-item">S3 LO C 1.1.4: Recognizes the relationship between a local animal/bird and its habitat (e.g., nest, burrow, pond).</div>

  <!-- C-1.2 -->
  <div class="c-item">
    C-1.2: Describes relationships (including between humans and animals/nature) and traditions (art forms, celebrations, festivals) in the family and community.
  </div>
  <div class="s-item">S3 LO C 1.2.5: Recognises how natural elements (like crops, rivers, seasons) are linked with local festivals.</div>
  <div class="s-item">S3 LO C 1.2.6: Identifies ways animals contribute to human needs and cultural practices.</div>
  <div class="s-item">S3 LO C 1.2.7: Analyses how the roles of different family members contribute to the well-being and functioning of the household or community.</div>
  <div class="s-item">S3 LO C 1.2.8: Identifies how traditional art forms are connected to celebrations or community events.</div>

  <!-- C-1.3 -->
  <div class="c-item">
    C-1.3: Asks questions and makes predictions about simple patterns (season change, food chain, phases of the moon, movement of stars and planets, shapes of trees, plants, leaves, and flowers, rituals, celebrations) observed in the immediate environment.
  </div>
  <div class="s-item">S3 LO C 1.3.9: Identifies how observable patterns (like seasons or temperature) influence human activities in daily life.</div>
  <div class="s-item">S3 LO C 1.3.10: Identifies observable changes in nature that occur with each season.</div>

  <!-- C-1.4 -->
  <div class="c-item">
    C-1.4: Explains the functioning of local institutions (family, school, bank/post office, market, and panchayat) in different forms (story, drawing, tabulating data, reports), and analyses their roles.
  </div>
  <div class="s-item">S3 LO C 1.4.11: Identifies a local institution (family, school, bank/post office, market, panchayat) from a brief description of the service it provides.</div>

  <!-- CG-2 -->
  <div class="cg-line">
    CG-2: Understands the interdependence in their environment through observation and experiences, developing the basis for appreciation of the idea of ‘Vasudhaiva Kutumbakam’.
  </div>

  <!-- C-2.1 -->
  <div class="c-item">
    C-2.1: Identifies natural and human-made systems that support their lives (water supply, water cycle, river flow systems, seasons, life cycle of plants and animals, food, household items, transport, communication, electricity in the home).
  </div>
  <div class="s-item">S3 LO C 2.1.12: Identifies how stages of an animal’s life cycle support human needs.</div>
  <div class="s-item">S3 LO C 2.1.13: Identifies everyday uses of plants at different stages of their life cycle (e.g., seed, 
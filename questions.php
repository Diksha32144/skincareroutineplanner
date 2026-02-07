<?php
include "auth_check.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skin Test</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * { margin:0;
         padding:0; 
        box-sizing:border-box; 
        font-family:'Poppins', sans-serif; 
    }
        body {
            min-height:100vh;
            background: linear-gradient(135deg, #f6d1ff, #c2e9fb);
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px 15px;
        }
        .container {
            width:100%;
            max-width:850px;
            background: rgba(255,255,255,0.35);
            backdrop-filter: blur(12px);
            border-radius:20px;
            padding:35px 40px;
            box-shadow:0 10px 35px rgba(0,0,0,0.15);
        }
        h2 {
         text-align:center;
         font-size:28px;
          margin-bottom:8px;
           }
        .subtitle {
         text-align:center; font-size:15px; margin-bottom:30px; color:#333; }
        .question { margin-top:22px; font-size:16px; color:#222; }
        .op { display:block; margin:8px 0 8px 18px; font-size:15px; cursor:pointer; }
        .op input { margin-right:8px; transform:scale(1.1); }
        button {
            margin-top:30px;
            width:100%;
            padding:14px;
            font-size:16px;
            font-weight:600;
            border:none;
            border-radius:12px;
            cursor:pointer;
            background: linear-gradient(135deg, #a855f7, #6366f1);
            color:white;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        button:hover { transform:translateY(-2px); box-shadow:0 6px 15px rgba(0,0,0,0.25); }
    </style>
</head>
<body>

<div class="container">
    <h2>🧴 Complete Skin Analysis Test</h2>
    <p>Answer all questions honestly</p>


    <form method="POST" action="result.php">

        <!-- Q1 -->
        <p class="question"><b>1. How does your skin feel right after cleansing?</b></p>
        <label class="op"><input type="radio" name="q1" value="dry" required> Very tight and dry</label>
        <label class="op"><input type="radio" name="q1" value="oily"> Oily and greasy</label>
        <label class="op"><input type="radio" name="q1" value="normal"> Balanced / comfortable</label>
        <label class="op"><input type="radio" name="q1" value="combination"> Dry in some areas, oily in T-zone</label>
        <label class="op"><input type="radio" name="q1" value="sensitive"> Red, itchy, or stings</label>

        <!-- Q2 -->
        <p class="question"><b>2. How often does your skin look shiny during the day?</b></p>
        <label class="op"><input type="radio" name="q2" value="oily" required> Almost always</label>
        <label class="op"><input type="radio" name="q2" value="combination"> Only T-zone</label>
        <label class="op"><input type="radio" name="q2" value="dry"> Rarely</label>
        <label class="op"><input type="radio" name="q2" value="normal"> Occasionally</label>
        <label class="op"><input type="radio" name="q2" value="sensitive"> With redness or irritation</label>

        <!-- Q3 -->
        <p class="question"><b>3. How often do you experience breakouts/pimples?</b></p>
        <label class="op"><input type="radio" name="q3" value="oily" required> Very often</label>
        <label class="op"><input type="radio" name="q3" value="combination"> Sometimes, mostly T-zone</label>
        <label class="op"><input type="radio" name="q3" value="normal"> Rarely</label>
        <label class="op"><input type="radio" name="q3" value="dry"> Almost never</label>
        <label class="op"><input type="radio" name="q3" value="sensitive"> After using new products</label>

       


<!-- Q4 -->
<p class="question"><b>4. How does your skin feel by evening?</b></p>
<label class="op"><input type="radio" name="q4" value="oily" required> Very greasy</label>
<label class="op"><input type="radio" name="q4" value="combination"> Oily in parts</label>
<label class="op"><input type="radio" name="q4" value="normal"> Balanced</label>
<label class="op"><input type="radio" name="q4" value="dry"> Dry & tight</label>
<label class="op"><input type="radio" name="q4" value="sensitive"> Itchy / irritated</label>

<!-- Q5 -->
<p class="question"><b>5. How visible are your pores?</b></p>
<label class="op"><input type="radio" name="q5" value="oily" required> Very large</label>
<label class="op"><input type="radio" name="q5" value="combination"> Large in T-zone</label>
<label class="op"><input type="radio" name="q5" value="normal"> Medium</label>
<label class="op"><input type="radio" name="q5" value="dry"> Small</label>
<label class="op"><input type="radio" name="q5" value="sensitive"> Red around pores</label>

<!-- Q6 -->
<p class="question"><b>6. How does your skin react to new skincare products?</b></p>
<label class="op"><input type="radio" name="q6" value="sensitive" required> Burning, stinging, or rash</label>
<label class="op"><input type="radio" name="q6" value="combination"> Mild reaction</label>
<label class="op"><input type="radio" name="q6" value="oily"> Breakouts</label>
<label class="op"><input type="radio" name="q6" value="normal"> No reaction</label>
<label class="op"><input type="radio" name="q6" value="dry"> Tightness or flaking</label>

<!-- Q7 -->
<p class="question"><b>7. How often does your skin feel flaky or rough?</b></p>
<label class="op"><input type="radio" name="q7" value="dry" required> Very often</label>
<label class="op"><input type="radio" name="q7" value="combination"> Some areas</label>
<label class="op"><input type="radio" name="q7" value="normal"> Rarely</label>
<label class="op"><input type="radio" name="q7" value="oily"> Never</label>
<label class="op"><input type="radio" name="q7" value="sensitive"> With redness or irritation</label>

<!-- Q8 -->
<p class="question"><b>8. Do you need moisturizer daily?</b></p>
<label class="op"><input type="radio" name="q8" value="dry" required> Multiple times</label>
<label class="op"><input type="radio" name="q8" value="combination"> Only on dry areas</label>
<label class="op"><input type="radio" name="q8" value="normal"> Once daily</label>
<label class="op"><input type="radio" name="q8" value="oily"> Rarely</label>
<label class="op"><input type="radio" name="q8" value="sensitive"> Only gentle creams</label>

<!-- Q9 -->
<p class="question"><b>9. How oily does your T-zone (forehead, nose, chin) feel?</b></p>
<label class="op"><input type="radio" name="q9" value="oily" required> Very oily</label>
<label class="op"><input type="radio" name="q9" value="combination"> Oily in T-zone only</label>
<label class="op"><input type="radio" name="q9" value="normal"> Normal</label>
<label class="op"><input type="radio" name="q9" value="dry"> Dry</label>
<label class="op"><input type="radio" name="q9" value="sensitive"> Red / irritated</label>

<!-- Q10 -->
<p class="question"><b>10. How does makeup last on your skin?</b></p>
<label class="op"><input type="radio" name="q10" value="oily" required> Melts</label>
<label class="op"><input type="radio" name="q10" value="combination"> Breaks in T-zone</label>
<label class="op"><input type="radio" name="q10" value="normal"> Stays well</label>
<label class="op"><input type="radio" name="q10" value="dry"> Cracks</label>
<label class="op"><input type="radio" name="q10" value="sensitive"> Causes irritation</label>

<!-- Q11 -->
<p class="question"><b>11. How often does your face feel greasy?</b></p>
<label class="op"><input type="radio" name="q11" value="oily" required> Always</label>
<label class="op"><input type="radio" name="q11" value="combination"> Sometimes</label>
<label class="op"><input type="radio" name="q11" value="normal"> Rarely</label>
<label class="op"><input type="radio" name="q11" value="dry"> Never</label>
<label class="op"><input type="radio" name="q11" value="sensitive"> With redness</label>

<!-- Q12 -->
<p class="question"><b>12. How does your skin feel in winter or dry environments?</b></p>
<label class="op"><input type="radio" name="q12" value="dry" required> Extremely dry</label>
<label class="op"><input type="radio" name="q12" value="combination"> Dry patches in some areas</label>
<label class="op"><input type="radio" name="q12" value="normal"> Normal</label>
<label class="op"><input type="radio" name="q12" value="oily"> Still oily</label>
<label class="op"><input type="radio" name="q12" value="sensitive"> Red & itchy</label>

<!-- Q13 -->
<p class="question"><b>13. How often do you blot or remove oil?</b></p>
<label class="op"><input type="radio" name="q13" value="oily" required> Many times</label>
<label class="op"><input type="radio" name="q13" value="combination"> T-zone only</label>
<label class="op"><input type="radio" name="q13" value="normal"> Rarely</label>
<label class="op"><input type="radio" name="q13" value="dry"> Never</label>
<label class="op"><input type="radio" name="q13" value="sensitive"> Avoid blotting</label>

<!-- Q14 -->
<p class="question"><b>14. Skin texture?</b></p>
<label class="op"><input type="radio" name="q14" value="dry" required> Rough</label>
<label class="op"><input type="radio" name="q14" value="combination"> Uneven / mixed</label>
<label class="op"><input type="radio" name="q14" value="normal"> Smooth</label>
<label class="op"><input type="radio" name="q14" value="oily"> Thick / oily</label>
<label class="op"><input type="radio" name="q14" value="sensitive"> Easily irritated</label>

<!-- Q15 -->
<p class="question"><b>15. Overall skin condition?</b></p>
<label class="op"><input type="radio" name="q15" value="dry" required> Mostly dry</label>
<label class="op"><input type="radio" name="q15" value="oily"> Mostly oily</label>
<label class="op"><input type="radio" name="q15" value="combination"> Mixed</label>
<label class="op"><input type="radio" name="q15" value="normal"> Balanced</label>
<label class="op"><input type="radio" name="q15" value="sensitive"> Reactive / red</label>

<!-- Q16 -->
<p class="question"><b>16. How does your skin react to the sun?</b></p>
<label class="op"><input type="radio" name="q16" value="sensitive" required> Burns or becomes red easily</label>
<label class="op"><input type="radio" name="q16" value="combination"> Slightly sensitive</label>
<label class="op"><input type="radio" name="q16" value="normal"> Rarely affected</label>
<label class="op"><input type="radio" name="q16" value="oily"> No effect</label>
<label class="op"><input type="radio" name="q16" value="dry"> No effect</label>

        <br>
        <button type="submit">Get My Skin Type</button>
    </form>
</div>

</body>
</html>
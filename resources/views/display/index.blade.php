<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Robot</title>
    <link rel="stylesheet" href="{{url('')}}/assets/css/styles.css">
</head>
<body>
    <div class="eyes">
        <div class="eye">
            <div class="eyelid-right top"></div>
            <div class="pupil-wrapper">
                <div class="pupil"></div>
                <div class="shine"></div>
            </div>
            <div class="eyelid bottom"></div>
        </div>
        <div class="eye">
            <div class="eyelid-left top"></div>
            <div class="pupil-wrapper">
                <div class="pupil"></div>
                <div class="shine"></div>
            </div>
            <div class="eyelid bottom"></div>
        </div>
    </div>

    <!-- Tombol untuk memicu animasi -->
    <div class="controls">
        <button onclick="animateEyes('look-right')">Lihat Kanan</button>
        <button onclick="animateEyes('look-left')">Lihat Kiri</button>
        <button onclick="animateEyes('look-up')">Lihat Atas</button>
        <button onclick="animateEyes('look-down')">Lihat Bawah</button>
        <button onclick="animateEyes('marah')">Marah</button>
        <button onclick="animateEyes('senang')">Senang</button>
        <button onclick="animateEyes('normal')">Normal</button>
    </div>

    <script>
        function animateEyes(animation) {
            document.querySelectorAll('.pupil-wrapper').forEach(wrapper => {
                wrapper.style.animation = `${animation} 1s forwards`;
            });
            document.querySelectorAll('.pupil').forEach(wrapper => {
                wrapper.style.animation = `${animation}-pupil 1s forwards`;
            });
            document.querySelectorAll('.eyelid-right').forEach(eyelid => {
                eyelid.style.animation = `${animation}-eyelid 1s forwards`;
            });
            document.querySelectorAll('.eyelid-left').forEach(eyelid => {
                eyelid.style.animation = `${animation}-eyelid 1s forwards`;
            });
        }
    </script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=G2tYg4eu"></script>
    <script>
        async function getExpress(apiUrl) {
            let header = {
                method: "GET",
                headers: {
                "Content-Type": "application/json",
                // 'Content-Type': 'application/x-www-form-urlencoded',
                },
            }
            const response = await fetch(apiUrl, header);
            return response.json();
        }
        setInterval(() => {
            let apiUrl = "http://127.0.0.1:8000/api/exp";
            getExpress(apiUrl)
            .then((data) => {
                console.log(data['ekspresi']);
                if(data['ekspresi'] == 'santai') {

                }
                animateEyes(data['ekspresi']);
                responsiveVoice.speak(data['ekspresi'], 'Indonesian Female', {pitch: 1, rate: 1});
            });
        }, 1000);
        // SpeechRecognition declares, choose between library that is available
        window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        let msg = new SpeechSynthesisUtterance();
        let voices = window.speechSynthesis.getVoices();
        
        responsiveVoice.speak("Tes 1, 2, 3", 'Indonesian Female', {pitch: 1, rate: 1});

        // LLM Function
        async function ask(query) {
            // Hugging face ApiUrl
            let hugApiUrl = "https://api-inference.huggingface.co/models/meta-llama/Meta-Llama-3-8B-Instruct";
            let headers = {
                headers: { Authorization: `Bearer {{env('API_TOKEN')}}`},
                method: "POST",
                body: JSON.stringify(query)
            };
            const response = await fetch(hugApiUrl, headers);
            const result = await response.json();
            return result;
        }
        let input = 
        ask(input)
        .then((response) => {
            console.log(JSON.stringify(response));
        })
    </script>
</body>
</html>

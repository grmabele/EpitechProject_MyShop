const barCanvas = document.getElementById("barCanvas");

const barChart = new Chart(barCanvas, {
    type : "bar",
    data: {
        labels: ["idExperienceConduite","Date","heureDepart","heureArrivee","nombreKilometre_km","vitesseMoyenne_kmh","idLuminosite","idMeteo","idTrajet","idTraffic","idManoeuvre","commentaire"],
        datasets :[{
            data: [1,"2023-01-02","04:00","05:20",80,60,2,1,1,1,1,"Plusieurs sur la route"]
        }]
    }
})
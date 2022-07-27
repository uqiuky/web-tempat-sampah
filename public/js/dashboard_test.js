const labels = ["January", "February", "March", "April", "May", "June"];

const data = {
    labels: labels,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: "rgb(98,130,159)",
            borderColor: "rgb(98,130,159)",
            data: [2, 4, 3, 8, 20, 15, 45],
        },
        {
            label: "My Second dataset",
            backgroundColor: "rgb(77,99,96)",
            borderColor: "rgb(77,99,96)",
            data: [0, 10, 5, 2, 20, 30, 45],
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {},
};

const myChart = new Chart(document.getElementById("myChart"), config);

var data = [
{
    value: 55,
    color:"#F7464A",
    highlight:"#FF5A5E",
    label:"Despesas"
},
{
    value: 45,
    color:"#46BFBD",
    highlight:"#5AD3D1",
    label:"Doações"
}
];

var ctx = document.getElementById("myChart").getContext("2d");
new Chart(ctx).Pie(data);
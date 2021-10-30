<template>
  <div>
    <!-- <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-6"></base-header> -->
  </div>
</template>
<script>
// Charts
// import { ordersChart } from "@/components/Charts/Chart";
// import Chart from "chart.js";

import PageVisitsTable from "./Dashboard/PageVisitsTable";
import SocialTrafficTable from "./Dashboard/SocialTrafficTable";
// let chart;

export default {
  components: {
    PageVisitsTable,
    SocialTrafficTable,
  },
  data() {
    return {
      // salesChartID: "salesChart",
      // ordersChartID: "ordersChart",
      // bigLineChart: {
      //   allData: [
      //     [0, 20, 10, 30, 15, 40, 20, 60, 60],
      //     [0, 20, 5, 25, 10, 30, 15, 40, 40],
      //   ],
      //   activeIndex: 0,
      // },
    };
  },
  methods: {
  //   initBigChart(index) {
  //     chart.destroy();
  //     chart = new Chart(
  //       document.getElementById(this.salesChartID).getContext("2d"),
  //       {
  //         type: "line",
  //         data: {
  //           labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  //           datasets: [
  //             {
  //               label: "Performance",
  //               tension: 0.4,
  //               borderWidth: 4,
  //               borderColor: "#5e72e4",
  //               pointRadius: 0,
  //               backgroundColor: "transparent",
  //               data: this.bigLineChart.allData[index],
  //             },
  //           ],
  //         },
  //         options: {
  //           responsive: true,
  //           maintainAspectRatio: false,
  //           legend: {
  //             display: false,
  //           },
  //           tooltips: {
  //             enabled: true,
  //             mode: "index",
  //             intersect: false,
  //           },
  //           scales: {
  //             yAxes: [
  //               {
  //                 barPercentage: 1.6,
  //                 gridLines: {
  //                   drawBorder: false,
  //                   color: "rgba(29,140,248,0.0)",
  //                   zeroLineColor: "transparent",
  //                 },
  //                 ticks: {
  //                   padding: 0,
  //                   fontColor: "#8898aa",
  //                   fontSize: 13,
  //                   fontFamily: "Open Sans",
  //                 },
  //               },
  //             ],
  //             xAxes: [
  //               {
  //                 barPercentage: 1.6,
  //                 gridLines: {
  //                   drawBorder: false,
  //                   color: "rgba(29,140,248,0.0)",
  //                   zeroLineColor: "transparent",
  //                 },
  //                 ticks: {
  //                   padding: 10,
  //                   fontColor: "#8898aa",
  //                   fontSize: 13,
  //                   fontFamily: "Open Sans",
  //                 },
  //               },
  //             ],
  //           },
  //           layout: {
  //             padding: 0,
  //           },
  //         },
  //       }
  //     );
  //     this.bigLineChart.activeIndex = index;
  //   },
  // },
  // mounted() {
  //   chart = new Chart(
  //     document.getElementById(this.salesChartID).getContext("2d"),
  //     {
  //       type: "line",
  //       data: {
  //         labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  //         datasets: [
  //           {
  //             label: "Performance",
  //             tension: 0.4,
  //             borderWidth: 4,
  //             borderColor: "#5e72e4",
  //             pointRadius: 0,
  //             backgroundColor: "transparent",
  //             data: this.bigLineChart.allData[1],
  //           },
  //         ],
  //       },
  //       options: {
  //         responsive: true,
  //         maintainAspectRatio: false,
  //         legend: {
  //           display: false,
  //         },
  //         tooltips: {
  //           enabled: true,
  //           mode: "index",
  //           intersect: false,
  //         },
  //         scales: {
  //           yAxes: [
  //             {
  //               barPercentage: 1.6,
  //               gridLines: {
  //                 drawBorder: false,
  //                 color: "rgba(29,140,248,0.0)",
  //                 zeroLineColor: "transparent",
  //               },
  //               ticks: {
  //                 padding: 0,
  //                 fontColor: "#8898aa",
  //                 fontSize: 13,
  //                 fontFamily: "Open Sans",
  //               },
  //             },
  //           ],
  //           xAxes: [
  //             {
  //               barPercentage: 1.6,
  //               gridLines: {
  //                 drawBorder: false,
  //                 color: "rgba(29,140,248,0.0)",
  //                 zeroLineColor: "transparent",
  //               },
  //               ticks: {
  //                 padding: 10,
  //                 fontColor: "#8898aa",
  //                 fontSize: 13,
  //                 fontFamily: "Open Sans",
  //               },
  //             },
  //           ],
  //         },
  //         layout: {
  //           padding: 0,
  //         },
  //       },
  //     }
  //   );
  //   ordersChart.createChart(this.ordersChartID);
  },
};
</script>
<style></style>

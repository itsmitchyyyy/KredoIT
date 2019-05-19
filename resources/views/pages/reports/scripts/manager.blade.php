@include('pages.notification.scripts.manager')
<script>
$(function(){
// members
$.ajax({
                url: "{{ route('borrowed.total') }}",
                success: function(response) {
                    $('#memberCount').text(response);
                }
            });
            // end
            // items
            $.ajax({
                url: "{{ route('borrowed.total.items') }}",
                success: function(response) {
                    $('#itemCount').text(response);
                }
            });
            // end
            // request
            $.ajax({
                url: "{{ route('borrowed.total.request') }}",
                success: function(response) {
                    $('#requestCount').text(response);
                }
            });
            // end
  // request items
  $.ajax({
    url: "{{ route('borrowed.accept') }}",
    success: function(response) {
      
      const requestReports = 'rgba(0,181,233,0.8)'
      var elements = 10
      var requestReportsData = []
      var requestReportsMonth = []

      response.map(function(res){
        requestReportsData.push(res.request);
        requestReportsMonth.push(res.month);
      });

      var ctx = document.getElementById("recent-rep-chart");
      if (ctx) {
      ctx.height = 500;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: requestReportsMonth,
          datasets: [
            {
              label: 'Borrowed Item',
              backgroundColor: requestReports,
              borderColor: 'transparent',
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: requestReportsData
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 10,
                max: 100,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            }
          }


        }
      });
    }
    }
  });
  // end
  // member reports
  $.ajax({
    url: "{{ route('borrowed.member') }}",
    success: function(response) {

      var memberReports = [];
      var activeMember = 0;
      var deactiveMember = 0;

      response.map(function(res){
        if(res.user_type != 'ADMIN' && res.user_status == 'ACTIVATED') {
            activeMember = activeMember + 1;
        } else if(res.user_type != 'ADMIN' && res.user_status == 'DEACTIVATED') {
            deactiveMember = deactiveMember + 1;
        }
      });

      memberReports.push(activeMember);
      memberReports.push(deactiveMember);

      
      var ctx = document.getElementById("percent-chart");
      if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "Member Status",
              data: memberReports,
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Actived',
            'Deactivated'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }
    }
  });
  // end
});
</script>
@extends('layouts.default')
@section('content')

@include('includes.cart')
<section class="content">
  <div class="container">
      {{-- zone for best seller --}}
      <div class="block">
        <div class="card" style="width:100%;padding:10px">
          <h5>สินค้าขายดี</h5>
          <ul class="sales">
             {{-- other version to fetch data from controller --}}
              {{-- @foreach ($bestProduct as $key => $item)
              <li class="best-seller">
                  <div class="id">
                    อันดับ {{$key+1}}
                  </div>
                  <div class="content">
                    <div class="image-block mt-3">
                      <img class="card-img-top" src={{$bestProduct[$key]['image_url']}} alt="Card image cap">
                    </div>
                    <div>
                        <span>{{$bestProduct[$key]['name']}}</span>
                    </div>
                  </div>
              </li>
              @endforeach --}}
            <li class="best-seller">
              <div class="id">
                อันดับ 1
              </div>
              <div class="content p-3">
                <div class="image-block mt-4">
                  <img class="card-img-top" src={{$bestProduct[0]['image_url']}} alt="Card image cap">
                </div>
                <div>
                    <span>{{$bestProduct[0]['name']}}</span>
                </div>
              </div>
            </li>
            <li class="best-seller">
              <div class="id">
                อันดับ 2
              </div>
              <div class="content p-3">
                <div class="image-block mt-4">
                  <img class="card-img-top" src={{$bestProduct[1]['image_url']}} alt="Card image cap">
                </div>
                <div>
                    <span>{{$bestProduct[1]['name']}}</span>
                </div>
              </div>
            </li>
            <li class="best-seller p-3">
                <div class="id">
                  อันดับ 3
                </div>
                <div class="content">
                  <div class="image-block mt-4">
                    <img class="card-img-top" src={{$bestProduct[2]['image_url']}} alt="Card image cap" height="">
                  </div>
                  <div>
                    <span>{{$bestProduct[2]['name']}}</span>
                  </div>
                </div>
            </li>
            <li class="best-seller p-3">
                <div class="id">
                  อันดับ 4
                </div>
                <div class="content">
                  <div class="image-block mt-4">
                    <img class="card-img-top" src={{$bestProduct[3]['image_url']}} alt="Card image cap" height="">
                  </div>
                <div>
                    <span>{{$bestProduct[3]['name']}}</span>
                </div>
                </div>
            </li>
            <li class="best-seller p-3">
                <div class="id">
                  อันดับ 5
                </div>
                <div class="content">
                  <div class="image-block mt-4">
                    <img class="card-img-top" src={{$bestProduct[4]['image_url']}} alt="Card image cap" height="">
                  </div>
                  <div>
                    <span>{{$bestProduct[4]['name']}}</span>
                  </div>
                </div>
            </li>
          </ul>
        </div>
        </div>
        

      {{-- statistic order --}}
      <div class="statistic block">
        <div>
          <div class="tab-content p-0">
          <div class="card mb-3" style="width:100%;padding:10px">
            <div class="position-relative mb-4">
              <canvas id="myChart" height="100px"></canvas>
            </div>
          </div>
          <div class="card" style="width:100%;padding:10px">
            <div class="position-relative mb-4">
              <canvas id="monthly" height="100px"></canvas>
            </div>
          </div>

        </div>
        <div class="card mt-3" style="width:100%;padding:10px">
          <div>
            <h5>สรุปยอดขายประจำวัน</h5>
          </div>
          <div class="card-body">
            <div class="center">
              <ul class="sales text-center">
                <li class="count-sales">
                  <div>
                    <span class="green">ยอดขาย</span>
                  </div>
                  <div class="content">
                    {{ number_format($sales['today'], 2) }} ฿
                  </div>
                </li>            
                <li class="count-sales">
                  <div>
                    <span class="green">จำนวน order ที่ขายได้</span>
                  </div>
                  <div class="content">
                    <p id="success_count">{{ $count['success'] }}</p>
                  </div>
                </li>
                <li class="count-sales">
                  <div>
                    <span class="red">จำนวน order ที่ถูกยกเลิก</span>
                  </div>
                  <div class="content">
                    {{ $count['cancel'] }}
                  </div>
                </li>
                <li class="count-sales">
                    <div>
                      <span class="yellow">จำนวน order ที่รอยืนยัน</span>
                    </div>
                    <div class="content">
                      {{ $count['hold'] }}
                    </div>
                </li>
              </ul>
            </div>
            <div>
                <div class="table-responsive">
                    <table id="bestseller_table" class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr class="table100-head">
                                <th>เลขที่ออเดอร์</th>
                                <th>รหัสลูกค้า</th>
                                <th>ยอดจัดซื้อ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" style="font-size: 12px;">
                          @foreach ($order as $item)
                          <tr>
                            <td>{{$item->order_id}}</td>
                            <td>{{$item->user_code}}</td>
                            <td>{{number_format($item->total_price, 2)}} ฿</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          {{-- <div class="mb-3">
            <input type="date" name="date_pick">
            <button onclick="pickDate();">ตกลง</button>
          </div> --}}

        </div>
      </div>
  </div>
</section>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
<script type="text/javascript">
    $(function () {
        $('#bestseller_table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    });
    
       var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["7 วันย้อนหลัง", "6 วันย้อนหลัง", "5 วันย้อนหลัง", "4 วันย้อนหลัง", "3 วันย้อนหลัง", "เมื่อวาน", "วันนี้"],
                datasets: [{
                    label: ['ยอดที่ขายได้'],
                    data: [
                      <?php echo $sales['day7']?>, 
                      <?php echo $sales['day6']?>, 
                      <?php echo $sales['day5']?>, 
                      <?php echo $sales['day4']?>, 
                      <?php echo $sales['day3']?>, 
                      <?php echo $sales['day2']?>, 
                      <?php echo $sales['today']?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(184, 176, 29, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                     'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(184, 176, 29, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'ยอดขาย 7 วัน'
              },
                scales: {
                    yAxes: [{
                      gridLines: {
                        display      : true,
                        lineWidth    : '4px',
                        color        : 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                      },
                      ticks: {
                          beginAtZero: true
                      }
                    }]
                }
            }
        });
  
    
</script>

<script>
  new Chart(document.getElementById("monthly"), {
  type: 'line',
  data: {
    labels: ['สัปดาห์ 1','สัปดาห์ 2','สัปดาห์ 3','สัปดาห์ 4'],
    datasets: [{ 
        data: [
          <?php echo $month['week1'];?>,
          <?php echo $month['week2'];?>,
          <?php echo $month['week3'];?>,
          <?php echo $month['week4'];?>
        ],
        label: "ยอดขายประจำสัปดาห์",
        borderColor: "#3e95cd",
        fill: false
      }, 
    ]
  },
  options: {
    title: {
      display: true,
      text: 'ยอดขายในเดือน'
    }
  }
});
</script>

<script>
    function alertss() {
        confirm('test');
    }

    function paymentSuccess(orderId) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "http://localhost:8000/paysuccess",
            data: {
                "_token": "{{ csrf_token() }}",
                orderId: orderId,
            },
            success: function (data) {
                if (data == 1) {
                    window.location.href = '';
                }
            }
        })
    }

    function pickDate(){
      var date = $('input[name="date_pick"]').val();
      console.log(date);
      $.ajax({
        type: 'get',
        dataType: 'json',
        url: "http://localhost:8000/bestseller",
        data: {
          "_token": "{{ csrf_token() }}",
          date: date
        },
        success: function(data){
          console.log(data)
          $(this).html(data)
        }
      })
    }

</script>
<style>

ul.sales {
  display: flex;
  list-style: none;
}

.header-bestseller{
  position: absolute;
  left: 2px;
}

.content {
  display: flex;
  flex-direction: column;
  text-align: center;
  flex: 1;
  justify-content: center;
}

.statistic {
  margin: 10px 0px 0px 10px;
}

.image-block {
  display: flex;
  flex-direction: column;
  text-align: center;
  flex: 1;
  justify-content: center;
}

li.best-seller {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 220px;
  height: 250px;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.15);
  margin: 0 16px 16px 0;
}

li.count-sales{
  position: relative;
  display: flex;
  flex-direction: column;
  width: 220px;
  height: 70px;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.15);
  margin: 0 16px 16px 0;
}

.center{
  margin-left: 200px;
  margin-right: 200px;
}

.id {
  position: absolute;
  right: 4px;
  top: 2px;
}

.block {
  margin: 20px 0 0 10px;
  padding: 10px 0 0 10px;
  padding-bottom: 20px;
}

.green {
  font-weight: bold;
  color: green;
}

.red {
  font-weight: bold;
  color: red;
}

.yellow {
  font-weight: bold;
  color: orange;
}

blink {
    -webkit-animation: 2s linear infinite condemned_blink_effect;
    /* for Safari 4.0 - 8.0 */
    animation: 1.5s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }

    50% {
        visibility: hidden;
    }

    100% {
        visibility: visible;
    }
}

@keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }

    50% {
        visibility: hidden;
    }

    100% {
        visibility: visible;
    }
}

</style>
@stop

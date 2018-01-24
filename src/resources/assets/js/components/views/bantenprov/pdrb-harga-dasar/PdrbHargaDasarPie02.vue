<template>
  <div style="width: 100%; height: 400px;">
    <IEcharts :option="pie"></IEcharts>
  </div>
</template>

<script>
import IEcharts from 'vue-echarts-v3/src/full.js';

export default {
  components: {
    IEcharts
  },
  data () {
    return {
      pie: {
        backgroundColor: '#343a40',
        title: {
          text: 'ECharts pie',
          left: 'center',
          top: 20,
          textStyle: {
            color: '#fff'
          }
        },
        tooltip: {
          show: true,
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        visualMap: {
          show: false,
          min: 1000,
          max: 80000,
          inRange: {
            colorLightness: [0, 1]
          }
        },
        series : [
          {
            type:'pie',
            radius : '55%',
            center: ['50%', '50%'],
            data:[
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''}
            ].sort(function (a, b) { return a.value - b.value; }),
            roseType: 'rose',
            label: {
              normal: {
                textStyle: {
                  color: '#fff'
                }
              }
            },
            labelLine: {
              normal: {
                lineStyle: {
                  color: '#eee'
                },
                smooth: 0.2,
                length: 10,
                length2: 11
              }
            },
            itemStyle: {
              normal: {
                color: '#e53935',
                shadowBlur: 200,
                shadowColor: 'rgba(255, 205, 210, 0.25)'
              }
            },

            animationType: false,
            animationEasing: false,
            animationDelay: function (idx) {
              return Math.random() * 200;
            }
          }
        ]
      }
    }
  },
  mounted: function () {
    /*axios.get('/json/bantenprov/pdrb-harga-dasar/data.json').then(response => {
      let i = 0;
      for(var first = 0; first < Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length; first++){
        this.pie.series[0].data[first].value = Object.values(response.data[0].chartdata.grafik[0].tahun[0])[first]
        this.pie.series[0].data[first].name = Object.keys(response.data[0].chartdata.grafik[0].tahun[0])[first]
        this.pie.title.text = response.data[0].chartdata.grafik[0].tingkat + ' ' + response.data[0].chartdata.grafik[0].name
      }

      this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) + 2000
      this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) - 2000

      setInterval(() => {
        i++;
        setTimeout(() => {
          for(var k = 0; k < Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length; k++){
            this.pie.series[0].data[k].value = Object.values(response.data[0].chartdata.grafik[i].tahun[0])[k]
            this.pie.series[0].data[k].name = Object.keys(response.data[0].chartdata.grafik[i].tahun[0])[k]

            this.pie.title.text = response.data[0].chartdata.grafik[i].tingkat + ' ' + response.data[0].chartdata.grafik[i].name

            this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) + 6000
            this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) - 6000
          }
        }, 1000);

        if(i ==  response.data[0].chartdata.grafik.length) {
          i = 0;
        }
      }, 5000);

    })
    .catch(function(error) {
      // error
    });
  }*/


  axios.get('/json/bantenprov/pdrb-harga-dasar/pdrb-harga-dasar02.json').then(response => {
      //let i = 0;

      function removeDuplicates(arr){
        var unique_array = []
        for(var i = 0;i < arr.length; i++){
            if(unique_array.indexOf(arr[i]) == -1){
                unique_array.push(arr[i])
            }
        }
        return unique_array
      }
      //console.log(Object.values(response.data[0].chartdata.grafik[0].tahun[0]))

      /*for(var name = 0; name < response.data[0].chartdata.grafik.length; name++)
      {
        if(response.data[0].chartdata.grafik[name].tingkat == "dua"){
          this.pie.series[0].data[name].name = response.data[0].chartdata.grafik[name].name
        }
      }*/

      /*console.log(response.data[0].chartdata.grafik[0].tahun)
      console.log(response.data[0].chartdata.grafik.length)*/

      var tahun_get = [];
      for(var tahun = 0; tahun < response.data[0].chartdata.grafik.length; tahun++)
      {
        tahun_get.push(response.data[0].chartdata.grafik[tahun].tahun)
        //console.log(response.data[0].chartdata.grafik[0].tahun[])
      }

      let tahun_filter = removeDuplicates(tahun_get)
      let i = 0;


      console.log(tahun_filter)

      // this.pie.series[0].data[0].value = 2000
      // this.pie.series[0].data[0].name = "test"
      //console.log(response.data[0].chartdata.grafik.tahun)
      //var tahun = [];

      for(let graph1 = 0; graph1 < response.data[0].chartdata.grafik.length; graph1++)
      {
        //console.log(response.data[0].chartdata.grafik[graph1].tahun)
        //console.log((response.data[0].chartdata.grafik[graph1].tahun === tahun_filter[0]))
        if(response.data[0].chartdata.grafik[graph1].tahun == tahun_filter[0] && response.data[0].chartdata.grafik[graph1].tingkat == "dua")
        {

          /*this.pie.series[0].data[graph1].value = response.data[0].chartdata.grafik[graph1].data
          this.pie.series[0].data[graph1].name = response.data[0].chartdata.grafik[graph1].name*/

          this.pie.series[0].data[i].value = response.data[0].chartdata.grafik[graph1].data
          this.pie.series[0].data[i].name = response.data[0].chartdata.grafik[graph1].name
          this.pie.title.text = response.data[0].chartdata.grafik[graph1].tahun
          console.log(response.data[0].chartdata.grafik[graph1].name)
          i++;
        }

      }



      let loop_interval = 0;

      setInterval(() => {

        setTimeout(() => {
          var i_interval = 1;
          for(let graph2 = 0; graph2 < response.data[0].chartdata.grafik.length; graph2++)
          {

            if(response.data[0].chartdata.grafik[graph2].tahun == tahun_filter[loop_interval] && response.data[0].chartdata.grafik[graph2].tingkat == "dua")
            {

              //console.log(i_interval)
              this.pie.series[0].data[i_interval].value = response.data[0].chartdata.grafik[graph2].data
              this.pie.series[0].data[i_interval].name = response.data[0].chartdata.grafik[graph2].name
              this.pie.title.text = response.data[0].chartdata.grafik[graph2].tahun
              console.log(i_interval)
              console.log(tahun_filter[loop_interval])
              console.log(this.pie.title.text = response.data[0].chartdata.grafik[graph2].tahun)
              console.log(response.data[0].chartdata.grafik[graph2].name + ':' + response.data[0].chartdata.grafik[graph2].data)
              i_interval++;
            }



          }


        },1000)


        loop_interval++;

        if(i_interval == tahun_filter.length - 1)
          {

            i_interval = 1;
          }

        if(loop_interval ==  tahun_filter.length) {
          loop_interval = 0;
        }

      },5000)


      /*for(var first = 0; first < response.data[0].chartdata.grafik.length; first++){
        if(response.data[0].chartdata.grafik[first].tingkat == "dua"){
          this.pie.series[0].data[first].value = Object.values(response.data[0].chartdata.grafik[first].tahun[0])[0]
        }
        this.pie.title.text = Object.keys(response.data[0].chartdata.grafik[0].tahun[0])[0]
      }
      //console.log(this.pie.series[0].data)
      // console.log(response.data[0].chartdata.grafik[0].tingkat)


      if(response.data[0].chartdata.grafik[0].tingkat == "dua"){
        this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) + 50000
        // this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0]))
        this.pie.visualMap.min = 1000
      }*/

      // setInterval(() => {
      //   i++;

      //   setTimeout(() => {

      //     for(var name = 0; name < response.data[0].chartdata.grafik.length; name++){
      //       for(var tahun = 0; tahun < Object.keys(response.data[0].chartdata.grafik[i].tahun[0]).length; tahun++){

      //         if(i == tahun)
      //         {
      //           console.log(Object.keys(response.data[0].chartdata.grafik[i].tahun[0])[tahun] + ':' + Object.values(response.data[0].chartdata.grafik[i].tahun[0])[tahun])
      //         }

      //       }
      //       // if(response.data[0].chartdata.grafik[i].tingkat == "dua"){
      //       //   this.pie.series[0].data[name].value = Object.values(response.data[0].chartdata.grafik[i].tahun[0])[0]

      //       // }

      //       // //console.log(Object.values(response.data[0].chartdata.grafik[i].tahun[0])[i])
      //       // if(response.data[0].chartdata.grafik[first].tingkat == "dua"){
      //       //   this.pie.series[0].data[first].value = Object.values(response.data[0].chartdata.grafik[first].tahun[0])[0]
      //       // }

      //       // this.pie.title.text = Object.keys(response.data[0].chartdata.grafik[i].tahun[0])[i]

      //       // /* === */

      //       // if(response.data[0].chartdata.grafik[i].tingkat == "dua"){
      //       //   this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) + 6000
      //       //   this.pie.visualMap.min = 1000

      //       // }

      //       /*if(response.data[0].chartdata.grafik[0].tingkat == "dua"){
      //         this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) + 50000
      //         // this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0]))
      //         this.pie.visualMap.min = 1000
      //       }*/
      //     }
      //   }, 1000);

      //   if(i ==  response.data[0].chartdata.grafik.length) {
      //     i = 0;
      //   }
      //   //console.log(this.pie.visualMap.max)
      // }, 5000);

    })
    .catch(function(error) {
      // error
    });
  }


  /*axios.get('/json/bantenprov/pdrb-harga-dasar/pdrb-harga-dasar02.json').then(response => {
      this.bar.title.text = 'Tahun ' + Object.keys(response.data[0].chartdata.grafik[0].tahun[0])[0]

      for(var name = 0; name < response.data[0].chartdata.grafik.length; name++)
      {
        if(response.data[0].chartdata.grafik[name].tingkat == "dua"){
          this.bar.xAxis.data[name] = response.data[0].chartdata.grafik[name].name;
        }
      }

      for(var first = 0; first < response.data[0].chartdata.grafik.length; first++)
      {
        if(response.data[0].chartdata.grafik[first].tingkat == "dua") {
          this.bar.series[0].data[first] = Object.values(response.data[0].chartdata.grafik[first].tahun[0])[0]
        }
      }

      let i = 0;
      setInterval(() => {
        i++;
        setTimeout(() => {

          for(var k = 0; k < response.data[0].chartdata.grafik.length; k++)
          {
            if(response.data[0].chartdata.grafik[k].tingkat == "dua") {
              this.bar.series[0].data[k] = Object.values(response.data[0].chartdata.grafik[k].tahun[0])[i]
            }

            this.bar.title.text = 'Tahun ' +Object.keys(response.data[0].chartdata.grafik[k].tahun[0])[i]

          }


        }, 1000);

        if(i ==  Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length) {
          i = 0;
        }
      }, 5000);
    })
    .catch(function(error) {
      // error
    });
  }*/
}
</script>


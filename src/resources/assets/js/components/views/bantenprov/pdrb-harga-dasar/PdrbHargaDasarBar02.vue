<template>
  <div style="width: 100%; height: 400px;">
    <IEcharts :option="bar" :loading="loading"></IEcharts>
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
      loading: false,
      bar: {
        title: {
          text: 'ECharts bar + Ajax',
          x: 'center'
        },
        tooltip: {
          show: true
        },
        xAxis: {
          data: []
        },
        yAxis: {},
        series: [{
          type: 'bar',
          data: [],
          barWidth: 20,
          barGap: '-100%'
        }],
        color: {
          type: 'linear',
          x: 0,
          y: 0,
          x2: 0,
          y2: 1,
          colorStops: [{
              offset: 0, color: '#CDDC39' // color at 0% position
          }, {
              offset: 1, color: '#8BC34A' // color at 100% position
          }],
          globalCoord: true // false by default
        }
      }
    }
  },
  mounted: function () {
    axios.get('/json/bantenprov/pdrb-harga-dasar/pdrb-harga-dasar02.json').then(response => {
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
  }
}
</script>

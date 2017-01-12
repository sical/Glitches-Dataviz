function backupData(d) {


}

var DELAY = 1;
var DURATION = 10
var fill = d3.scaleOrdinal(d3.schemeCategory20);

function glitchD3() {

  d3.selectAll('rect')
    .call(backupData)
    .transition()
    .duration(function(d, i) { return i * DURATION; })
    .delay(function(d, i) { return i * DELAY; })
    .attr('height', function(d, i) {
      if(typeof d3.select(this).node().__original_height__ === "undefined") {
        d3.select(this).node().__original_height__ = d3.select(this).attr("height");
      }
      return d3.select(this).node().__original_height__ * Math.random();
    })
    .style("fill", function(d, i) {
      if(typeof d3.select(this).node().__original_fill__ === "undefined") {
        d3.select(this).node().__original_fill__ = d3.select(this).attr("fill");
      }
      return fill(i);
    });
}

function reset() {

  d3.selectAll('rect')
    .transition()
    .duration(function(d, i) { return i * DURATION; })
    .delay(function(d, i) { return i * DELAY; })
    .attr('height', function(d, i) {
      if(typeof d3.select(this).node().__original_height__ !== "undefined") {
        return d3.select(this).node().__original_height__;
      } else {
        return d3.select(this).attr("height");
      }
    })
    .style("fill", function(d, i) {
      if(typeof d3.select(this).node().__original_fill__ !== "undefined") {
        return d3.select(this).node().__original_fill__;
      } else {
        return fill(i);
      }
    });

}

function glitchCanvas() {

  var canvas = document.getElementById('canvas-id');
  var ctx = canvas.getContext('2d');
  var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

  var glitchParams = {
      seed:       25, // integer between 0 and 99
      quality:    10, // integer between 0 and 99
      amount:     35, // integer between 0 and 99
      iterations: 20  // integer
  };

  glitch(glitchParams)
      .fromImageData(imageData)
      .toDataURL()
      .then(function( dataURL ) {
        var glitchedImg = new Image();
        glitchedImg.src = dataURL;
        var gImg = document.body.appendChild(glitchedImg);
        gImg.id = "glitched-canvas";

        d3.select("#glitched-canvas").on("mousemove", function() {

          var canvas = document.getElementById('canvas-id');
          var ctx = canvas.getContext('2d');
          var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

          var glitchParams = {
              seed:       Math.floor(99 * Math.random()), // integer between 0 and 99
              quality:    Math.floor(99 * Math.random()), // integer between 0 and 99
              amount:     Math.floor(99 * Math.random()), // integer between 0 and 99
              iterations: Math.floor(100 * Math.random())  // integer
          };

          glitch(glitchParams)
              .fromImageData(imageData)
              .toDataURL()
              .then(function( dataURL ) {

                var glitchedImg = new Image();
                glitchedImg.src = dataURL;
                var gImg = document.body.appendChild(glitchedImg);
                gImg.id = "glitched-canvas";

              });


        });

      });




}




function draw_chart(data, c) {

  var c = c || function() { console.log("done"); }

  var svg = d3.select("body").append("svg");

  var g = svg.attr("width", width).attr("height", height).append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  x.domain(data.map(function(d) { return d.letter; }));
  y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  g.append("g")
      .attr("class", "axis axis--y")
      .call(d3.axisLeft(y).ticks(10, "%"))
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("Frequency");

  g.selectAll(".bar")
    .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.letter); })
      .attr("y", function(d) { return y(d.frequency); })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return (height - margin.bottom - margin.top) - y(d.frequency); });

  svg.on("mousemove", function() { return c(svg); })

  c(svg);

}

// https://bl.ocks.org/biovisualize/8187844
function svg_2_canvas(el, id, c) {

  var svgString = new XMLSerializer().serializeToString(document.querySelector('svg'));
  var canvas = document.createElement('canvas');
  canvas.id = 'canvas-id'; // gives canvas id
  canvas.height = height; //get original canvas height
  canvas.width = width; // get original canvas width
  document.body.appendChild(canvas);

  var ctx = canvas.getContext("2d");
  var DOMURL = self.URL || self.webkitURL || self;
  var img = new Image();
  var svg = new Blob([svgString], {type: "image/svg+xml;charset=utf-8"});
  var url = DOMURL.createObjectURL(svg);
  img.onload = function() {

    ctx.drawImage(img, 0, 0);

  };

  img.src = url;

}

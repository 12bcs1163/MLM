
    <div class="slim-footer">
      <div class="container">
        <p>Copyright 2018 &copy; All Rights Reserved.</p>
       
      </div>
    </div>
  
    
    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/Flot/js/jquery.flot.js"></script>
    <script src="lib/Flot/js/jquery.flot.resize.js"></script>
    <script src="lib/peity/js/jquery.peity.js"></script>

    <script src="js/slim.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script>
      $(function(){
        'use strict'

        var multibar = new Rickshaw.Graph({
          element: document.querySelector('#chartMultiBar1'),
          renderer: 'bar',
          stack: false,
          max: 60,
          series: [{
            data: [
              { x: 0, y: 20 },
              { x: 1, y: 25 },
              { x: 2, y: 10 },
              { x: 3, y: 15 },
              { x: 4, y: 20 },
              { x: 5, y: 40 },
              { x: 6, y: 15 },
              { x: 7, y: 40 },
              { x: 8, y: 25 }
            ],
            color: '#065381'
          },
          {
            data: [
              { x: 0, y: 10 },
              { x: 1, y: 30 },
              { x: 2, y: 45 },
              { x: 3, y: 30 },
              { x: 4, y: 42 },
              { x: 5, y: 20 },
              { x: 6, y: 30 },
              { x: 7, y: 15 },
              { x: 8, y: 20 }
            ],
            color: '#34B2E4'
          }]
        });

        multibar.render();

        // Responsive Mode
        new ResizeSensor($('.slim-mainpanel'), function(){
          multibar.configure({
            width: $('#chartMultiBar1').width(),
            height: $('#chartMultiBar1').height()
          });
          multibar.render();
        });

      });
    </script>
    
 
  </body>
</html>
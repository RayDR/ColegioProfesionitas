/**
 * Converts an image to a dataURL
 * @param  {String}   src          The src of the image
 * @param  {Function} callback     
 * @param  {String}   outputFormat [outputFormat='image/png']
 * @url   https://gist.github.com/HaNdTriX/7704632/
 * @docs  https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement#Methods
 * @author HaNdTriX
 * @example
 * 
 *   toDataUrl('http://goo.gl/AOxHAL', function(base64Img){
 *     console.log('IMAGE:',base64Img);
 *   })
 * 
 */
function imagenB64(src, callback, formatoSalida) {
  var imagen  = new Image();
  // Comprobación CORS
  imagen.crossOrigin = 'Anonymous';

  // Cargar imagen
  imagen.onload = function() {
    var canvas  = document.createElement('CANVAS');

    var lienzo      = canvas.getContext('2d'), // Contexto en 2D
        dataURL;
    // Redimencionar canvas de acuerdo a las propiedades de la imagen
    canvas.height   = this.naturalHeight;
    canvas.width    = this.naturalWidth;
    // Dibujar imagen en canvas
    lienzo.drawImage(this, 0, 0);
    dataURL = canvas.toDataURL(formatoSalida);

    callback(dataURL);
    canvas = null;
  };

  imagen.src = src;
  // make sure the load event fires for cached images too
  if (imagen.complete || imagen.complete === undefined) {
    // Flush cache
    imagen.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';
    //imagen.src = 'data:image/gif;base64';
    // Try again
    imagen.src = src;
  }
}
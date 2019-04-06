function wrapTextTest(context, text, marginLeft, maxWidth, lineHeight) {
  var words = text.split(" ");
  var countWords = words.length;
  var line = "";
  var linesArr = [];
  for (var n = 0; n < countWords; n++) {
    var testLine = line + words[n] + " ";
    var testWidth = context.measureText(testLine).width;
    if (testWidth > maxWidth) {
      linesArr.push(line);
      line = words[n] + " ";
    } 
    else {
      line = testLine;
    }
  }
  linesArr.push(line);
  countTextHeight = (linesArr.length - 2) * lineHeight;
  var marginTop = marginLeft - countTextHeight / 2;
  for (var m = 0; m < linesArr.length; m++) {
    context.fillText(linesArr[m], marginLeft, marginTop);
    marginTop = marginTop + lineHeight;
  }
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

$.ajax({
  url: "https://api.forismatic.com/api/1.0/",
  type: 'POST',
  jsonp: "jsonp",
  dataType: "jsonp",
  data: {
    method: "getQuote",
    lang: "ru",
    format: "jsonp"
  }
})
.done(doNext)
.fail(handleError);

function handleErr(jqxhr, textStatus, err) {
  document.write("Request Failed: " + textStatus + ", " + err);
}

function doNext(response) {

  text = response.quoteText;

  var canvas = document.createElement('canvas');
  canvas.width = 400;
  canvas.height = 400;
  document.body.appendChild(canvas);

  ctx = canvas.getContext('2d');

  pic1 = new Image();
  pic2 = new Image();
  pic3 = new Image();
  pic4 = new Image();

  var maxTextWidth = 300;
  var lineHeightText = 20;
  var marginLeftText = 200;

  x = getRandomInt(180, 220);
  y = getRandomInt(180, 220);

  pic1.src = 'https://source.unsplash.com/collection/494263/330x220';
  pic1.onload = function() { 
    pic2.src = 'https://source.unsplash.com/collection/583479/330x220';
    pic2.onload = function() {
      pic3.src = 'https://source.unsplash.com/collection/539527/330x220';
      pic3.onload = function() {
        pic4.src = 'https://source.unsplash.com/collection/764827/330x220';
        pic4.onload = function() {
          ctx.drawImage(pic1, 0, 0);
          ctx.drawImage(pic2, x, 0);
          ctx.drawImage(pic3, 0, y);
          ctx.drawImage(pic4, x, y);
          ctx.rect(0, 0, canvas.width, canvas.height);
          ctx.fillStyle = "rgba(0, 0, 0, 0.6)";
          ctx.fill();
          ctx.textAlign = "center";
          textBaseline = "middle";
          ctx.font = "18px 'Montserrat', Helvetica, Verdana, sans-serif";
          ctx.fillStyle = "white";
          wrapTextTest(ctx, text, marginLeftText, maxTextWidth, lineHeightText);    
        }
      }
    }
  }
}
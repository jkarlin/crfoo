// Threshold is 5: https://cs.chromium.org/chromium/src/third_party/blink/common/frame/user_activation_state.cc?q=kActivationLifespan
const g_timeout_seconds = 6;
const g_id_div_actions = "id_div_actions";

let g_delay_activation = false;
let g_target_url = "test.zip";
let g_id_iframe_subframe = 0;

function GetSubFrameId() {
  return "id_iframe_subframe_" + g_id_iframe_subframe;
}

function ExecutePossiblyWithDelay(button, callback) {
  if (g_delay_activation) {
    setTimeout(callback, g_timeout_seconds * 1000);

    let p = document.createElement("p");
    p.style.display = "inline";
    button.parentNode.insertBefore(p, button.nextSibling);

    let cur_seconds = g_timeout_seconds;
    p.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;[" + cur_seconds.toFixed(1) + "]";
    let fun = setInterval(function() {
      cur_seconds = (cur_seconds - 0.1).toFixed(1);
      p.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;[" + cur_seconds + "]";
      if (cur_seconds <= 0) {
          clearInterval(fun);
          p.parentNode.removeChild(p);
      }
    }, 100);
  } else {
    callback();
  }
}

function AddAnchor(node, has_download_attr) {
  let e = document.createElement("a");
  e.innerHTML = "&lt;a&gt; link with href=" + g_target_url + (has_download_attr ? " (with 'download' attribute)" : "");
  e.setAttribute("href",g_target_url);
  if (has_download_attr) {
    e.download = "";
  }
  node.appendChild(e);
  node.appendChild(document.createElement("br"));
}

function AddButton(node, text, onclick_callback) {
  let e = document.createElement("button");
  e.style.display = "inline";
  e.innerHTML = text;
  e.onclick = function() {
    ExecutePossiblyWithDelay(e, onclick_callback);
  };
  node.appendChild(e);
  node.appendChild(document.createElement("br"));
}

function ResetDiv(id) {
  let div = document.getElementById(id);
  if (div == null) {
    div = document.createElement("div");
    div.setAttribute("id",id);
  } else {
    while (div.firstChild) {
      div.removeChild(div.firstChild);
    }
  }
  return div;
}

function ResetTestActions() {
  let is_top_frame = (self == top);
  let div = ResetDiv(g_id_div_actions);

  let header = document.createElement("h4");
  header.innerHTML = "Test actions initiated from this " + (is_top_frame ? "top frame" : "subframe");
  if (g_delay_activation) {
    header.innerHTML +=  " (" + g_timeout_seconds + "s delay)";
  }

  div.appendChild(header);

  AddAnchor(div, false);
  AddButton(div, "click 1st link", function() {
    document.getElementsByTagName('a')[0].click();
  });
  AddAnchor(div, true);
  AddButton(div, "click 2nd link", function() {
    document.getElementsByTagName('a')[1].click();
  });
  if (is_top_frame) {
    AddButton(div, "navigate this <b>top</b> frame (set location)", function() {
      window.location = g_target_url;
    });
    AddButton(div, "navigate <b>sub</b>frame (set location)", function() {
      document.getElementById(GetSubFrameId()).contentWindow.location = g_target_url;
    });
    AddButton(div, "navigate <b>sub</b>frame (set src)", function() {
      document.getElementById(GetSubFrameId()).src = g_target_url;
    });
  } else {
    AddButton(div, "navigate this <b>sub</b>frame (set location)", function() {
      window.location = g_target_url;
    });
    AddButton(div, "navigate <b>top</b> frame (set location)", function() {
      top.location = g_target_url;
    });
  }
  AddButton(div, "popup", function() {
    window.open(g_target_url);
  });
  AddButton(div, "append child frame invisible", function() {
    let f = document.createElement('iframe');
    f.src = g_target_url;
    f.style = "width:0;height:0;border:0;border:none;";
    document.body.appendChild(f);
  });
  AddButton(div, "append child frame invisible/sandbox", function() {
    let f = document.createElement('iframe');
    f.src = g_target_url;
    f.sandbox = "";
    f.style = "width:0;height:0;border:0; border:none;";
    document.body.appendChild(f);
  });
  AddButton(div, "append child frame invisible/sandbox/allow-downloads", function() {
    let f = document.createElement('iframe');
    f.src = g_target_url;
    f.sandbox = "allow-downloads-without-user-activation";
    f.style = "width:0;height:0;border:0; border:none;";
    document.body.appendChild(f);
  });

  return div;
}

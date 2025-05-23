function submitComment(parentId) {
    let input = document.getElementById("commentInput");
    let text = input.value.trim();
    if (text === "") return;
  
    addComment(text, parentId);
    input.value = "";
  }
  
  function addComment(text, parentId) {
    let comment = document.createElement("div");
    comment.className = "comment";
    comment.innerHTML = `
      <p>${text}</p>
      <div class="comment-actions">
        <button onclick="pinComment(this)">📌 Pin</button>
        <button onclick="deleteComment(this)">🗑 Delete</button>
        <button onclick="replyComment(this)">💬 Reply</button>
      </div>
    `;
  
    if (parentId) {
      let parent = document.getElementById(parentId);
      let replyBox = document.createElement("div");
      replyBox.className = "reply-box";
      replyBox.appendChild(comment);
      parent.appendChild(replyBox);
    } else {
      let container = document.getElementById("commentsContainer");
      container.appendChild(comment);
    }
  }
  
  function pinComment(btn) {
    let comment = btn.closest(".comment");
    comment.classList.toggle("pinned");
  }
  
  function deleteComment(btn) {
    let comment = btn.closest(".comment");
    comment.remove();
  }
  
  function replyComment(btn) {
    let parent = btn.closest(".comment");
    let parentId = "comment-" + Date.now();
    parent.id = parentId;
  
    let input = document.createElement("textarea");
    input.placeholder = "Reply with @mention...";
    input.style.width = "100%";
    input.style.marginTop = "5px";
  
    let submitBtn = document.createElement("button");
    submitBtn.textContent = "Submit Reply";
    submitBtn.style.marginTop = "5px";
    submitBtn.onclick = function () {
      let replyText = input.value.trim();
      if (replyText !== "") {
        addComment(replyText, parentId);
        input.remove();
        submitBtn.remove();
      }
    };
  
    parent.appendChild(input);
    parent.appendChild(submitBtn);
  }
  
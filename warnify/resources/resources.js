// resources.js

// ============================================
// ADD RESOURCES HERE (for now, until admin panel is ready)
// ============================================
// Format: 'topicId': ['resource1', 'resource2', 'https://example.com']
// Topic IDs: html-intro, html1, html2, css1, css2, php1, php2, php3, php4, js1, js2

const resources = {
    'html-intro': [
        'HTML Basics - Dr. Nashwa',
        'https://drive.google.com/file/d/1j2L8gSUzGjRL-J32-qL7Po06XOIFuvEZ/view?usp=drive_link'
    ],
    'html1': [
        'HTML Elements Reference',
        'https://html.spec.whatwg.org/'
    ],
    'html2': [
        'CSS Tricks - HTML & CSS',
        'https://css-tricks.com/'
    ],
    'css1': [
        'CSS Basics Tutorial',
        'https://developer.mozilla.org/en-US/docs/Web/CSS'
    ],
    'css2': [
        'Flexbox Guide',
        'https://css-tricks.com/snippets/css/a-guide-to-flexbox/'
    ],
    'php1': [
        'PHP Official Documentation',
        'https://www.php.net/docs.php'
    ],
    'php2': [
        'PHP The Right Way',
        'https://phptherightway.com/'
    ],
    'php3': [
        'PHP Security Best Practices'
    ],
    'php4': [
        'PHP & MySQL Tutorial'
    ],
    'js1': [
        'JavaScript MDN',
        'https://developer.mozilla.org/en-US/docs/Web/JavaScript'
    ],
    'js2': [
        'JavaScript.info',
        'https://javascript.info/'
    ]
};

// ============================================
// POPUP LOGIC
// ============================================

let currentTopic = '';

function openPopup(title, topicId) {
    currentTopic = topicId;
    document.getElementById('popupTitle').textContent = title + ' - Resources';
    renderResources();
    document.getElementById('popupOverlay').classList.add('active');
}

function closePopup() {
    document.getElementById('popupOverlay').classList.remove('active');
    currentTopic = '';
}

function renderResources() {
    const list = document.getElementById('resourceList');
    const topicResources = resources[currentTopic] || [];

    if (topicResources.length === 0) {
        list.innerHTML = '<li class="empty-msg">No resources added yet.</li>';
        return;
    }

    list.innerHTML = topicResources.map((res) => {
        const isUrl = res.startsWith('http');
        const content = isUrl 
            ? `<a href="${res}" target="_blank">${res}</a>` 
            : res;
        return `<li>${content}</li>`;
    }).join('');
}

// Close popup when clicking outside
document.getElementById('popupOverlay').addEventListener('click', function(e) {
    if (e.target === this) closePopup();
});
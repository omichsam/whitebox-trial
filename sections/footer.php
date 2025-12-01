<footer class="bg-dark text-white pt-8 pb-4">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1fr_250px_1fr_1fr] gap-4">
            <div>
                <div class="flex items-center text-center mb-6  bg-whitee rounded-lg ">
                    <!-- <div class="w-20 h-10 rounded-lg flex items-center justify-center mr-3"> 
                        <img src="sources/images/logo/Whitebox.png" alt="Whitebox Logo" height="20px !important" srcset>
                    </div> -->
                    <h3 class="text-xl font-bold text-white">About Us</h3>

                </div>
                <p class="text-gray-400 mb-6">The program is a
                    one-stop-shop for anyone who wants to
                    present/share/sell an idea, innovation, invention or
                    solution. The WhiteBox facility will
                    address submissions on a case-by-case basis,
                    creating opportunities for financial support,
                    office facilities, technical support, advisory
                    services, market access, networking
                    opportunities, and incubation/accelerator programs
                    through the partner ecosystem. </p>

                <h3 class="text-lg font-semibold mb-3">Follow Us</h3>
                <div class="flex justify-centerr space-x-4 text-center">
                    <a href="https://x.com/Whitebox_Ke" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-2x fa-twitter text-lg"></i>
                    </a>
                    <a href="https://www.facebook.com/WhiteBoxKenya#"
                        class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-2x fa-facebook-f text-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/kenya-ict-board/"
                        class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-2x fa-linkedin-in text-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/whitebox_ke/"
                        class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-2x fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>

            <div class="px-2">
                <h3 class="text-lg font-semibold mb-6 ">Important Links</h3>
                <ul class="space-y-3 px-4">
                    <li><a href="https://ict.go.ke/" class="text-gray-300 hover:text-white transition duration-300"
                            aria-placeholder="Ministry of ICT And The Digital Economy">MICDE</a></li>
                    <li><a href="https://icta.go.ke/"
                            class="text-gray-300 hover:text-white transition duration-300">ICTA</a>
                    </li>
                    <li><a href="https://digitalent.go.ke/"
                            class="text-gray-300 hover:text-white transition duration-300">Digitalent</a></li>
                    <li><a href="https://www.smartacademy.go.ke/"
                            class="text-gray-300 hover:text-white transition duration-300">Smart Academy</a>
                    </li>
                    <!-- <li><a href="#innovations"
                            class="text-gray-400 hover:text-white transition duration-300">Innovations</a></li> -->
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-6">Contact Us</h3>
                <address class="text-gray-400 not-italic">
                    <div class="flex items-start mb-4">
                        <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                        <span>ICT Authority, Telposta Towers, 12th
                            Flr, Kenyatta Avenue, Nairobi,
                            Kenya.</span>
                    </div>
                    <div class="flex items-start mb-4">
                        <i class="fas fa-map-pin mt-1 mr-3"></i>
                        <span>P.O. Box 27150 - 00100 - Nairobi,
                            Kenya.</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-phone-alt mr-3"></i>
                        <div>
                            <div>+254 20 2211960 / +254 20 2211961</div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-3"></i>
                        <a href="mailto:whitebox@icta.go.ke"
                            class="hover:text-white transition duration-300">whitebox@icta.go.ke</a>
                    </div>
                </address>
            </div>

            <!-- Twitter Feed Section -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Latest Tweets</h3>
                <div class="bg-gray-800 rounded-lg p-4 h-80 overflow-y-auto" id="tweetsContainer">
                    <div class="tweet">
                        <div class="tweet-header">
                            <div class="tweet-avatar">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div>
                                <span class="tweet-author">Huduma WhiteBox</span>
                                <span class="tweet-handle">@Whitebox_Ke</span>
                                <span class="tweet-time">· Loading...</span>
                            </div>
                        </div>
                        <div class="tweet-content">
                            Loading latest tweets from @Whitebox_Ke...
                        </div>
                        <div class="tweet-actions">
                            <div class="tweet-action">
                                <i class="far fa-comment"></i>
                                <span>0</span>
                            </div>
                            <div class="tweet-action">
                                <i class="fas fa-retweet"></i>
                                <span>0</span>
                            </div>
                            <div class="tweet-action">
                                <i class="far fa-heart"></i>
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
            <p>Copyright &copy; <span id="year"></span> Huduma WhiteBox. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // const API_BASE_URL = 'http://127.0.0.1:5000';
        // const TWEETS_LIMIT = 10;

	//const API_BASE_URL = 'http://127.0.0.1:5000';
        //const API_BASE_URL = 'http://10.241.18.19:8010/api/post';
        const API_BASE_URL = 'http://10.241.18.19:8010';
        const TWEETS_LIMIT = 10;

        function formatRelativeTime(createdAt) {
            if (!createdAt) return 'now';

            const now = new Date();
            const tweetTime = new Date(createdAt);
            const diffMs = now - tweetTime;
            const diffMins = Math.floor(diffMs / (1000 * 60));
            const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
            const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));

            if (diffMins < 1) return 'now';
            if (diffMins < 60) return `${diffMins}m`;
            if (diffHours < 24) return `${diffHours}h`;
            if (diffDays < 7) return `${diffDays}d`;

            return tweetTime.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        }

        function formatTweetText(text) {
            if (!text) return '';

            // First, remove any existing HTML tags and CSS that might be in the text
            let cleanText = text.replace(/<[^>]*>/g, '');

            // Replace URLs with clean clickable links
            cleanText = cleanText.replace(
                /(https?:\/\/[^\s]+)/g,
                '<a href="$1" target="_blank" class="tweet-link" onclick="event.stopPropagation()">$1</a>'
            );

            // Replace hashtags with styled spans
            cleanText = cleanText.replace(
                /#(\w+)/g,
                '<span class="tweet-hashtag">#$1</span>'
            );

            // Replace mentions with styled spans
            cleanText = cleanText.replace(
                /@(\w+)/g,
                '<span class="tweet-mention">@$1</span>'
            );

            return cleanText;
        }

        function createTweetHTML(tweet) {
            const formattedText = formatTweetText(tweet.text);
            const relativeTime = formatRelativeTime(tweet.created_at);
            const tweetUrl = tweet.url || `https://x.com/Whitebox_Ke/status/${tweet.id}`;

            return `
            <div class="tweet" onclick="window.open('${tweetUrl}', '_blank')">
                <div class="tweet-header">
                    <div class="tweet-avatar">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div>
                        <span class="tweet-author">Huduma WhiteBox</span>
                        <span class="tweet-handle">@Whitebox_Ke</span>
                        <span class="tweet-time">· ${relativeTime}</span>
                    </div>
                </div>
                <div class="tweet-content">${formattedText}</div>
                <div class="tweet-actions">
                    <div class="tweet-action" onclick="event.stopPropagation()">
                        <i class="far fa-comment"></i>
                        <span>${tweet.reply_count || 0}</span>
                    </div>
                    <div class="tweet-action" onclick="event.stopPropagation()">
                        <i class="fas fa-retweet"></i>
                        <span>${tweet.retweet_count || 0}</span>
                    </div>
                    <div class="tweet-action" onclick="event.stopPropagation()">
                        <i class="far fa-heart"></i>
                        <span>${tweet.like_count || 0}</span>
                    </div>
                </div>
            </div>
        `;
        }

        function showErrorMessage(message) {
            document.getElementById('tweetsContainer').innerHTML = `
            <div class="error-message">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="error-content">
                    <h4>Unable to Load Tweets</h4>
                    <p>${message}</p>
                    <button onclick="window.fetchTweets()" class="retry-btn">
                        <i class="fas fa-redo"></i> Try Again
                    </button>
                </div>
            </div>
        `;
        }

        function showNoTweetsMessage() {
            document.getElementById('tweetsContainer').innerHTML = `
            <div class="no-tweets-message">
                <div class="no-tweets-icon">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="no-tweets-content">
                    <h4>No Tweets Available</h4>
                    <p>No tweets found for @Whitebox_Ke. The Twitter fetcher may need to run to populate the database.</p>
                </div>
            </div>
        `;
        }

        async function fetchTweets() {
            try {
                const response = await fetch(`${API_BASE_URL}/api/posts?limit=${TWEETS_LIMIT}`);

                if (!response.ok) {
                    throw new Error(`API returned status: ${response.status}`);
                }

                const data = await response.json();

                if (data.success && data.posts && data.posts.length > 0) {
                    const tweetsHTML = data.posts.map(tweet => createTweetHTML(tweet)).join('');
                    document.getElementById('tweetsContainer').innerHTML = tweetsHTML;
                } else {
                    showNoTweetsMessage();
                }
            } catch (error) {
                console.error('Error fetching tweets:', error);
                showErrorMessage(`Failed to load tweets: ${error.message}. Please check if the API server is running.`);
            }
        }

        // Add CSS for tweet formatting and error messages
        const style = document.createElement('style');
        style.textContent = `
        .tweet {
            cursor: pointer;
            transition: all 0.2s ease;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 8px;
        }
        .tweet:hover {
            background-color: rgba(255, 255, 255, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .tweet:active {
            transform: translateY(0);
        }
        
        .tweet-link {
            color: #1da1f2;
            text-decoration: none;
            font-weight: 500;
            word-break: break-all;
        }
        .tweet-link:hover {
            text-decoration: underline;
        }
        .tweet-hashtag {
            color: #1da1f2;
            font-weight: 500;
        }
        .tweet-mention {
            color: #1da1f2;
            font-weight: 500;
        }
        
        /* Error message styles */
        .error-message {
            display: flex;
            align-items: center;
            padding: 20px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 8px;
            color: #fca5a5;
        }
        .error-icon {
            font-size: 24px;
            margin-right: 12px;
        }
        .error-content h4 {
            margin: 0 0 8px 0;
            color: #fca5a5;
            font-size: 16px;
        }
        .error-content p {
            margin: 0 0 12px 0;
            font-size: 14px;
            color: #fca5a5;
        }
        .retry-btn {
            background: #1da1f2;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
        }
        .retry-btn:hover {
            background: #0d8bd9;
        }
        
        /* No tweets message styles */
        .no-tweets-message {
            display: flex;
            align-items: center;
            padding: 20px;
            background: rgba(156, 163, 175, 0.1);
            border: 1px solid rgba(156, 163, 175, 0.2);
            border-radius: 8px;
            color: #9ca3af;
        }
        .no-tweets-icon {
            font-size: 24px;
            margin-right: 12px;
        }
        .no-tweets-content h4 {
            margin: 0 0 8px 0;
            color: #9ca3af;
            font-size: 16px;
        }
        .no-tweets-content p {
            margin: 0;
            font-size: 14px;
            color: #9ca3af;
        }
        
        /* Ensure tweet content styling */
        .tweet-content {
            color: #e5e7eb;
            line-height: 1.4;
            margin-bottom: 12px;
            word-wrap: break-word;
        }
        .tweet-content a {
            color: #1da1f2;
            text-decoration: none;
        }
        .tweet-content a:hover {
            text-decoration: underline;
        }
        
        /* Tweet actions - prevent click propagation */
        .tweet-actions {
            pointer-events: none;
        }
        .tweet-action {
            pointer-events: auto;
            display: flex;
            align-items: center;
            gap: 6px;
            color: #9ca3af;
            font-size: 14px;
            cursor: pointer;
            transition: color 0.2s;
        }
        .tweet-action:hover {
            color: #1da1f2;
        }
    `;
        document.head.appendChild(style);

        // Make fetchTweets available globally for the retry button
        window.fetchTweets = fetchTweets;

        // Load tweets when page loads
        fetchTweets();

        // Auto-refresh every 5 minutes
        setInterval(fetchTweets, 5 * 60 * 1000);
    });
</script>

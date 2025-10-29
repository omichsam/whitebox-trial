<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Twitter Feed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        
        body {
            background-color: #f7f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e8ed;
        }
        
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #1da1f2;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 40px;
        }
        
        .profile-info h1 {
            font-size: 24px;
            margin-bottom: 5px;
            color: #14171a;
        }
        
        .profile-info p {
            color: #657786;
            margin-bottom: 10px;
        }
        
        .stats {
            display: flex;
            gap: 15px;
        }
        
        .stat {
            color: #657786;
            font-size: 14px;
        }
        
        .stat span {
            color: #14171a;
            font-weight: bold;
        }
        
        .tweets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .tweet-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .tweet-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }
        
        .tweet-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .tweet-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #1da1f2;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
            font-size: 20px;
        }
        
        .tweet-user {
            font-weight: bold;
            color: #14171a;
        }
        
        .tweet-handle {
            color: #657786;
            margin-left: 5px;
        }
        
        .tweet-date {
            color: #657786;
            font-size: 14px;
            margin-top: 2px;
        }
        
        .tweet-content {
            margin-bottom: 15px;
            color: #14171a;
            line-height: 1.5;
        }
        
        .tweet-actions {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #e1e8ed;
            padding-top: 15px;
        }
        
        .action {
            display: flex;
            align-items: center;
            color: #657786;
            font-size: 14px;
        }
        
        .action i {
            margin-right: 5px;
        }
        
        .action.like:hover {
            color: #e0245e;
        }
        
        .action.retweet:hover {
            color: #17bf63;
        }
        
        .action.reply:hover {
            color: #1da1f2;
        }
        
        .loading {
            text-align: center;
            padding: 40px;
            color: #657786;
        }
        
        .error {
            text-align: center;
            padding: 40px;
            color: #e0245e;
        }
        
        .refresh-btn {
            display: block;
            margin: 30px auto;
            padding: 12px 24px;
            background-color: #1da1f2;
            color: white;
            border: none;
            border-radius: 24px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .refresh-btn:hover {
            background-color: #1a91da;
        }
        
        @media (max-width: 768px) {
            .tweets-grid {
                grid-template-columns: 1fr;
            }
            
            header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-image {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .stats {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="profile-image">
                <i class="fab fa-twitter"></i>
            </div>
            <div class="profile-info">
                <h1>Your Twitter Account</h1>
                <p>@yourusername</p>
                <div class="stats">
                    <div class="stat">Tweets: <span>327</span></div>
                    <div class="stat">Following: <span>458</span></div>
                    <div class="stat">Followers: <span>1.2K</span></div>
                </div>
            </div>
        </header>
        
        <div id="tweets-container">
            <div class="loading">
                <i class="fas fa-spinner fa-spin"></i>
                <p>Loading tweets...</p>
            </div>
        </div>
        
        <button class="refresh-btn" onclick="loadTweets()">
            <i class="fas fa-sync-alt"></i> Refresh Tweets
        </button>
    </div>

    <script>
        // Mock tweet data - in a real implementation, you would fetch this from the Twitter API
        const mockTweets = [
            {
                id: 1,
                text: "Just launched my new website! Check it out for the latest updates on web development and design. #webdev #design",
                date: "2 hours ago",
                likes: 24,
                retweets: 7,
                replies: 3
            },
            {
                id: 2,
                text: "Working on a new project that uses AI to generate code components. Can't wait to share it with everyone! #AI #coding",
                date: "1 day ago",
                likes: 56,
                retweets: 12,
                replies: 8
            },
            {
                id: 3,
                text: "The future of web development is looking bright with all the new technologies emerging. What's your favorite new tool or framework?",
                date: "3 days ago",
                likes: 42,
                retweets: 9,
                replies: 15
            },
            {
                id: 4,
                text: "Just published a new article about responsive design techniques. Check the link in my bio to read it! #webdesign #responsive",
                date: "4 days ago",
                likes: 31,
                retweets: 6,
                replies: 2
            },
            {
                id: 5,
                text: "Beautiful day for coding outdoors! ☀️ Remember to take breaks and enjoy the little things while working. #coderlife",
                date: "5 days ago",
                likes: 67,
                retweets: 14,
                replies: 5
            },
            {
                id: 6,
                text: "What's your favorite programming language for web development? I'm currently loving TypeScript for its type safety!",
                date: "1 week ago",
                likes: 38,
                retweets: 5,
                replies: 12
            }
        ];

        function loadTweets() {
            const tweetsContainer = document.getElementById('tweets-container');
            tweetsContainer.innerHTML = `
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading tweets...</p>
                </div>
            `;
            
            // Simulate API call delay
            setTimeout(() => {
                displayTweets(mockTweets);
            }, 1000);
        }
        
        function displayTweets(tweets) {
            const tweetsContainer = document.getElementById('tweets-container');
            
            if (tweets.length === 0) {
                tweetsContainer.innerHTML = `
                    <div class="error">
                        <i class="fas fa-exclamation-circle"></i>
                        <p>No tweets found for this account.</p>
                    </div>
                `;
                return;
            }
            
            let tweetsHTML = '<div class="tweets-grid">';
            
            tweets.forEach(tweet => {
                tweetsHTML += `
                    <div class="tweet-card">
                        <div class="tweet-header">
                            <div class="tweet-avatar">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div>
                                <div class="tweet-user">Your Twitter Account<span class="tweet-handle">@yourusername</span></div>
                                <div class="tweet-date">${tweet.date}</div>
                            </div>
                        </div>
                        <div class="tweet-content">
                            ${tweet.text}
                        </div>
                        <div class="tweet-actions">
                            <div class="action reply">
                                <i class="far fa-comment"></i> ${tweet.replies}
                            </div>
                            <div class="action retweet">
                                <i class="fas fa-retweet"></i> ${tweet.retweets}
                            </div>
                            <div class="action like">
                                <i class="far fa-heart"></i> ${tweet.likes}
                            </div>
                        </div>
                    </div>
                `;
            });
            
            tweetsHTML += '</div>';
            tweetsContainer.innerHTML = tweetsHTML;
        }
        
        // Load tweets when page loads
        document.addEventListener('DOMContentLoaded', loadTweets);
    </script>
</body>
</html>
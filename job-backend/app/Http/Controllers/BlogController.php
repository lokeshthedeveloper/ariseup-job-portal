<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // For now, using dummy data. Replace with actual database query when Blog model is ready
        $posts = $this->getDummyPosts();

        // Paginate posts (12 per page)
        $perPage = 12;
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedPosts = array_slice($posts, $offset, $perPage);

        return view('frontend.blog.index', [
            'posts' => $paginatedPosts,
            'total' => count($posts),
            'perPage' => $perPage,
            'currentPage' => $currentPage
        ]);
    }

    /**
     * Display the specified blog post.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // For now, using dummy data. Replace with actual database query when Blog model is ready
        $post = $this->getDummyPost($slug);

        if (!$post) {
            abort(404);
        }

        $recentPosts = array_slice($this->getDummyPosts(), 0, 5);
        $categories = ['Career Tips', 'Interview Guide', 'Industry News', 'Resume Writing', 'Job Search'];

        return view('frontend.blog.show', [
            'post' => $post,
            'recentPosts' => $recentPosts,
            'categories' => $categories
        ]);
    }

    /**
     * Get dummy blog posts (temporary - replace with database query)
     *
     * @return array
     */
    private function getDummyPosts()
    {
        return [
            [
                'id' => 1,
                'title' => 'Why Every Recruitment Agency Needs a White-Label Job Portal',
                'slug' => 'why-every-recruitment-agency-needs-a-white-label-job-portal',
                'excerpt' => 'Discover how a branded job portal can increase your agency\'s credibility and candidate retention.',
                'content' => 'In today\'s competitive recruitment landscape, having your own branded job portal is no longer a luxury—it\'s a necessity...',
                'author' => 'James Wilson',
                'category' => 'Business Growth',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => now()->subDays(2),
                'views' => 1542
            ],
            [
                'id' => 2,
                'title' => 'Scaling Your Consultancy: From 10 to 100 Placements a Month',
                'slug' => 'scaling-your-consultancy-from-10-to-100-placements-a-month',
                'excerpt' => 'Learn the strategies top consultancies use to scale their operations using automation and ERP systems.',
                'content' => 'Scaling a recruitment consultancy requires more than just hard work; it requires the right infrastructure and tools...',
                'author' => 'Sarah Johnson',
                'category' => 'Agency Tips',
                'image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => now()->subDays(5),
                'views' => 2156
            ],
            [
                'id' => 3,
                'title' => 'The Power of Referral Networks in Modern Recruitment',
                'slug' => 'the-power-of-referral-networks-in-modern-recruitment',
                'excerpt' => 'How to leverage referral partners to source high-quality candidates faster than your competitors.',
                'content' => 'Referrals are the gold standard of recruitment. But managing a referral network manually is impossible at scale...',
                'author' => 'Michael Chen',
                'category' => 'Recruitment Strategy',
                'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => now()->subDays(8),
                'views' => 3421
            ],
            [
                'id' => 4,
                'title' => '5 Features Your Job Portal Must Have in 2024',
                'slug' => '5-features-your-job-portal-must-have-in-2024',
                'excerpt' => 'From AI matching to video resumes, ensure your portal has the features that attract top talent.',
                'content' => 'Candidate expectations have changed. If your job portal looks like it was built in 2010, you are losing talent...',
                'author' => 'Emily Rodriguez',
                'category' => 'Technology',
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => now()->subDays(12),
                'views' => 1876
            ],
            [
                'id' => 5,
                'title' => 'Monetizing Your Job Board: Prepaid vs. Post-paid Models',
                'slug' => 'monetizing-your-job-board-prepaid-vs-post-paid-models',
                'excerpt' => 'Explore different revenue models for your recruitment business and which one yields the highest ROI.',
                'content' => 'Should you charge employers upfront or upon successful hire? The answer depends on your niche and business model...',
                'author' => 'David Lee',
                'category' => 'Business Growth',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => now()->subDays(15),
                'views' => 2543
            ],
            [
                'id' => 6,
                'title' => 'Building a Strong Employer Brand with Custom Domains',
                'slug' => 'building-a-strong-employer-brand-with-custom-domains',
                'excerpt' => 'Why hosting your career site on your own domain matters for trust and SEO.',
                'content' => 'Your career site is an extension of your brand. Using a generic third-party URL dilutes your brand identity...',
                'author' => 'Lisa Wang',
                'category' => 'Branding',
                'image' => 'https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'created_at' => now()->subDays(20),
                'views' => 1987
            ]
        ];
    }

    /**
     * Get a single dummy blog post by slug
     *
     * @param  string  $slug
     * @return array|null
     */
    private function getDummyPost($slug)
    {
        $posts = $this->getDummyPosts();

        foreach ($posts as $post) {
            if ($post['slug'] === $slug) {
                // Add full content for individual post view
                $post['content'] = $this->getFullPostContent($post['id']);
                return $post;
            }
        }

        return null;
    }

    /**
     * Get full content for a blog post
     *
     * @param  int  $id
     * @return string
     */
    private function getFullPostContent($id)
    {
        return <<<HTML
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<h3>Key Takeaways</h3>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<ul>
  <li>Important point number one that you should remember</li>
  <li>Another crucial aspect of this topic</li>
  <li>Don't forget about this essential element</li>
  <li>This final point ties everything together</li>
</ul>

<h3>Deep Dive into the Topic</h3>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

<blockquote>
  <p>"Success is not final, failure is not fatal: it is the courage to continue that counts." - Winston Churchill</p>
</blockquote>

<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>

<h3>Practical Application</h3>
<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>

<ol>
  <li>First step in the process</li>
  <li>Second important action to take</li>
  <li>Third crucial element</li>
  <li>Final step to complete the journey</li>
</ol>

<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>

<h3>Conclusion</h3>
<p>In conclusion, understanding these concepts will help you advance in your career and achieve your professional goals. Remember to stay focused, keep learning, and never stop improving yourself.</p>
HTML;
    }
}

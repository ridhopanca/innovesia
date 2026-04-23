<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            // ===== HOME PAGE (page_id: 1) =====
            // Hero Section
            [
                'page_id' => 1,
                'page_template' => 'home',
                'type' => 'hero',
                'order' => 1,
                'content' => json_encode([
                    "badge" => "The Human Architect",
                    "title" => "Designing Innovation Through",
                    "title_highlight" => "Human Insight",
                    "description" => "Empowering organizations through research, design thinking, and innovation strategy. We curate intellectual journeys that transform vision into impact.",
                    "primary_button" => "Explore Services",
                    "secondary_button" => "See Our Work",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuA4xgsWSzzroCH2VeOFuqbUKhMnBGWwtYIq0tt5qFkHW-2VmJVijsnoxLh8aoIuDLH7JGvPb_7eXVmkLViS1s5XlHeQhD4rb9_MF46SWpZRk_xbKZtuVZQgi9QZPM0QaSHjX5xApKEzjlewHnxi8x5h_XH_i7t86IPJ3zd6ysAHCqkLXCMNwmIgV_3lYpU6dUhl2PPtUU54auSn2BGEzhfyyzEasb6rH9YGtaSg4g36zrROzh_Ft1kCKAlyPljadjWIkNCpuECfRt8i"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Services Section
            [
                'page_id' => 1,
                'page_template' => 'home',
                'type' => 'services',
                'order' => 2,
                'content' => json_encode([
                    "title" => "Strategic Capabilities",
                    "description" => "We bridge the gap between high-stakes corporate strategy and the fluid, empathetic energy of human-centered innovation.",
                    "link_text" => "View All Capabilities",
                    "services" => [
                        ["icon" => "biotech", "title" => "Design Research", "description" => "Deep ethnographic studies and behavioral analysis to uncover the 'why' behind user actions."],
                        ["icon" => "strategy", "title" => "Innovation Strategy", "description" => "Future-proofing your organization with scalable innovation frameworks and roadmaps."],
                        ["icon" => "co_present", "title" => "Human-Centered Design", "description" => "Creating digital and physical products that resonate with real people in real contexts."]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Metrics Section
            [
                'page_id' => 1,
                'page_template' => 'home',
                'type' => 'metrics',
                'order' => 3,
                'content' => json_encode([
                    "items" => [
                        ["label" => "Global Impact", "value" => "500+", "desc" => "Innovation Projects"],
                        ["label" => "Network", "value" => "120+", "desc" => "Corporate Partners"],
                        ["label" => "Footprint", "value" => "15", "desc" => "Major Hub Cities"],
                        ["label" => "Success Rate", "value" => "92%", "desc" => "Client Satisfaction"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Portfolio Preview Section
            [
                'page_id' => 1,
                'page_template' => 'home',
                'type' => 'portfolio-preview',
                'order' => 4,
                'content' => json_encode([
                    "title" => "Strategic Case Studies",
                    "projects" => [
                        ["category" => "FinTech • 2024", "title" => "Reimagining Digital Banking for Gen-Z", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCKC0XeXEi3LBDgxm7gWbJ4uwjMVgbiFDzqKd2sXUCXoKvtqUr0d7SfrNAteXUwd_FLXjJvFkZ_t-R4QUrejH8Wx9Bex-xG2rxYBFCAKjqxCgm-E8K5PdD_-mlMy3Dqjnolno3xIxR4oGCTCZ9dgwEnHQS_H62JalYF3vJ5XKDT-DMmITr5cpWL_GI_qC3-f7j0PLkSwZbg34t18GqjoCtKJAV7irxE8AsScC9yN-_oFzHLi8bXGZjCGrO_sybTEoCaydquaU9HG_N6"],
                        ["category" => "Sustainability • 2023", "title" => "Eco-Systems Architecture", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAijYmEUvBhyQcSY-scU2YiWZRqFOa2TPRNhhvqFkq69_sq_7V60Td7dhk-CZyLzlggQ6A-NmIPP4iTFY_GCvmWNUBJ_rpjq1PWyMJhEPuEb1Eubo-g_81CzmA1T-vnPFk_a-QtERdg9d3ETVWhQlCepNGk4ry4K4gasZr33Z28ujEMV6VMS9Wh2xdlooU2wR_2l-GyMzmgomiJxMWWcZx9MppFm-Vwf7yyZt_ZvCOREtPUDl7Ne_xJdHT7T6ihgiXqdzsuikDADZrc"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Instagram Section
            [
                'page_id' => 1,
                'page_template' => 'home',
                'type' => 'instagram',
                'order' => 5,
                'content' => json_encode([
                    "title" => "Latest from Innovesia",
                    "subtitle" => "Join our conversation on @innovesia_id",
                    "button_text" => "Follow Us",
                    "posts" => [
                        ["image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCzKNglCWAud0Nsf8MrSu9Z1bg7ck4mBLdRCr9GvvqxEwZwekrsYd0UMSatPDY6qn5JcA7-fE51UQBFH7m1lniM0GXBRs7Q7eiiSpaKaY4jBGe5axtafH471EevWD8ysqQzvS7VxvyM1eGMNQo_TTrRqI4AIsreLk_CsmP91HrSeR4AzHlQNNrrvpjYPdq8OrnqIa_6jvbloBApC6-V1J12NrFDCiMWN2jYS8zIwvwbdnaU8vB1kHPpj0ObQfvywPEMlfjqgQkQ38r3", "caption" => "Capturing the spark of empathy during our latest co-creation sprint. #DesignThinking", "time" => "2 hours ago"],
                        ["image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuATs_7HdDALqVCHcIfvC3MjbyEm0v0UWWArUCCnfvT-srLt1sOXRP7yLWT9X3KSQgfpehwd_fAGfHDo6kNhbHZRvkNFkgvwoirFN5_RV-1mSwVIbOmB_ApeBVGQ3-VSXjuROvwbUrCWfgiJMp5BHm1OYRLI8EKPPFbSAxw7hlO3DwsGu9CaQuk7VH92h6jzQVbKVMB-1D15vSmkNJYe5lUUDDJEkUXIaoFhxoI_lnwZUIZsXu2ozfI1epfxH20lSTCqU01uktqBZpc-", "caption" => "Monday morning strategy sync. New horizons for our clients in SE Asia. #Innovation", "time" => "1 day ago"],
                        ["image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBq6RCqugeHy6Wz4mifcGYxKJPGg8drgBOTAfeb7lFA5jMB89M6hjp7dxtkmP8lv-ZY9gHD1QDzCRMq913_VGTDofGQyDHMEdJGxTLoLebWd9IwNPedULXTsOj7b4BUgquGZ3hEBeWvqhLy-yzQ7D4CcTN3bO2qgk2AO1lwANgEZjnKCS3sK5vBYDcgbeh58dPl5sSuX7htKHG3o1IAxAZX4ZBHna5XmwDI3noDzI-dTnVVCtrXC3Xqe1IIhg7ht8mnoBnSpHsBg7fk", "caption" => "Behind the scenes: The quiet power of research analysis. #HumanInsight", "time" => "3 days ago"],
                        ["image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDsbbQDDgtt6SW6Czf6J6kuv6bUE_cS3kavoFDPt9UWvk9m6gghiJ2GBs2aH3m364Vu2FtlXjqz2oEI2cuAs0wca62eVZYIx0lfE2CxNJK2EyITEpj4B2FkhOBZ3YvgtruMZqZhfbHkcGQNV8QRcO_GuZ4NMrzaC019i68HWcN4Llkj1bcngZdDS-d3Oq1v0Q0ZGon9ydjm4lmfiQ_wIRK1ncEqtL0OHQRMkkj_YO9Vkikl9F6_Co6F3-4N0_3HojsTo0wvnhBsbRAn", "caption" => "Iterating towards perfection. Every pixel counts. #UIDesign #Innovesia", "time" => "1 week ago"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== ABOUT PAGE (page_id: 2) =====
            // Hero Section
            [
                'page_id' => 2,
                'page_template' => 'about',
                'type' => 'hero',
                'order' => 1,
                'content' => json_encode([
                    "badge" => "Our Narrative",
                    "title" => "Architecting the",
                    "title_highlight" => "Human-Centered Future.",
                    "description" => "Innovesia began as a response to clinical consultancy. We saw organizations rich in data but poor in human connection. We emerged to bridge that gap—merging the rigor of strategic architecture with the raw empathy of human experience.",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBrMkIMirtz9V2uLTNIfVs4GGC3sK0pmIuUdZOQLTeRCq3pNuCUIBNm_qHIFxsJaAhUGrb_0ZqO3eKBBU2tmgOhsZEgkgtbdHWB37oioQ0Z5YQt58XR89Vvoe9Q_7VLDWzp06Hyksz4VDTeeUt2RInAiNF3pp5F_FtG5V38eQlXpRHXitrjDX7rc6VWt1QE1uUS3hm1-YW2ZlSTdiqTKRySFcJmxYty6A5dW0N253kaZ450_gD5W7-81WD4q6YLHGSy1qOjHEPFUwHb"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Vision Mission Section
            [
                'page_id' => 2,
                'page_template' => 'about',
                'type' => 'vision-mission',
                'order' => 2,
                'content' => json_encode([
                    "mission" => ["icon" => "rocket_launch", "title" => "Our Mission", "description" => "To empower organizations with the methodology to innovate fearlessly, placing the human at the center of every strategic pivot and digital transformation."],
                    "vision" => ["icon" => "visibility", "title" => "Our Vision", "description" => "To be the global benchmark for empathetic strategy, where innovation isn't just about the next product, but about the next standard for human progress."]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Team Section
            [
                'page_id' => 2,
                'page_template' => 'about',
                'type' => 'team',
                'order' => 3,
                'content' => json_encode([
                    "subtitle" => "Leadership",
                    "title" => "The Minds Behind the Innovation.",
                    "button_text" => "Join our collective",
                    "members" => [
                        ["name" => "Adrian Wijaya", "role" => "Founder & Chief Architect", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCCbTxo7IiHrr_PLLiPmKAh5iKZNT0UdChlZjXZPSq20p1iBLx1nWWPzde4GHGrdjGuM6QZFz251No7052WdAhCw6okiLYjYxLBAeTQNPIhvk5HsH0-FBSX8iZvqX2ystkv-mPy7vgoCVqnrPfPNgj5xw306C0V2wSnSpIL6R_tR265k4fwpFiR9jYXtJaV7iZK340c-6rTr88WWEvETg4bjeHvS1mijf4NJuwa2BOvgmMvlZ4zBnyLJYPUN3QQK7E7g4wIFhBhBz5M"],
                        ["name" => "Sarah Tan", "role" => "Director of Insights", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBrPNj71K02I25TIA6GG-Hs_nOUrA8ltSoL6HbC9CU0mQhRRksCoXwaZQBNeHen3f7cujmxZzMo-bYyeSixmt0btW2l9XdKdPhpuz_TFyqSd9kSTExsZbqExeifh9yXapi43E3yNHKxheY6zasou1GySlKq-AuTIrxMiLRk9Fohx6CGiV83yO7zjxu0AVJR4wxyvIcFTtvr6jUgCBYMg-EV7zNjrUtqBP2OqfiRQW0KUPDkyg2oBV7IK-xtjrGR7-CM6LYrGZkNFKLX"],
                        ["name" => "Marcus Low", "role" => "Head of Design", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCCpRMSGb9ajWQLnKXhwOIN9FUbtp_4XOSXUOMBZsfQ_al8ryiZSRT3qQHYRIXBylfu14xfjjS0jG94_urAL5CIb00eG-_dKWQTUDScXLK5EZUHbu8VoLjOX8rxUYnsrhc8trhnTytG-yhew-TC4nvQvEXhpOmRMqU3lNIX6-cZ6cR1LumRCWYnt6R58HyAwAx1457XRB_C0bsefXbEnWO3bbIdvulpCGRFEGS8epNFI5EMAWXM-OP-3ToFp1UaxC_Q3ECU-j4YNvb_"],
                        ["name" => "Elena Rossi", "role" => "Operations Principal", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAz1THeLtSFYlZsWdoVrA8PylALxLrWl7XF_GhRxmx6q1Tj3arB8SCMJSXajxPTDQk3BsA_rKMQRe96tTXvNWKw9D5atzFSBjWzY97LRxplvWg5aocewp5-769FG3_xuVxH6y654n7eFxF-MIRHb5lwE5kLqPvrCmVrm8kYCgjzRrKOvsH_oBnwW8s5EXeHOuQC9X5e44PpD-pgw5wZp4hP1uc-JQpnA63ux80vtlB-8o1HqO8DG_Jd2o9lnHtNM_OXw0IxLYO85PlI"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Timeline Section
            [
                'page_id' => 2,
                'page_template' => 'about',
                'type' => 'timeline',
                'order' => 4,
                'content' => json_encode([
                    "title" => "Our Evolution",
                    "milestones" => [
                        ["year" => "2014", "title" => "Genesis", "description" => "Founded in Jakarta with a mission to disrupt traditional consultancy through Design Thinking."],
                        ["year" => "2017", "title" => "Expansion", "description" => "Scaled operations to Southeast Asia, partnering with Fortune 500 companies in Singapore."],
                        ["year" => "2020", "title" => "Resilience", "description" => "Pioneered remote innovation workshops and digital ecosystem strategies during global shifts."],
                        ["year" => "2024", "title" => "Horizon", "description" => "Launching Innovesia Labs to focus on Ethical AI and Sustainable Product Design."]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Approach Section
            [
                'page_id' => 2,
                'page_template' => 'about',
                'type' => 'approach',
                'order' => 5,
                'content' => json_encode([
                    "title" => "The Innovesia Approach",
                    "description" => "We don't just guess. We validate through a dual-lens methodology that balances data precision with anthropological depth.",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDKhhIAfdSYFUgJXBDdlJUx3VublaLq7BU9upYMyoUkNQ4-chyItk21y5hcIJfFkf-O30KVI_bpuBEfcT5upXMjZ4ORix-UWuCNXsPM-c-5V25GXRMBO_pOu6yakJKNi_UlvzzEb_j3D8RTUpV7zdfjE8TJKA-eXIxo6ODKXdDtF3WAKWzukPgqMy5sLn_sZA6Ox8YYySc1YGyMT_xO0lfqlNxf2LlcRDKA0xAFGWy4u_HNCP8c4ALAUStKWcpd_9nhPL1HajXXwj4z",
                    "approaches" => [
                        ["icon" => "psychology", "title" => "Design Thinking", "description" => "A relentless focus on empathy-led problem solving. We deconstruct silos to find the resonant human truth behind every business challenge."],
                        ["icon" => "analytics", "title" => "Insightism™", "description" => "Our proprietary framework where cold data meets human validation. We don't just read the charts; we observe the behaviors that drive them."]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== PRODUCT PAGE (page_id: 3) =====
            // Hero Section
            [
                'page_id' => 3,
                'page_template' => 'product',
                'type' => 'hero',
                'order' => 1,
                'content' => json_encode([
                    "badge" => "Strategic Solutions",
                    "title" => "Human-Centered Architecture.",
                    "description" => "We blend institutional precision with creative empathy to build products, services, and policies that matter for the next generation.",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCopUu2y-yWNroJu_Px-4JqLhyqiUAEeX9joThZXeIscOx7T5NolDs7RZzW9obziH8x9LlHuybrfKGiYDPaZHf4s7iC51wXur8Uepl_vYSsfHi96y0i4UEEQN7rDqxZSEMRm9r1HWYzkHaU3MTqXqjEkDhwPYHLT1YT3gU5Ok2K4jE7OCQFYT42NyN0WUDEK_5WrT28Ndic11_zsB5C9U6xWF4ZLSCx7z8jVVjistxhwC4sNfdAg0sSZlryZNS7zJxT6pSPKgm5IG2G",
                    "quote" => "\"Bridging the gap between corporate strategy and human experience.\""
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Service Section
            [
                'page_id' => 3,
                'page_template' => 'product',
                'type' => 'service',
                'order' => 2,
                'content' => json_encode([
                    "title" => "Service Catalog",
                    "description" => "Tailored architectural approaches for your most complex organizational challenges.",
                    "services" => [
                        ["icon" => "insights", "title" => "Research & Insight", "description" => "Uncovering hidden behavioral patterns and market signals through deep qualitative and quantitative ethnography.", "link" => "Explore Service"],
                        ["icon" => "science", "title" => "Innovation Lab", "description" => "Dedicated sandbox environments for testing disruptive business models and technical feasibility without legacy constraints.", "link" => "Book a Session"],
                        ["icon" => "groups", "title" => "Design Thinking Workshop", "description" => "High-energy collaborative sessions to break internal silos and foster a culture of creative problem solving.", "link" => "Learn More"],
                        ["icon" => "account_balance", "title" => "Government & Policy", "description" => "Redesigning public services and civic experiences through human-centric policy frameworks.", "link" => "View Frameworks"],
                        ["icon" => "database", "title" => "Digital & Data Platform", "description" => "Architecting scalable digital foundations that convert raw data into actionable stakeholder value.", "link" => "See Tech Stack"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Process Section
            [
                'page_id' => 3,
                'page_template' => 'product',
                'type' => 'process',
                'order' => 3,
                'content' => json_encode([
                    "title" => "The Innovation Journey",
                    "description" => "Our methodology is rooted in the Design Thinking cycle, adapted for high-stakes institutional environments.",
                    "steps" => [
                        ["icon" => "visibility", "title" => "Empathize", "description" => "Deep immersion into stakeholder realities."],
                        ["icon" => "architecture", "title" => "Define", "description" => "Synthesizing insights into strategic clarity."],
                        ["icon" => "lightbulb", "title" => "Ideate", "description" => "Generating unconstrained innovative solutions."],
                        ["icon" => "precision_manufacturing", "title" => "Prototype", "description" => "Rapid creation of low-fidelity artifacts."],
                        ["icon" => "checklist_rtl", "title" => "Validate", "description" => "Iterative testing for real-world impact."]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // CTA Section
            [
                'page_id' => 3,
                'page_template' => 'product',
                'type' => 'cta',
                'order' => 4,
                'content' => json_encode([
                    "title" => "Ready to architect your future?",
                    "description" => "Let's discuss how our human-centered approach can solve your organization's most pressing strategic questions.",
                    "primary_button" => "Request a Consultation",
                    "secondary_button" => "View Case Studies",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuANGIfrD5ngHDrU5Qy61v-d3ZYiz4eLHMkFXbC3SfJqqu8Bn_Opl4JBA5mblxietUuszrk0tut2AzDjk8T0EiLGiEdL2cjXe5YeBejhpA3AlA6v_Z_tAOTqYWh434_iX0cR1H7Cq4A-N_7QtbfVcFZ_7pp-S49hIMvO9HmFiO0Yb30txuUVtL-2BGuL94G5X_t8G15-8LkRTx0b0BQDrxqfyyadBX61XlCamvmtyoutU1qI4K0MstWrlCgm6dKmLllAgoCyQWGIrZfs"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== PORTFOLIO PAGE (page_id: 4) =====
            // Hero Section
            [
                'page_id' => 4,
                'page_template' => 'portfolio',
                'type' => 'hero',
                'order' => 1,
                'content' => json_encode([
                    "subtitle" => "Archive 2020—2024",
                    "title" => "Architecture of",
                    "title_highlight" => "Human Impact.",
                    "quote" => "We don't just build systems; we curate the intellectual journey of industry leaders through intentional design and strategic precision."
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Case Section
            [
                'page_id' => 4,
                'page_template' => 'portfolio',
                'type' => 'case',
                'order' => 2,
                'content' => json_encode([
                    "featured" => [
                        "category" => "FINANCIAL TECHNOLOGY",
                        "title" => "The Neobank Paradigm",
                        "description" => "Redesigning the digital banking experience for 2 million Gen Z users through empathy-driven architecture.",
                        "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBCZOreBxGn-EWiFHBAf30QG-gX933LSOLV0JcQHHiAYUA-Y2aQoxqXT9yVu4npwnXSh4jod4dp1KFd1ah-QT-AluVlFXPTusMZUFHz4QnhbvE3sPrvMX8yQYNDJ2hWSRg9mr56QwmdMMkOW3NEDboMl7KBEl2cx0HN7LeuuP7bxPj-Q8rWscfVVHaP89Nl24MVOgE2boMDOiHkl3FNfwPyo8WP9a02XVVvZzWNcJZxU66IT8vN4rVE8FM32tyoE7aeHFIprlppmo1B",
                        "metrics" => [["value" => "+140%", "label" => "User Retention"], ["value" => "4.9/5", "label" => "App Rating"]]
                    ],
                    "cases" => [
                        ["category" => "MANUFACTURING 4.0", "title" => "Eco-System Automation", "description" => "Implementing human-centric AI workflows across high-scale industrial production lines.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuChfxfGxKWvC5I1VtQGrGX954-DnfZ13-LinW0prRYRdBkKboE19HwIG9_5Xiax3vWxdjHk4IToZkRc88qrjML5ma0RCpRtVvncgTk6tSvJG7uHHi59ZNN9yUjE_MErUwKn_ZQnEBYKG75CQM22qESLC7HvIeymHteZbr5iJCPioL1Qh5aGFIp0LEVQKVFmeXk7LA_n-T4ZIJXOIsCb8TqO6pESHWWhQUvQGmACap2LjP1_EJ-qArHvwd7DKinF-wvzJzl-J74Z0R8y"],
                        ["category" => "RETAIL & E-COMMERCE", "title" => "Omnichannel Experience for Global Luxury", "description" => "Bridging the gap between physical boutique intimacy and high-speed digital fulfillment.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuD8KinEqpw2Lf2o6BWSvGpmGWaeRZw4YDJB6ro4CcXM7hpnCmhMEBoB0-8KGpk4nHcjQ1Qp1Nx1pyvaI8Fd8235mGfmGZKVXg1RrdFsGp5zYD8gbl79712gC05w4cohLku8O-ufBEIWnlkIgbBwIthNIVNtA9qQ5hkMMU_gooI92sRzQH1hVy4-2f0yyBFCez7v9tUbM_PKHyz4HxCm4yH1UQTuIvAgfLgXq3pKbmGGDC0hTrpaCfBkIgMvt96iUBeGmJCh_-SrEAdo"]
                    ],
                    "highlight" => ["icon" => "rocket_launch", "title" => "Aviation Re-Launch", "description" => "Scaling a legacy carrier's internal culture for the post-digital age of flight.", "metric" => "32%", "metric_label" => "Efficiency Boost"]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Testimonial Section
            [
                'page_id' => 4,
                'page_template' => 'portfolio',
                'type' => 'testimonial',
                'order' => 3,
                'content' => json_encode([
                    "title" => "Partners in Thinking.",
                    "subtitle" => "True innovation is a collaborative act. Here is how our clients felt during the transformation of their institutional legacies.",
                    "testimonials" => [
                        ["quote" => "Innovesia didn't just give us a deck; they gave us a new way of seeing our own customers. Their human-centered approach is rare in high-stakes consulting.", "name" => "Marcus Thorne", "role" => "Chief Innovation Officer, Vertex Corp", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBrpHTe1XLuM5a1W96XP1dfQnzjJSpxF7eh1EDrZeGRNGEUBuUzhX49LLrZ8NZRD-bMa6QA2v1yorXE8kOgpsNsJail0iy7Rm4cbkrFaBMV2XwJGV8DP49DFgVr6yZLmkixlk8-aRhU1g-BjX3J_AYLM3-DgQ73k4p_3xnlcRjeWYEpiBEXmS1cj9-k4Xc-YtJeSJ2LX-WQiZi7pnZkB0-aDk6e-pxeOeSAI6zwqj9Z06usri_b-jObxcW6hQ0CP3IRo0L7cWubyluI"],
                        ["quote" => "The analytical rigor of a top-tier firm, but with the creative soul of a boutique studio. They are the human architects of our future.", "name" => "Elena Rodriguez", "role" => "VP Strategy, Global Airways", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuC6sDdvAWr93KG5RtxdkeAbpbgDvqmlOu3bsw5sP6B6HR6ZwlXgWyf7M-zg63kdMsxsEu6j_U8vSp4mxs7LBYyNjUpV8fhsIZ7bSv49gTmu2_JHBies3G5Y3PiSImiQzm33qhM2JMzbSLjcxbY1dJBLbqhw2GB2SFY2aDwi1S0hRSuZ6Yok6hk2iMIB4zpC1V1IKhveL-pcQcXCWsLXxbOlQ5gZ4IGWDDYL8TRu_HurSZRLhfCC6qWiBa90rP7Rn6d4xxnbB111KDTY"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // CTA Section
            [
                'page_id' => 4,
                'page_template' => 'portfolio',
                'type' => 'cta',
                'order' => 4,
                'content' => json_encode([
                    "title" => "Ready to Architect?",
                    "description" => "Join our portfolio of industry leaders and redefine what is possible in your sector.",
                    "primary_button" => "Start Your Journey",
                    "secondary_button" => "Download Brochure"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== ARTICLES PAGE (page_id: 5) =====
            // Header Section
            [
                'page_id' => 5,
                'page_template' => 'article',
                'type' => 'header',
                'order' => 1,
                'content' => json_encode([
                    "subtitle" => "Knowledge Hub",
                    "title" => "Strategic",
                    "title_highlight" => "Insights",
                    "tags" => ["Innovation", "Society", "Policy", "Gen Z Insight"]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Featured Section
            [
                'page_id' => 5,
                'page_template' => 'article',
                'type' => 'featured',
                'order' => 2,
                'content' => json_encode([
                    "badge" => "Featured",
                    "read_time" => "12 min read",
                    "title" => "The Architect of Change: Why Human-Centered Design is the New Corporate Strategy",
                    "description" => "As algorithmic efficiency peaks, the next frontier of competitive advantage lies in deep empathy and the nuances of human experience.",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCoSDdjHr06Dif6cDbaPiUM4w6Y0qqWeUnj46EjbypDsqLWwswy6HykvBnSCTh1StfsqeEn6dWdrkQXxZEG_m6b2St73YcgKocULJoZ7U8BNY6gpnLViDNh--_61At7Ozl33R7rbJdJ8U2VbCunFZRGRGlWzpSXatxd1d1tkwnbBpklZzIhcQifUUydn7Ba12RxNTHg99M7FQ0x7JQvHCf6XbWmnxDxIvDfNA5oFM38tcMUht7I_dp6F31Aw2IHUT_vddLVSueqvaiu",
                    "slug" => "/artikel/architect-of-change-human-centered-design-strategy",
                    "content" => "<p class='mb-4'>In the rapidly evolving landscape of modern business, organizations are increasingly recognizing that sustainable competitive advantage cannot be achieved through algorithms and automation alone. The next frontier of strategic differentiation lies in the realm of human-centered design—a methodology that places deep empathy and human insight at the core of organizational transformation.</p><p class='mb-4'>As we navigate an era where technological capabilities become commoditized, the organizations that thrive are those that understand the nuanced complexities of human behavior, motivation, and need. This understanding transcends traditional market research, delving into the anthropological depths of user experience.</p><p>Human-centered design is not merely a process but a philosophy—a fundamental reimagining of how organizations create value. It challenges the conventional wisdom of efficiency-at-all-costs and instead advocates for a more holistic approach that balances operational excellence with emotional resonance.</p>",
                    "author" => ["name" => "Dr. Marcus Chen", "role" => "Lead Strategist, Innovesia", "image" => ""]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Article Section
            [
                'page_id' => 5,
                'page_template' => 'article',
                'type' => 'article',
                'order' => 3,
                'content' => json_encode([
                    "articles" => [
                        ["category" => "Innovation", "read_time" => "8 min read", "title" => "Synthesizing AI: Moving Beyond Prompt Engineering to Strategy", "description" => "Exploring how leadership must pivot from managing human assets to orchestrating a hybrid workforce of agents and creators.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCNFP8WDysAalmp4bsvVXyOAg9oUnk25iBzJaCf_IOYLjca0WWYRD7snVCE3yX3vOZ_iCN_-YktepB3iEqfusCkYiE6gllzUbkz6rO9_btAq4kTfsB82run-x2qSjJ2GxOStk11OhOQFqegF74nECC1K5cAulbRP3KIog2qxq0SqX5F9QUkMLBQoV_F-yOvOS8bR7qpYJy4pQhsMW-DPQqAIPF7DD0CY8BlvUPzQ2FytycLcbCDPg17yJWPsuFIV_L4MpEKwxku2NFl", "slug" => "/artikel/synthesizing-ai-moving-beyond-prompt-engineering", "content" => "<p class='mb-4'>The rapid advancement of artificial intelligence has fundamentally transformed how organizations approach problem-solving and innovation. Yet, as we stand at the precipice of this technological revolution, a critical realization emerges: the future belongs not to those who master prompt engineering, but to those who can strategically orchestrate the symbiotic relationship between human creativity and machine intelligence.</p><p class='mb-4'>Leadership in the AI era requires a fundamental reimagining of workforce dynamics. The traditional hierarchical structures that have defined corporate organizations for decades are giving way to more fluid, adaptive networks where human agents and AI collaborators work in concert toward shared objectives.</p><p>The most successful organizations will be those that recognize AI not as a replacement for human ingenuity, but as an amplifier of human potential. This requires leaders to develop new competencies—understanding the unique strengths of both human and artificial intelligence, and creating environments where these complementary capabilities can flourish.</p>", "author" => ["name" => "Sarah Chen", "role" => "AI Strategy Director", "image" => ""]],
                        ["category" => "Society", "read_time" => "15 min read", "title" => "Urban Solitude: The Designing for Social Connection in Megacities", "description" => "As cities grow denser, human connection thins. We examine the architectural and digital interventions needed to restore community.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuB34D4rXUQMopNUuwyP6wWdBZ_AaIlBaDX-HWiJZ89NK00XCBIYWuBUCUudfAzvtnwQV2Qt0B7Dx7S4KE_9ak6C6BbKzmyGI-XRSrgrJYwYOKlb9dEQ2hKNZSIXVINEIYT4Lu7Y_uxxAgJB8tnw5w9ZTTnqDfk8m5XSLo6Nqm8AlXHgagOJqZH5v2V-rFrqvwfC9gR1wW0CYlipmFIUzyGmLWcGqJ-Xn6XVJhzFel-Nglf6wjSxC-DF2obXTstiWcSLOshGYV43mMUk", "slug" => "/artikel/urban-solitude-designing-social-connection-megacities", "content" => "<p class='mb-4'>The paradox of modern urban life is becoming increasingly apparent: as our cities grow denser and more connected through digital infrastructure, the quality of genuine human connection appears to be diminishing. This phenomenon, which urban sociologists are calling \"urban solitude,\" presents one of the most pressing challenges for city planners, architects, and technologists.</p><p class='mb-4'>The architectural solutions to urban solitude extend beyond traditional community centers and public parks. We are witnessing the emergence of \"third spaces\"—environments designed specifically for spontaneous interaction and meaningful exchange. These include collaborative workspaces, maker studios, urban gardens, and hybrid digital-physical environments that facilitate both planned and serendipitous encounters.</p><p>Technology, when thoughtfully deployed, can serve as a bridge rather than a barrier to human connection. Community-focused platforms that facilitate local exchange, neighborhood skill-sharing networks, and digital tools that enhance rather than replace face-to-face interaction represent the vanguard of this movement toward reconnected urban life.</p>", "author" => ["name" => "Marcus Williams", "role" => "Urban Design Lead", "image" => ""]],
                        ["category" => "Gen Z Insight", "read_time" => "6 min read", "title" => "The Authenticity Arbitrage: Gen Z's Revolt Against the Polished", "description" => "Why \"perfect\" branding is failing and how the new consumer class is valuing flaws and radical transparency over aesthetics.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDpb1ngSRUGR-sPYEjhZRTYf0jYcvXXDL3LdqF7QBKihS7yjAzCaWOAQtrfzpJRlIuGwhE9dVO-6gbAtWirnm6zlC97wboSjrR4MpIdTywed_j08Hc_OIHNiA8cXS_8lr1AZOGcqz2PYCuGI0ArfZydYgN7xI2LFKIxAbU9aAy4s7Nhjho_VMayHjTkzw6sJjV5WZvp3IqhK6mKvJ51TD-EnvgxkRaB2QMQ9mIth6qKKKRcnRifPmCDEWIiXQKePE_PvOIp3BIFMOgw", "slug" => "/artikel/authenticity-arbitrage-gen-z-revolt-against-polished", "content" => "<p class='mb-4'>In an era of hyper-curated social media feeds and algorithmically optimized content, Generation Z is pioneering a radical shift toward authenticity—a movement that is fundamentally reshaping brand-consumer relationships and redefining what constitutes value in the marketplace.</p><p class='mb-4'>The \"authenticity arbitrage\" refers to the emerging economic advantage held by brands and creators who embrace imperfection, transparency, and genuine human vulnerability over polished, airbrushed perfection. This generation has grown up in a world of unprecedented access to information, and as a result, they possess a sophisticated radar for inauthenticity.</p><p>Forward-thinking brands are responding by embracing what might be called \"strategic imperfection\"—the intentional revelation of process, challenge, and even failure as a means of building deeper, more resilient connections with their audiences. This approach requires courage, as it runs counter to decades of marketing orthodoxy that emphasized flawless presentation.</p>", "author" => ["name" => "Emily Johnson", "role" => "Consumer Insights Analyst", "image" => ""]],
                        ["category" => "Policy", "read_time" => "20 min read", "title" => "Ethics by Design: Building a Framework for Algorithmic Governance", "description" => "A deep dive into how corporations can self-regulate in the age of rapid AI deployment without stifling essential innovation.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuB7RVqTAn6R9JZ-airpig_go5J6DwrOv441ARM61jvGZpEkPusV3_olwRf3x_SeGUfHRrVsDoc0Yjb3Rw4UdLYikOugVKoXOHmUljN6lPgz4KnEabhsAJzvxepL1K0YenMNfY6Fbe5BP_Y0O5e3pmuuhtEIwaFxnZdx6cRbF6NfQyLVSBjooqq67uvyj3tVDGvum4fxX7A0BppB_emHDaT3pOA-zrvkfsr5H59vRuztGZ2fXRr5CWpScehC8s3FoJXvpfw7OfcUQvtc", "slug" => "/artikel/ethics-by-design-framework-algorithmic-governance", "content" => "<p class='mb-4'>As artificial intelligence systems increasingly influence critical aspects of human life—from hiring decisions and loan approvals to medical diagnoses and criminal sentencing—the question of ethical algorithmic governance has moved from academic abstraction to urgent practical necessity.</p><p class='mb-4'>The concept of \"ethics by design\" draws inspiration from the field of privacy engineering, where principles of data protection are embedded into systems from their inception rather than applied as afterthoughts. Similarly, ethical AI governance requires the integration of fairness, transparency, and accountability considerations throughout the machine learning lifecycle.</p><p>The challenge facing corporations is how to implement robust ethical frameworks without stifling the innovation that drives competitive advantage. Leading organizations are discovering that well-designed governance structures can actually accelerate innovation by providing clear guidelines for responsible experimentation and reducing the risk of costly ethical breaches.</p>", "author" => ["name" => "Dr. James Park", "role" => "Policy Research Lead", "image" => ""]],
                        ["category" => "Innovation", "read_time" => "10 min read", "title" => "The Post-Agile Era: Why Continuous Discovery is the New Baseline", "description" => "Moving away from linear sprints toward a state of constant ethnographic research and real-time product evolution.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBMtGwhgEbhaLAMI5LrQjC4gA54n0NZohqArukBYWdpN1znO484h5CBljzQlqUyuPum-WbFuap8iFzlpM3sZUd0Obv3X3cpHpKBaH4K-mPGwn9WjsBeTQNzio_fodcbebph2bPG03zYZx8YkGwoPL-FE4afpLxKeBc-iOmcFICh270bE8hJAyYgg23stb4PP_ODMqyTxS16A5XXJ_Fuv0XpgGGsQ1Ho3kPlab2ISc0A8hTzbYkTU7s1uSgWQjFoCuuxfH3WbSS8C10_", "slug" => "/artikel/post-agile-era-continuous-discovery-new-baseline", "content" => "<p class='mb-4'>For nearly two decades, Agile methodology has been the dominant paradigm for software development and product management. But as markets become increasingly volatile and user expectations evolve at unprecedented speeds, even Agile's iterative approach is showing signs of strain. Welcome to the post-Agile era—where continuous discovery becomes the new baseline for product excellence.</p><p class='mb-4'>Continuous discovery represents a fundamental shift from the cyclical nature of Agile sprints to a state of perpetual learning and adaptation. Rather than alternating between periods of building and periods of research, teams engage in ongoing ethnographic observation, user testing, and market analysis that runs parallel to development activities.</p><p>This approach requires organizations to invest heavily in research infrastructure—dedicated user research teams, continuous feedback loops, and real-time analytics capabilities. The payoff is a dramatically reduced risk of building the wrong thing and a much higher degree of confidence that product decisions are grounded in current user reality rather than outdated assumptions.</p>", "author" => ["name" => "Lisa Anderson", "role" => "Product Innovation Lead", "image" => ""]],
                        ["category" => "Society", "read_time" => "11 min read", "title" => "Rethinking the Diploma: The Rise of Specialized Knowledge Pods", "description" => "Analyzing the shift from traditional degrees to high-impact, modular education ecosystems powered by industry leaders.", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuC2Rh2HcVh1RX82Y5hHHNRPt6YHkUyU7PdeSZlFFfnKiXqQdfLDROgg5Eqk4oVMPgQW3g3MwsYCV9GnIfPpGsmbeQOeG25xKsyrDPJwJXLakOT6ynbauCPbYeJsfjbE-ib46HkkzcK3MF_VUnB4js1x0azvCCB1ohbgWUfe84BJPA2oCx8FMYX3GRliQu4HxBzi3fVdyH_6jpvWkthsUZrjCQC1fs8d8RzXSLLqUv5VIzALNrW4jbdOVZgli2kJU__mgZtXaZ6LKoDz", "slug" => "/artikel/rethinking-diploma-specialized-knowledge-pods", "content" => "<p class='mb-4'>The traditional university degree, once the undisputed gold standard for professional credentialing, is facing unprecedented challenges in a rapidly evolving economy. As the half-life of technical skills continues to shrink and the demand for specialized expertise intensifies, a new educational paradigm is emerging: the rise of specialized knowledge pods.</p><p class='mb-4'>Knowledge pods represent a fundamental reimagining of how learning is structured, delivered, and validated. Rather than the broad, theory-heavy curriculum of traditional degrees, these programs offer hyper-focused, competency-based training developed in direct collaboration with industry leaders. The format is modular, allowing learners to stack credentials based on career needs and interests.</p><p>This shift has profound implications for both learners and employers. For individuals, it represents a more agile approach to career development—one that accommodates continuous learning alongside professional responsibilities. For organizations, it offers a more reliable signal of practical capability than traditional degree signals, which often lag behind current industry requirements.</p>", "author" => ["name" => "Robert Kim", "role" => "Education Researcher", "image" => ""]]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Newsletter Section
            [
                'page_id' => 5,
                'page_template' => 'article',
                'type' => 'newsletter',
                'order' => 4,
                'content' => json_encode([
                    "subtitle" => "Intelligence delivered",
                    "title" => "Never miss a <br />strategic shift.",
                    "description" => "Join 25,000+ industry leaders who receive our monthly \"Human Architect\" digest—a curated analysis of innovation, culture, and strategy.",
                    "button_text" => "Subscribe Now"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== COMMUNITY PAGE (page_id: 6) =====
            // Hero Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'hero',
                'order' => 1,
                'content' => json_encode([
                    "badge" => "Community Program",
                    "title" => "InnoVocation Lab",
                    "description" => "Empowering students through hands-on innovation and real-world problem solving.",
                    "primary_button" => "Join the Movement",
                    "secondary_button" => "View Roadmap",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAW5TQt7pGZXE-XdeD5Vz3vzEBinS0enKpipieMnqMRftS8rwumExhWgKHG3PUivdJGB_VOt729wM1p4duUtV6iZTQ7QEcSGmon_Wp6E5VpRovQIHQ1HqVU8nxdXxu2bWmRwQN-XAg6Fo0stILgziBEe0DgCl9YUOREiwSlAv4YFnS9EMNstyif6RRcLWlAmIMLpOxfcbtDIdlpUIIqXq-E68PzJD2GmFsjGEv5rZzcGHovYjVCiq4iMWPDL1zmyt_AD4pX_rckHt1G"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Program Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'program',
                'order' => 2,
                'content' => json_encode([
                    "title" => "Program Architecture",
                    "programs" => [
                        ["icon" => "school", "title" => "1 Season = 10 Schools", "description" => "A comprehensive journey across ten selected vocational schools, fostering a network of young innovators across the city."],
                        ["icon" => "calendar_month", "title" => "1 Month = 2–3 Schools", "description" => "Agile and intensive workshop cycles, ensuring dedicated attention and resources for each student cohort."],
                        ["icon" => "psychology", "title" => "Hands-on Growth", "description" => "Bridging the gap between theoretical learning and industry-grade problem-solving methodologies."]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Documentation Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'documentation',
                'order' => 3,
                'content' => json_encode([
                    "title" => "In the Lab",
                    "images" => [
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuBAesYK_Z7qXg-QWc4x8xHGyQtui4h4hZeRUnhNZOsXPvGsX1IwWVlNUscsnHPtKTDAeFSo3iZeh9mZMEbvnT1-BFgu-eUXELQH4m_39VQELDO7kwxxU9YIP-NEwylcJlYcLVLeYmgAxCH1naCvef8TjHYdxdX8-4mehFlX3b0zZVSEV5jZu6uVxNb6JS5NhCDTx7eCQAXcT6_pG3k6Pv9Z40PJAdCd96tfE0RN2pJAhDntzuvNdLJCX6iV-4jyWMub3egvbht9ke76",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuAPxivqlsqQWH_OYisaucKadme4sLFnuk8DpcWY-gvZrUDySjo8VyN6Y0e3p1OkrXFVtjkT8Tody68xOFsXAehy8-VkbIBKSqqNhapMDtGBrSV_AlCz1XIEIpzbqx8aWzQ-zQ7RXjrFpUM6y6onihKndzdUs1caXohfnii9kyDp_SpfPqrEevNMOlLInta-bebGrMHU4bMohONcx2cgdTApgHTLrl6yfJug14_0AkPy5aOhm5bdrcYCDPRAGt98ljubOrLNXNNE7qTV",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuBD1_u4wrRcO-IhG-72UaWhyH1G3Z0pPHaLCXKDnpeC31LikbLbVuoJs6om7Qbl7Mb5DoVys-rqkf0XCy9CQZ4Mz5X6_7uXPLIpgnEE1t8PMF_N7S6DOKh_VyPhkHVlH9h4D9WKl6eOi2u4iuYzOBU8f-oO_7Lt38LZLjYIZE5qMmEqDK9arnZxlivWhqq5BW4_TNkfrH-Ob14Qp-6dZ3UZGGJIDqz6tkTQJdNAdDPl2ZdxELYdnBbQ6vvz9WUzJebhPv3lnUNcZi93",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuC9amI9hB7HMxmrArOCGV47S8aEkALfyjnvqmkICB8QMehH1_PDZTjiTUrzYZSyqab3RMs6GQg32OEdZ_PVGIbiMRG4IZi1HnzG-N39ufGiXrymlF9P8Dg2x8Hpmap2O99xIMpeGMvsnmQhJPLvpr_QT1O3t5HPt5gPX5U4zU-vV9MSeykr7iLdy6Anem4jaQk-To_wsTSXxFrpmhifxCbnztEmtGDTdeDfufh7m4ZkXk5q72Ge-5Vcg5EZZY67btazjmxhYqPXz9"
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Prototype Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'prototype',
                'order' => 4,
                'content' => json_encode([
                    "title" => "Prototype Showcase",
                    "subtitle" => "Turning ideas into tangible solutions.",
                    "projects" => [
                        ["title" => "Eco-Filter 2.0", "description" => "Low-cost water purification system designed for local urban settlements using industrial by-products.", "category" => "Sustainability", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDs7clSCm9dX8RCzE106NQSY6tplOeriUF-dVOLHKtWCcf6XiNOKwuqMzAqdbhkwff1PJvK0shsnVlEYOt9jm_pMJ7wfRt40Qv5aTOraamsKMbvmniihBaMEAl5s5mLIdWJefpOzm3Q8mdZQvwpirZxeWYPBN2ze0z0kHO60yK-3DenPPgc9WAxFoptTWzWH-irkwZfdPlabytf5657VbkbnNhbR--VeJJetdvqLshya9JV96LmAhc_h0yFeiOiXIkXRuH5P3Gj7CHp"],
                        ["title" => "NeighbourHelp App", "description" => "A digital bridge for vocational student services connecting with local households needing repairs.", "category" => "Digital Service", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAN473H1_VXXlFF64HkL_2bSCdEeADAp8o4iFZIsGOXbx4Xenv4U_FU0dEQ0F5ZNRuS41LwdT8IWsQNXPzoMiF8vXEOfrDX7M05sVsa37iunqoyuImmLqmx2uTHWK1f9w3LUVYpTgpfLANi_lznqfdF50bGYHaL-ljAe6rPoMADV-MFvotjZ0HR087dyxgMG7tJesN1GK5B81acF6n--fVjzSbXEk4tBfjCpxHygf1M0Sk4XouZ8krBE8eynswWaMhltyvw8G1UNm2s"],
                        ["title" => "Modular Space-Savers", "description" => "Multi-functional furniture components designed for compact living environments in high-density areas.", "category" => "Urban Design", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBDg_lSb7qLLnMXo0AcTl2y5eq5HV0icxcHA6kG2BGXs_t8f9dnc2rtx3TeoP7dV-J2HIivF41frkkY5zPs4jWZr_QHTZZmmNaOLQEMrfjdB4Fc3seC6R6AiT4HtHHms4nrB4lJZHvO1Nn8QervzOolorCWHjJbKD-yasjxpyZjnyuyXq2524f_caZdRSfOf5qyloUKXSU_HKGw1IwslPq3o45lvVhTtDJZr8ccy8pH2mLQUt58TyNUKldOkFkPr8y07NT-FdvO4mIO"]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Timeline Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'timeline',
                'order' => 5,
                'content' => json_encode([
                    "title" => "Timeline Roadmap",
                    "subtitle" => "Tracking our journey across vocational hubs",
                    "entries" => [
                        ["school" => "SMKN 25 Jakarta", "status" => "Completed", "date" => "April Week 4", "description" => "Focused on sustainable product design and eco-entrepreneurship."],
                        ["school" => "SMKN 20 Jakarta", "status" => "Next Session", "date" => "May Week 1", "description" => "Digital workflow optimization and user-experience prototyping."],
                        ["school" => "SMKN 57 Jakarta", "status" => "Upcoming", "date" => "May Week 3", "description" => ""]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Video Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'video',
                'order' => 6,
                'content' => json_encode([
                    "title" => "Witness the Transformation",
                    "video_title" => "Season 1 Recap: The Journey",
                    "video_subtitle" => "Innovesia Labs x VOCA Education",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBh2rG4z74ouWfD9ealPiqdqkY_60jDeBARVbXXmc4UxrhqDuhIDl0nJQQWtGN4tlC1aCCZiFWltcL1IvEIQtNA9SjipYKE_i6pFvLrXJ9SKvk3sk87RXOTw-Ztq0x7q5K0MytCTrtQ0GnF10UwgsJQ63Uu8IBg4NbhYqoI_JGJ0Lwl6nUEdzAbaYpMgeKlwaI4onJPDPuasTB-aHyx03QMyvqJAYxV1e_k0u26vdd6OZS4ZPk47ee9qpkhfNGCjb7wJE4cGratf7Nn"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // CTA Section
            [
                'page_id' => 6,
                'page_template' => 'community',
                'type' => 'cta',
                'order' => 7,
                'content' => json_encode([
                    "title" => "Bring InnoVocation Lab to Your School",
                    "description" => "Partner with us to transform your vocational curriculum into an active hub of real-world problem solving. Let's build the next generation of architects of change.",
                    "primary_button" => "Inquire for Partnership",
                    "secondary_button" => "Collaborate with Us"
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

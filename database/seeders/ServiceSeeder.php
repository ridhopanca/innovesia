<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Innovation Lab',
                'slug' => 'innovation-lab',
                'category' => 'Lab',
                'excerpt' => 'Testing ideas, validating concepts, and building prototypes in a safe, structured environment.',
                'content' => '<h1>Innovation Lab</h1><p>Testing ideas, validating concepts, and building prototypes in a safe, structured environment.</p>',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCLF662nnRYRV7eterQ_sRv0T_u0cy70WmJjkRfsOV4R71oiTDgC7u3PE2uNYPqfo6IifQemAchMXDa7pJCVWRkXHR91hbn1ZU-xOzCUmgaCThFLW9N2Nkn_3TIW1Bu7OkbBHQBOrsJu41CquZtvUqDLKA6XD0oyMPx-nLyKWypY-3Ty-HD2PCF62qXGo3-5PE3h3ffyoRtR6BaTAhZpnsaD7DPGeflgaO_tHkV1_t2KOHCSVSJJuiUCaC2ArIOtGrZi-sS-IyffFnq',
                'stats' => null,
                'is_featured' => true,
                'status' => 'published',
                'order' => 1,
            ],
            [
                'title' => 'Government & Policy',
                'slug' => 'government-policy',
                'category' => 'Policy',
                'excerpt' => 'Designing policies and public services that are grounded in real human needs.',
                'content' => '<h1>Government & Policy</h1><p>Designing policies and public services that are grounded in real human needs.</p>',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCvgRKT_Aa8zhrrRWob6c_STWJAp4Y-PooX_f5z2IKfhQfG9rXY1jc11sGMpHSl_M90CTK6--B48gkfr16Ij3o5J7ZhQtz-qtOcxIvw6kvTE_JG_-ImpvYDuPwXMx-JRcJuR4RnsTHXY_KRx67glR3vAooKY4ecnUFQjexQGG-5e1lIXxBgDKYYOgNuL9Rr083WuPJTZK1_0m86LlbPaXm0__OHOEaepPxPuiWZeB810v62pGGBCwEy7sz6vKpVSz6gXhmYOgiqJExk',
                'stats' => null,
                'is_featured' => false,
                'status' => 'published',
                'order' => 2,
            ],
            [
                'title' => 'Design Thinking Workshop',
                'slug' => 'design-thinking-workshop',
                'category' => 'Workshops',
                'excerpt' => 'Hands-on sessions to build innovation mindset and solve real problems collaboratively.',
                'content' => '<h1>Design Thinking Workshop</h1><p>Hands-on sessions to build innovation mindset and solve real problems collaboratively.</p>',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAKv5r2QGOylnTTPJ-n2P7sL3XbfrqedSBiUX_l6h31fLtxjgER7jfJzJO0A1wucTO6j-0db8BmPAn3lfZT5sgTypHtieuSixNcW8EaG7fMDEovth0XxQUfqStZUCC8USkkc0v250TXidwPQQ3Xdj10julPWm6twuGtK63w_tKoJsdbjIKS8CSdeOfPLAodHnwoM19HMWqRSFGlnJ9je8i8IV-VoB6fLePcCNrlNdnSFsAYrdazMaNKAcaUTNWmGFASiq4nDOtlREKM',
                'stats' => null,
                'is_featured' => false,
                'status' => 'published',
                'order' => 3,
            ],
            [
                'title' => 'Digital & Data Platform',
                'slug' => 'digital-data-platform',
                'category' => 'Platform',
                'excerpt' => 'Transforming complex data into clear, actionable decision-making tools.',
                'content' => '<h1>Digital & Data Platform</h1><p>Transforming complex data into clear, actionable decision-making tools.</p>',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCFmJz2jpuinnFcBDoDwgi_0r_4G2-l594m4pAnpKNte5fZ0BHb2s0cnwMYxyoavvrW-iyEdibeVQ7P2tjv9xD-tFZMOb4FcYbR_iLu_jfqHFggYwTZ8KFMSyHA82CyD4TUR_3RILlopqk3zl9v98nz-Gn1XaZKN6AnstnhGpwWRbaGzX9uZJRq8-Dmfay5Y17WmQRbsuc0GMY0qVmkD7sh7X3pekyoeHQhlSW1Yip8EY3ebcl-Hrh_KOOnqPPmsCr_xFlzS8diBNSm',
                'stats' => null,
                'is_featured' => false,
                'status' => 'published',
                'order' => 4,
            ],
            [
                'title' => 'Research & Insight',
                'slug' => 'research-insight',
                'category' => 'Insights',
                'excerpt' => 'Uncovering hidden patterns and human behavior through deep research and validated insight.',
                'content' => '<h1>Research & Insight</h1><p>Uncovering hidden patterns and human behavior through deep research and validated insight.</p>',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBNH-tEHfn92CWcMI2GlyU-tWE91japera0V0Ks1_QsKwEbtV45wM53Di6QaL41uJyA6-zZCmhjo4JmqBytmFpQbBvHGQ4l9dtLTHlLtFmKaqzRgpk-tjgP2ZeqS6l6-eQ3EZbMvJm7eUVzxxqE4NuL4BAIFoiuTVVqsruY0uk5jRFE94aCkZi-XxF8i1Wqm7b1PEmEJ1ah4UMAF40OWBr-1LLoWP-boKqdMlWRS_uBSyiT55brul_HIikR1nnMWHJ45eWPFh3H2j29',
                'stats' => null,
                'is_featured' => false,
                'status' => 'published',
                'order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

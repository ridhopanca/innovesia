<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communities = [
            [
                'title' => 'InnoVocation Lab',
                'slug' => 'innovation-lab',
                'badge' => 'Community Program',
                'description' => 'Empowering students through hands-on innovation and real-world problem solving.',
                'primary_button' => 'Join the Movement',
                'secondary_button' => 'View Roadmap',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAW5TQt7pGZXE-XdeD5Vz3vzEBinS0enKpipieMnqMRftS8rwumExhWgKHG3PUivdJGB_VOt729wM1p4duUtV6iZTQ7QEcSGmon_Wp6E5VpRovQIHQ1HqVU8nxdXxu2bWmRwQN-XAg6Fo0stILgziBEe0DgCl9YUOREiwSlAv4YFnS9EMNstyif6RRcLWlAmIMLpOxfcbtDIdlpUIIqXq-E68PzJD2GmFsjGEv5rZzcGHovYjVCiq4iMWPDL1zmyt_AD4pX_rckHt1G',
                'program_data' => [
                    "title" => "Program Architecture",
                    "programs" => [
                        ["icon" => "school", "title" => "1 Season = 10 Schools", "description" => "A comprehensive journey across ten selected vocational schools, fostering a network of young innovators across the city."],
                        ["icon" => "calendar_month", "title" => "1 Month = 2–3 Schools", "description" => "Agile and intensive workshop cycles, ensuring dedicated attention and resources for each student cohort."],
                        ["icon" => "psychology", "title" => "Hands-on Growth", "description" => "Bridging the gap between theoretical learning and industry-grade problem-solving methodologies."]
                    ]
                ],
                'timeline_data' => [
                    "title" => "Timeline Roadmap",
                    "subtitle" => "Tracking our journey across vocational hubs",
                    "entries" => [
                        ["school" => "SMKN 25 Jakarta", "status" => "Completed", "date" => "April Week 4", "description" => "Focused on sustainable product design and eco-entrepreneurship."],
                        ["school" => "SMKN 20 Jakarta", "status" => "Next Session", "date" => "May Week 1", "description" => "Digital workflow optimization and user-experience prototyping."],
                        ["school" => "SMKN 57 Jakarta", "status" => "Upcoming", "date" => "May Week 3", "description" => ""]
                    ]
                ],
                'documentation_images' => [
                    "https://lh3.googleusercontent.com/aida-public/AB6AXuBAesYK_Z7qXg-QWc4x8xHGyQtui4h4hZeRUnhNZOsXPvGsX1IwWVlNUscsnHPtKTDAeFSo3iZeh9mZMEbvnT1-BFgu-eUXELQH4m_39VQELDO7kwxxU9YIP-NEwylcJlYcLVLeYmgAxCH1naCvef8TjHYdxdX8-4mehFlX3b0zZVSEV5jZu6uVxNb6JS5NhCDTx7eCQAXcT6_pG3k6Pv9Z40PJAdCd96tfE0RN2pJAhDntzuvNdLJCX6iV-4jyWMub3egvbht9ke76",
                    "https://lh3.googleusercontent.com/aida-public/AB6AXuAPxivqlsqQWH_OYisaucKadme4sLFnuk8DpcWY-gvZrUDySjo8VyN6Y0e3p1OkrXFVtjkT8Tody68xOFsXAehy8-VkbIBKSqqNhapMDtGBrSV_AlCz1XIEIpzbqx8aWzQ-zQ7RXjrFpUM6y6onihKndzdUs1caXohfnii9kyDp_SpfPqrEevNMOlLInta-bebGrMHU4bMohONcx2cgdTApgHTLrl6yfJug14_0AkPy5aOhm5bdrcYCDPRAGt98ljubOrLNXNNE7qTV",
                    "https://lh3.googleusercontent.com/aida-public/AB6AXuBD1_u4wrRcO-IhG-72UaWhyH1G3Z0pPHaLCXKDnpeC31LikbLbVuoJs6om7Qbl7Mb5DoVys-rqkf0XCy9CQZ4Mz5X6_7uXPLIpgnEE1t8PMF_N7S6DOKh_VyPhkHVlH9h4D9WKl6eOi2u4iuYzOBU8f-oO_7Lt38LZLjYIZE5qMmEqDK9arnZxlivWhqq5BW4_TNkfrH-Ob14Qp-6dZ3UZGGJIDqz6tkTQJdNAdDPl2ZdxELYdnBbQ6vvz9WUzJebhPv3lnUNcZi93",
                    "https://lh3.googleusercontent.com/aida-public/AB6AXuC9amI9hB7HMxmrArOCGV47S8aEkALfyjnvqmkICB8QMehH1_PDZTjiTUrzYZSyqab3RMs6GQg32OEdZ_PVGIbiMRG4IZi1HnzG-N39ufGiXrymlF9P8Dg2x8Hpmap2O99xIMpeGMvsnmQhJPLvpr_QT1O3t5HPt5gPX5U4zU-vV9MSeykr7iLdy6Anem4jaQk-To_wsTSXxFrpmhifxCbnztEmtGDTdeDfufh7m4ZkXk5q72Ge-5Vcg5EZZY67btazjmxhYqPXz0"
                ],
                'prototype_projects' => [
                    "title" => "Prototype Showcase",
                    "subtitle" => "Turning ideas into tangible solutions.",
                    "projects" => [
                        ["title" => "Eco-Filter 2.0", "description" => "Low-cost water purification system designed for local urban settlements using industrial by-products.", "category" => "Sustainability", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDs7clSCm9dX8RCzE106NQSY6tplOeriUF-dVOLHKtWCcf6XiNOKwuqMzAqdbhkwff1PJvK0shsnVlEYOt9jm_pMJ7wfRt40Qv5aTOraamsKMbvmniihBaMEAl5s5mLIdWJefpOzm3Q8mdZQvwpirZxeWYPBN2ze0z0kHO60yK-3DenPPgc9WAxFoptTWzWH-irkwZfdPlabytf5657VbkbnNhbR--VeJJetdvqLshya9JV96LmAhc_h0yFeiOiXIkXRuH5P3Gj7CHp"],
                        ["title" => "NeighbourHelp App", "description" => "A digital bridge for vocational student services connecting with local households needing repairs.", "category" => "Digital Service", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAN473H1_VXXlFF64HkL_2bSCdEeADAp8o4iFZIsGOXbx4Xenv4U_FU0dEQ0F5ZNRuS41LwdT8IWsQNXPzoMiF8vXEOfrDX7M05sVsa37iunqoyuImmLqmx2uTHWK1f9w3LUVYpTgpfLANi_lznqfdF50bGYHaL-ljAe6rPoMADV-MFvotjZ0HR087dyxgMG7tJesN1GK5B81acF6n--fVjzSbXEk4tBfjCpxHygf1M0Sk4XouZ8krBE8eynswWaMhltyvw8G1UNm2s"],
                        ["title" => "Modular Space-Savers", "description" => "Multi-functional furniture components designed for compact living environments in high-density areas.", "category" => "Urban Design", "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBDg_lSb7qLLnMXo0AcTl2y5eq5HV0icxcHA6kG2BGXs_t8f9dnc2rtx3TeoP7dV-J2HIivF41frkkY5zPs4jWZr_QHTZZmmNaOLQEMrfjdB4Fc3seC6R6AiT4HtHHms4nrB4lJZHvO1Nn8QervzOolorCWHjJbKD-yasjxpyZjnyuyXq2524f_caZdRSfOf5qyloUKXS_U_HKGw1IwslPq3o45lvVhTtDJZr8ccy8pH2mLQUt58TyNUKldOkFkPr8y07NT-FdvO4mIO"]
                    ]
                ],
                'video_title' => 'Season 1 Recap: The Journey',
                'video_subtitle' => 'Innovesia Labs x VOCA Education',
                'video_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBh2rG4z74ouWfD9ealPiqdqkY_60jDeBARVbXXmc4UxrhqDuhIDl0nJQQWtGN4tlC1aCCZiFWltcL1IvEIQtNA9SjipYKE_i6pFvLrXJ9SKvk3sk87RXOTw-Ztq0x7q5K0MytCTrtQ0GnF10UwgsJQ63Uu8IBg4NbhYqoI_JGJ0Lwl6nUEdzAbaYpMgeKlwaI4onJPDPuasTB-aHyx03QMyvqJAYxV1e_k0u26vdd6OZS4ZPk47ee9qpkhfNGCjb7wJE4cGratf7Nn',
                'cta_title' => 'Bring InnoVocation Lab to Your School',
                'cta_description' => 'Partner with us to transform your vocational curriculum into an active hub of real-world problem solving. Let\'s build the next generation of architects of change.',
                'cta_primary_button' => 'Inquire for Partnership',
                'cta_secondary_button' => 'Collaborate with Us',
                'is_featured' => true,
                'status' => 'published',
                'order' => 1,
            ],
        ];

        foreach ($communities as $community) {
            Community::create($community);
        }
    }
}

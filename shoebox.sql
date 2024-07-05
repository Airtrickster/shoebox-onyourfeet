CREATE TABLE accounts(
	user_id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(255) DEFAULT 'user' NOT NULL,
	first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL UNIQUE,
    date_of_birth date NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(255) DEFAULT 'blank-profile-picture.webp'
);

INSERT INTO accounts(type, first_name, last_name, email, date_of_birth, phone_number, username, password) VALUES ("admin", "admin", "admin", "admin@admin", CURDATE(), "0", "admin", "admin");

CREATE TABLE products(
	product_id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
	price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    image VARCHAR(255),
    description TEXT
);

INSERT INTO products (category, gender, name, price, image, description)
VALUES
	("athletic", "men", "Nike Metcon 8", 7809.83, "athletic_shoes/men/692bc396a50b3bf8c1b7ee1c41d0e5e4b4.rsquare.w600.webp","Nike Metcon 8
You chase the clock, challenging and encouraging each other all in the name of achieving goals and making gains. Our go-to model for training relies on a lighter, more breathable upper than our previous edition to complement our standards of durability and comfort, so that you can float through your cardio, power through your lifts and dominate your workouts.
Available Colors: Grey/Black/Red/Frost White/Blue/Neon Green
Available Sizes: EU/US/UK"),
    ("athletic", "men", "Altra Footwear Solstice XT 2", 7809.83, "athletic_shoes/men/f5fde989265b2183ba56284158b1274652-altra-solstice-xt2.rsquare.w600.webp", "Altra Footwear Solstice XT 2
If the Solstice XT spent its offseason in the gym, the result would be the Solstice XT 2. The caged upper is firmer than the previous model, and the toe reinforcement promotes toe protection. It’s the ultimate cross-trainer, built for all your workout needs and ready to get out on the road for a run. No matter how you break a sweat, the Solstice XT 2 is always up for one more rep.
Available Colors: Black/White
Available Sizes: EU/US/UK"),
    ("athletic", "men", "On Men’s Cloud 5", 7634.55, "athletic_shoes/men/4a84bea3f312fd5e41a20303bcdefde8d1.rsquare.w600.webp", "On Men's Cloud 5
Next-level comfort: Experience serious comfort with our patented CloudTec® cushioning in Zero-Gravity foam. Designed for soft landings and powerful push offs.
Built different: Light in weight. Light on environmental impact. Updated with 44% recycled materials, breathable antimicrobial mesh and taped reinforcements.
Speed-lacing system: Forget about tying knots. The Cloud’s speed lacing system locks you in instantly. Want classic laces? There’s a pair of those in the box too.
Available Color: Midnight White
Available Sizes: US"),
    ("athletic", "men", "On Cloudstratus", 9270.53, "athletic_shoes/men/fb1b005d639131be345060bde01b515dbc.rsquare.w600.webp", "On Cloudstratus
Double CloudTec®, double your run. The performance shoe for maximum cushioning on road runs – from 5k to a marathon.
Available Color: Midnight
Available Sizes: EU/US/UK/JP/BR"),
    ("athletic", "men", "New Balance Men’s 990v5 Sneakers", 10088.51, "athletic_shoes/men/368af57daf2427c6e0bdddb58788db7c41.rsquare.w600.webp", "New Balance Men’s 990v5 Sneakers
Proof that quality still exists, our Made in the USA 990v5 is the ultimate blend of performance and style. Made without compromise, the 990v5 is a staple of both morning runs and fashion runways.
New Balance MADE U.S. footwear contains a domestic value of 70% or more. MADE makes up a limited portion of New Balance’s U.S. sales.

Features
• Suede and mesh upper
• Dual density collar foam offers support and comfort for ankles
• ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support
• All-day comfort with Ortholite® insert and firm -yet- supportive midsole
• Blown rubber outsole provides superior rebound
• 12 mm drop; due to variances created during the development and manufacturing processes, all references to 12 mm drop are approximate
• New Balance MADE U.S. footwear contains a domestic value of 70% or more. MADE makes up a limited portion of New Balance’s U.S. sales.

Available Colors: Gray/Black/Navy
Available Sizes: EU/US/UK"),
    ("athletic", "men", "Nike Dunk High - Black and White", 7580.02, "athletic_shoes/men/177f10bbdb54971be3d13ebafc2bfa07d6.rsquare.w600.webp", "Nike Dunk High - Black and White
Originally created for the hardwood, the Dunk later took to the streets—and, as they say, the rest is history. More than 35 years after its debut, the silhouette still delivers bold, defiant style and remains a coveted look for crews across both sport and culture.
Now, the university hoops OG returns, covered in crisp material overlays with heritage-inspired colour blocking. Modern footwear technology brings the design's comfort into the 21st century, while a contrasting combination of white and black gives this make-up a clean feel.
Available Color: Black and White
Available Sizes: EU/US/UK"),
    ("athletic", "men", "Converse Chuck Taylor All Star ‘70 Hi", 4635.26, "athletic_shoes/men/7da11e865c763730fef9e1abac4e546e36-white-cons.rsquare.w600.webp", "Converse Chuck Taylor All Star ‘70 Hi
The Converse All Star makes many of us super nostalgic. First released as a basketball shoe in 1917 (yep, it`s that ancient), the Converse All Star sneaker was restyled after basketball star Charles “Chuck Taylor became a Converse shoe salesman, leading to the nickname Chuck Taylors. Converse also added the all-star patch and Taylor`s signature to the side of the shoe as a reference to the athlete who inspired them. Even after 100 years, these best-selling sneakers in history continue to be a vital facet of both pop and sneaker culture. Created for every style, every day.
Available Color: White
Available Sizes: EU/US/UK"),
    ("athletic", "men", "Feiyue Fe Lo 1920", 1635.98, "athletic_shoes/men/ad5b324629135d8753e2cdc2bcef0994d2-Feiyue-Fe-Lo-1920.rsquare.w600.webp", "Feiyue Fe Lo 1920
White FE LO 1920 is our tribute to authentic martial arts.
Hit the park, gym or the street and 'Fly Forward' in your Feiyue 1920's. With perfected features for flexibility and comfort, the 1920 is built for movement. Plus, the grip of the sole tread provides maximum traction, making these a best choice training shoe with comfort and function. 
The 1920 canvas shoe has been created with a minimalistic design aesthetic and coupled with a functional performance construction. It has clean lines, is lightweight, airy and breathable, super comfortable and rich in history.
Feiyue shoes are packaged in an exclusive white Feiyue tote bag. This bag is constructed in a non-woven material and is perfectly sized to carry your daily essentials. Our little gift to you. We are eco-conscious, so we replaced the wasteful shoe box for a reusable tote bag. Pay it forward! 
Available Color: White
Available Sizes: EU/US/UK"),
    ("athletic", "men", "Asics Gel-Resolution 9 Tennis Shoes - Men‘s", 8179.88, "athletic_shoes/men/6afb6047dc54f3e7bb48a75458f6cc2685.rsquare.w600.webp", "Asics Gel-Resolution 9 Tennis Shoes - Men‘s
The GEL-RESOLUTION® 9 tennis shoe creates advanced stability and cushioning for players who like to control the game from the baseline.
DYNAWALL™ technology in the midsole now extends into the heel for added stability during lateral movements. It's a functional feature that's effective when you're running covering both sides of the baseline.
DYNAWRAP™ technology in the eyestay has been strategically redesigned to apply pressure when extra support is needed. This allows you to experience a locked-in feel when you're making quick transitions.
Lastly, the full-length outsole and separated heel help produce a more stable landing for quicker recoveries in between shots.
Available Colors: Black/White/Blue
Available Sizes: EU/US/UK"),
    ("athletic", "men", "Altra Outroad Trail Running Shoe", 7634.55, "athletic_shoes/men/132caceb69553d285f143e5caceec85bf6.rsquare.w600.webp", "Altra Outroad Trail Running Shoe
The all-new Outroad is here. A shoe that’s equipped for road running to trail excursions with the features you need to confidently run outside the lines. Featuring our grippy MaxTrac™ outsole and Altra EGO™ midsole foam, this hybrid shoe is designed especially for the road runner looking to explore the trails. This shoe comes in our Slim FootShape™ fit for a more snug, comfortable fit wherever your run takes you. 
Available Colors: Yellow/Tan/White/Black
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA HOVR™ Sonic 6 Running Shoes", 7995.0, "athletic_shoes/women/3026128-102_A.webp", "UA HOVR™ Sonic 6 Running Shoes
Best for: Everyday runs with a light feel. Engineered mesh upper with seamless forefoot for comfort & breathability. External heel counter for lightweight structure & added lockdown. 3D-molded sockliner cradles the foot for enhanced step-in comfort. Responsive UA HOVR cushioning reduces impact, returns energy & helps propel you forward. Combination of carbon rubber & blown rubber in the outsole for strategic durability & lightweight rebound. Updated outsole design has flexibility where you need it & disperses impact efficiently for a smooth ride.
Available Colors: Black/White/Gray/Blue/Orange
Available Sizes: EU/US/UK"),
    ("athletic", "women", "Project Rock 5 Training Shoes", 8995.0, "athletic_shoes/women/3025436-102_A.webp", "Project Rock 5 Training Shoes
Durable engineered mesh upper is lightweight & breathable with stretch & structure where you need it. Plush knit collar for maximum comfort. Molded TPU heel-to-midfoot strap to stabilize & lock down your heel while enabling forefoot mobility. Responsive UA HOVR™ cushioning reduces impact, returns energy & helps propel you forward. UA TriBase™ maximizes ground contact, promotes natural motion & provides flexibility to grip during lifts
Available Colors: Black/White
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA HOVR™ Phantom 3 Slip Shoes", 9995.0, "athletic_shoes/women/3026239-100_A.webp", "UA HOVR™ Phantom 3 Slip Shoes
These are perfect to slip on after a game or between practices. The breathable knit upper is light and comfortable and UA HOVR™ cushioning gives you back energy with every step.

• Fully engineered knit upper is soft, comfortable & breathable
• External heel counter for added stability
• Internal comfort lining continues up the height of the heel for a soft feel & no irritation
• Flat, stretchy bungee cords over the midfoot for a snug fit that is easy to slip on & off
• Responsive UA HOVR™ cushioning reduces impact, returns energy & helps propel you forward
• Full rubber outsole with strategic pattern for elevated traction & durability

Available Colors: Black/White
Available Sizes: EU/US/UK"),
    ("athletic", "women", "Project Rock BSR 3 Training Shoes", 6995.0, "athletic_shoes/women/3026458-101_A.webp", "Project Rock BSR 3 Training Shoes
These shoes were built for explosive movement and dynamic training, day in and day out. You never let up, neither do these—stability for strength training, flexibility for HIIT, and cushioning for mobility.

• Official Footwear of UFC
• Engineered mesh upper is lightweight & breathable with stretch & structure where you need it
• Bootie design for superior fit, comfort & security
• Charged Cushioning® midsole absorbs impact & converts it into a responsive burst
• UA TriBase™ maximizes ground contact, promotes natural motion & provides flexibility to grip during lifts
• Full rubber outsole for elevated traction & durability

Available Colors: Black/Ultimate Black/White/After Burn
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA HOVR™ Phantom 3 Dyed Running Shoes", 8595.0, "athletic_shoes/women/3026349-101_A.webp", "UA HOVR™ Phantom 3 Dyed Running Shoes
The off-season is for getting better. That means lots of running. Fast, stretchy UA HOVR™ Phantom 3 helps you explode through interval after interval with even more energy-returning UA HOVR™ cushioning. Run now…win later.

• Soft, stretchy UA IntelliKnit upper for a super-breathable sock-like fit & feel
• Molded midfoot panel for added structure & plush interior cushioning
• Knit collar for ease of entry & a plush feel with an external heel counter for stable support
• Ultra-breathable, SpeedForm® 2.0 sockliner provides softer underfoot support
• Responsive UA HOVR™ cushioning reduces impact, returns energy & helps propel you forward
• Full rubber outsole with strategic pattern for elevated traction & durability

Available Colors: Pink Elixir
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA Charged Breathe Lace TR Training Shoes", 4295.0, "athletic_shoes/women/3026205-400_A.webp", "UA Charged Breathe Lace TR Training Shoes
A mashup of our best-selling Charged Breathe Lace and Breathe Trainer. We have Charged Cushioning® for responsiveness and impact absorption, and added in a super-breathable mesh upper for more comfort while you train.

• Lightweight mesh upper for all-day breathability​ & comfort
• Flexible gore forefoot strap with integrated lacing provides lockdown support
• Lateral TPU support for added stability throughout any workout​
• Charged Cushioning® midsole uses compression molded foam for ultimate responsiveness & durability
• Durable rubber outsole provides grip with flexibility where you need it most​

Available Colors: Gray/Black/White/Green
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA Charged Breeze 2 Running Shoes", 5595.0, "athletic_shoes/women/3026142-001_A.webp", "UA Charged Breeze 2 Running Shoes
If you're looking for a lightweight, extremely breathable running shoe that's as responsive as it is durable—you found it.

• Lightweight, breathable mesh upper for increased ventilation
• Internal bootie design for a close-to-the-foot fit & feel
• Molded sockliner​ forms to the foot, eliminating slippage & providing ideal underfoot comfort
• Charged Cushioning® midsole uses compression molded foam for ultimate responsiveness & durability​
• Solid rubber outsole with strategically placed pods for added durability in high-abrasion areas​

Available Colors: Black/Gray
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA TWENTY47 Basketball Shoes", 3995.0, "athletic_shoes/women/3025619-001_A.webp", "UA TWENTY47 Basketball Shoes
We named these the UA TWENTY47 because they're a go-to for 24/7 play. Their springy cushioning keeps you incredibly comfortable as you run the court. And the ridiculously grippy sole lets you stop on a dime.

• Molded, perforated leather & textile upper for breathability & support
• Internal heel counter for a locked-in fit & feel
• EVA midsole delivers a lightweight & responsive ride
• Plush foam sockliner for increased underfoot comfort
• Full rubber outsole for enhanced traction & durability

Available Color: Black
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA Flow FUTR X 2 LE Basketball Shoes", 6795.0, "athletic_shoes/women/3026757-001_A.webp", "UA Flow FUTR X 2 LE Basketball Shoes
The UA Flow cushioning is totally rubber-free, so it's lighter. It's also insanely grippy, so you can start and stop on a dime. That means more open looks, faster recovery, and a trail of broken defenders in your wake.

• Mesh upper for lightweight breathability
• Midfoot webbing & lacing system provides lockdown & support
• Half-bootie design for superior fit, comfort & security
• TPE-blend sockliner with low compression set for energy return & longevity
• UA Flow cushioning technology is super-light, bouncy & provides insane grip
• Durable UA Flow outsole provides better court feel so you can cut & stop/start faster than ever before

Available Color: Black
Available Sizes: EU/US/UK"),
    ("athletic", "women", "UA Flow Dynamic Training Shoe", 8995.0, "athletic_shoes/women/3026107-100_A.webp", "UA Flow Dynamic Training Shoes
UA Flow Dynamic is the ultimate training shoe for the team sports athlete. It combines the bounce and cushioning of a running shoe with the support and grip of a weightlifting shoe, so you can tackle any workout without slowing down.

• Light & comfortable UA IntelliKnit upper with strategic stretch, support & breathability where you need it
• Lateral TPU wrap up for added stability & lateral support
• Plush heel collar for step-in comfort & a locked-in fit
• Internal shank for underfoot support during explosive movements
• One-piece Flow midsole provides responsive & long-lasting cushioning
• Flow technology eliminates the rubber outsole, creating a more lightweight & seamless ride on any surface
• Outsole material is super-durable & increases ground traction

Available Color: Black/Gray
Available Sizes: EU/US/UK"),
	("formal", "men", "Hush Puppies Men's Penyley Spy Slip On", 3460.0, "formal_shoes/men/7341973307570-3_350x500.webp", "Hush Puppies Men's Penyley Spy Slip On
Get style in spades wearing these simply classy shoes.

Features
• Soft full grain leather upper
• Rubber outsole
• Removable molded insole
• Molded rubber outsole provides excellent traction and durability
• Round toe
• Breathable pigsplit lining and socklining
• Cement construction
• Easy classy style

Available Size: US"),
    ("formal", "men", "East Rock Men's Hanston Loafers", 1700.0, "formal_shoes/men/7341857669298-2_082302a4-7c41-4c47-b02d-11c04a8e32b7_350x500.webp", "East Rock Men's Hanston Loafers
Slip into a pair that would instantly complement your OOTDs from East Rock.

Features
• Leather lining
• Cush foam insole

Available Size: US"),
    ("formal", "men", "East Rock Men's Layden Oxford", 1700.0, "formal_shoes/men/7341856751794-2_8f4dc05d-693a-4d58-be7f-6bbf93684d6e_350x500.webp", "East Rock Men's Layden Oxford
Layden is your new go-to pair when it comes to style, comfort and durability.
Available Size: US"),
    ("formal", "men", "East Rock Men's Ashwood Formal Shoes", 1700.0, "formal_shoes/men/7341857276082-2_f83f4c2f-da53-4cd6-92e8-e90614a6038e_350x500.webp", "East Rock Men's Ashwood Formal Shoes
Looking dapper no longer means spending a lot with Ashwoodâ€™s classic style.
Available Size: US"),
    ("formal", "men", "Milanos Men's Joshua Oxfords", 1039.0, "formal_shoes/men/DSC00135-Edit_9666b9f5-6fc9-43d8-bcbb-228f5d65fe23_350x500.webp", "Milanos Men's Joshua Oxfords

• Synthetic leather upper with rubber outsole
• Lace up oxford with textured accents
• Perforated Detailing around shoe

Available Size: US"),
    ("formal", "men", "Gibi Men's Nom 004 Oxfords", 2999.78, "formal_shoes/men/7342001750194-1_902f865c-fedc-45e9-9c36-8fba87368b2d_350x500.webp", "Gibi Men's Nom 004 Oxfords
A luxurious pair crafted with high-quality Nappa leather and pigskin leather insole lining that will provide long-lasting comfort and style.
Available Size: US"),
    ("formal", "men", "Milanos Men's James Sneakers", 1039.0, "formal_shoes/men/DSC00135-Edit_9666b9f5-6fc9-43d8-bcbb-228f5d65fe23_350x500.webp", "Milanos Men's James Sneakers

• Synthetic leather upper with rubber outsole
• Lace up design
• Monochrome sleek color

Available Size: US"),
    ("formal", "men", "Milanos Men's Kian Loafers", 799.0, "formal_shoes/men/20081949_20MILANOS_20-_20KIAN_20-_20BLACK_20_281_29_9388b81a-192f-4f69-8138-396b88b11f3f_350x500.webp", "Milanos Men's Kian Loafers

• Synthetic leather upper with synthetic outsole
• Open back loafers style
• Printed design in front of shoe

Available Size: US"),
    ("formal", "men", "East Rock Men's Higgins Lace Up", 1900.0, "formal_shoes/men/7342038515890-3_350x500.webp", "East Rock Men's Higgins Lace Up

• Cow leather upper
• Cush foam insole
• Leather lining

Available Size: US"),
    ("formal", "men", "Gibi Men's NOM008 Loafers", 2999.75, "formal_shoes/men/7342007910578-1_406ebf99-d5d0-42b4-a133-cc24b85a3b79_350x500.webp", "Gibi Men's NOM008 Loafers
Full foam cushioned insoles lined with pigskin leather for a comfort that takes you further.
Available Size: US"),
	("formal", "women", "Solemate Women's Silver Flat Pumps", 399.0, "formal_shoes/women/7405143064754-1_350x500.webp", "Solemate Women's Silver Flat Pumps

• Pointed toe flat pumps
• Made from synthetic leather upper and TPR outsole
• Designed with double bow details

Available Size: US"),
    ("formal", "women", "Solemate Women's Cobalt Loafers", 499.0, "formal_shoes/women/7405778567346-1_350x500.webp", "Solemate Women's Cobalt Loafers

• Round toe loafers
• Made from synthetic leather and TPR outsole
• Designed with thin buckle details

Available Size: US"),
    ("formal", "women", "Solemate Women's Calcium Flat Pumps", 399.0, "formal_shoes/women/7405161611442-1_350x500.webp", "Solemate Women's Calcium Flat Pumps

• Round toe flat pumps
• Made from synthetic leather and TPR outsole
• Designed with a knotted bow detail

Available Size: US"),
    ("formal", "women", "Solemate Women's Potassium Loafers", 499.0, "formal_shoes/women/7405793804466-1_350x500.webp", "Solemate Women's Potassium Loafers

• Round toe loafers
• Made from synthetic leather and TPR outsole
• Designed with double bow detail

Available Size: US"),
    ("formal", "women", "Solemate Women's Carbon Flat Pumps", 399.0, "formal_shoes/women/7405179961522-1_350x500.webp", "Solemate Women's Carbon Flat Pumps

• Round toe flat pumps
• Made from synthetic leather upper and TPR outsole
• Designed with overlaping bands

Available Size: US"),
    ("formal", "women", "Solemate Women's Zinc Loafers", 499.0, "formal_shoes/women/7405783646386-1_350x500.webp", "Solemate Women's Zinc Loafers

• Plain round toe loafers
• Made from synthetic leather and TPR outsole

Available Size: US"),
    ("formal", "women", "Solemate Women's Sodium Flat Pumps", 399.0, "formal_shoes/women/7405129793714-1_350x500.webp", "Solemate Women's Sodium Flat Pumps

• Pointed toe flat pumps
• Made from synthetic leather upper and TPR outsole
• Designed with band and buckle detail

Available Size: US"),
    ("formal", "women", "Solemate Women's Letters Loafers", 499.0, "formal_shoes/women/7405773619378-1_350x500.webp", "Solemate Women's Letters Loafers

• Round toe loafers
• Made from synthetic leather and TPR outsole
• Designed with knotted ribbon

Available Size: US"),
    ("formal", "women", "Solemate Women's Argon Loafers", 499.0, "formal_shoes/women/7405826834610-1_350x500.webp", "Solemate Women's Argon Loafers

• Round toe loafers
• Made from synthetic leather TPR outsole
• Designed with ribbon detail

Available Size: US"),
    ("formal", "women", "Solemate Women's Nickel Flat Pumps", 399.0, "formal_shoes/women/7405154894002-1_350x500.webp", "Solemate Women's Nickel Flat Pumps
• Pointed toe flat pumps
• Made from synthetic leather and TPR outsole
• Designed with overlapping bands

Available Size: US"),
    ("casual", "men", "Axel Arigato Clean 90", 4599.0, "casual_shoes/men/casual_shoe_1.png", "Clean 90 Sneaker
The handmade Clean 90 Sneakers presents a timeless design with a subtle logo stamp in gold. The minimalist silhouette features a smooth leather upper in white, set on a slightly higher rubber cup-sole equipped with cushioned foot bed and arch support for maximum comfort.
Available colors: white , black , brown
Available Sizes: EU/ US / UK size"),
    ("casual", "men", "Koio Capri Triple White", 3999.0, "casual_shoes/men/casual_shoe_2.png", "Koio Capri Triple White
The first-generation Capri in Triple White is guaranteed to become one of your go-to's.  It’s handcrafted in Italy from full-grain Italian leather and set on a durable rubber sole. Keep them box-fresh or let them get scuffed up—you’ll love them either way.

• Handmade in Tuscany, Italy
• Constructed from Italian leather (Cow)
• Lined with Italian leather (Cow)
• Set on a Margom sole
• Threaded with waxed cotton laces
• Fitted with a removable insole
• Finished with hand-painted edges

Available colors: Triple White
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Nike Air Force 1 Mid ‘07", 5299.0, "casual_shoes/men/casual_shoe_3.png", "Nike Air Force 1 Mid '07
The Nike Air Force 1 Mid '07 Triple Black (2021) features a smooth black-on-black upper made of genuine and synthetic leather with a black swoosh and overlays on the heel and toe cap.
The Nike Air Force 1 Mid '07 Triple Black's black laces feature a silver AF1 tag. The black heel tab has black Nike Air branding and swoosh, and the strap at the top of the collar sports a mini swoosh. The black insole of the right shoe has a white patch with branding, the black midsole has a hidden Air Sole unit, and the black rubber outsole features an iconic concentric circles pattern.
Available colors: Triple White, Triple Black 
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Adidas Ultraboost", 2899.0, "casual_shoes/men/casual_shoe_4.png", "Adidas Ultraboost
These adidas Ultraboost running shoes combine the most advanced adidas technology for a performance that has to be felt to be believed. The sock-like adidas Primeknit upper has been redesigned to allow air to flow freely. A supportive heel counter supports the back of your foot, while adidas BOOST delivers maximum comfort and energy return. The Stretchweb outsole is made with Continental™ Rubber for a firm grip and a smooth ride.
This shoe's upper is made with a high-performance yarn which contains at least 50% Parley Ocean Plastic — reimagined plastic waste, intercepted on remote islands, beaches, coastal communities and shorelines, preventing it from polluting our ocean. The other 50% of the yarn is recycled polyester.
Available colors: Off White, Core Black, Beam Green
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Oliver Cabell Low 1", 1999.0, "casual_shoes/men/casual_shoe_5.png", "Oliver Cabell low 1
Is an iconic low-top silhouette hand crafted in the Marche region of Italy. Coupled with buttery Italian calfskin leather and Margom outsoles.
Here are foolproof steps to cleaning your sneakers:

• Dip a cloth or brush into a bowl of water.
• Apply a generous amount of shoe cleaner to brush.
• Dip brush back into the bowl of water.
• Scrub shoes creating foaming action.
• Wipe clean with a microfiber towel. Repeat steps 1-5 if necessary.
• Air dry. Apply conditioner.

Available colors: White, Black, Belmont, Ocean 
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Allbirds Tree Skippers", 2829.0, "casual_shoes/men/casual_shoe_6.png", "Allbirds Tree Skippers
Our silky-smooth boat shoe made with responsibly sourced eucalyptus tree fiber fits naturally into any situation. Made in Vietnam.
Available colors: Kaikoura White, Jet Black
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Sperry Burnished-Leather Boat Shoes", 4799.0, "casual_shoes/men/casual_shoe_7.png", "Sperry Burnished-Leather Boat Shoes
Life should be luxurious. So, should your shoes. Our Gold Cup™ Authentic Original™ 2-Eye Burnished Boat Shoe flaunts premium materials like burnished full-grain leather uppers and a lambskin lining. Plus, this hand-sewn classic features our signature razor-cut Wave-Siping™ technology for the ultimate anti-slip traction.

• Premium, burnished full-grain leather upper
• Handsewn moccasin construction
• Signature rawhide laces with 360° Lacing System™ technology for customized fit
• Luxurious lambskin lining
• Latex outsole with signature Sperry razor-cut Wave-Siping™ technology for the ultimate wet/dry traction

Available colors: Black, Olive, Red, Tan
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Fear of God Suede Boat Shoes", 7999.0, "casual_shoes/men/casual_shoe_8.png", "Fear of God Suede Boat Shoes
Low-top suede slip-on boat shoes in brown. Round moc toe. Tonal lace-up closure. Buffed leather lining. Treaded crepe rubber sole in off-white featuring embossed logo at heel. Tonal hardware.
Available colors: Cigar
Available sizes: EU/ US / UK size"),
    ("casual", "men", "Loro Piana Summer Walk Suede Loafers", 4699.0, "casual_shoes/men/casual_shoe_9.png", "Loro Piana Summer Walk Suede Loafers
Loro Piana's 'Summer Walk' loafers are so comfortable and chic, you'll be wearing them all over the city and beyond. They've been handcrafted in Italy from 'Sandstone' suede and feature topstitched detailing and cushioned rubber soles. Wear yours with everything from jeans to dresses.

• Slight heel
• Beige suede (Calf)
• Slips on

Available colors: Beige, Navy, Green
Available sizes: EU/ US / UK size"),
    ("casual", "men", "M. Gemi The Sacca", 2899.0, "casual_shoes/men/casual_shoe_10.png", "M. Gemi The Sacca
The shoes are hand-sewn, unlined, available in sizes 35-42, over nine colors, and three materials: soft suede, perforated suede, or snakeskin printed leather. According to M.Gemi, the Sacca Donnas are made in a Tuscan workshop owned by a master artisan and the son of the original owner, who opened the workshop in 1956.
Available colors: Black, Toffee, Navy, White
Available sizes: EU/ US / UK size"),
    ("casual", "women", "Madewell Kickoff Trainer Sneakers", 5599.0, "casual_shoes/women/casual_shoe_11.png", "Madewell kickoff trainer sneakers
Equal parts old school and new, our trainers have MWL Cloudlift insoles for a supercushy, ultrasupportive fit that feels like walking on. well, you know. They're also as eco-friendly as we can make them. The cotton lining and rubber outsoles? Recycled. Oh, and the leather is sustainable too.
Available colors: antique cream multi 
Available sizes: EU/ US / UK size"),
    ("casual", "women", "LØCI Nine", 3999.0, "casual_shoes/women/casual_shoe_12.png", "LØCI NINE
Introducing the LØCI NINE, our most sustainable sneaker made to date. Made with recycled materials that give you a superior water-resistant upper, with a custom-made cork insole for a soft re-bounce to keep you charging ahead. Our sole is made with lightweight recycled rubber for extra durability in creating a no-slip rubber grip.
Available colors: Black/Black/Grey, White/White/White, Indigo/Navy/Navy, White/Orange/Blue
Available sizes: EU/ US / UK sizes"),
    ("casual", "women", "Veja V-10 Sneakers", 4299.0, "casual_shoes/women/casual_shoe_13.png", "Veja V-10 Sneakers
Another pair of dependably comfy kicks from one of our favorite labels for off-duty pairs. These Veja sneakers update the signature V-10 silhouette with hints of muted color for a fresh version of a retro-inspired style.

•Imported
•Rubber sole
•Fabric: Faux leather
•Rubber sole

Available colors: White California, White/Butter/Almond
Available sizes: EU/ US / UK sizes"),
    ("casual", "women", "Everlane ReLeather Court Sneaker", 3899.0, "casual_shoes/women/casual_shoe_14.png", "Everlane ReLeather Court Sneakers |  Product Description
The ReLeather® Court Sneaker features the same vintage-inspired design as our original Court Sneaker, but it’s made with ReLeather—an innovative, long-lasting material that’s comprised of recycled leather scraps and requires no new tanning or dyeing, with minimal water use and waste. It’s leather, reimagined.
Available colors: Off-White, White, Off-White/Black, White/Mustard, White / Smoke Grey / Strong Blue
Available sizes: EU/ US / UK sizes"),
    ("casual", "women", "Adidas Samba Vegan White Gum", 5999.0, "casual_shoes/women/casual_shoe_15.png", "Adidas Samba Vegan White Gum
The adidas Samba Vegan White Gum has white laces and a bright blue stamp that can be found at the top of the shoe’s tongue.
The adidas Samba Vegan White Gum has a gum colored sole that helps to provide traction. The base of the shoe’s body is a bright cloud white. On top of this base, there are black details, including the three iconic stripes that adidas is known for, as well as a black tag on the heel. 
Available colors: Cloud White/Core Black/Gum
Available sizes: EU/ US / UK sizes"),
    ("casual", "women", "Saye Modelo ’89 Vegan", 2829.0, "casual_shoes/women/casual_shoe_16.png", "Saye Modelo ’89 Vegan
Made with bio-based vegan napa, recycled insole, and organic cotton laces, all delivered to you in biodegradable packaging. These innovative materials on the M'89 Vegan sneakers are super soft and provide all round comfort and excellent cushioning.
Available Colors: Baige/Black/Blue/Caramel/Dark
Available Sizes: EU/US/UK"),
    ("casual", "women", "Cariuma OCA Low Sneaker", 2499.0, "casual_shoes/women/casual_shoe_17.png", "Cariuma OCA Low Sneakers
Elegantly simple, the OCA Low Off-Whiteis a refined take on Rio’s street and beach culture. Perfect for exploring the city or lounging by the beach, this is one of our most versatile sneakers.
Handcrafted using a robust canvas, the OCA Low Canvas exists at the intersection of functionality and style. With our 100% vegan insoles made from organic mamona oil and cork, it ensures optimal comfort and fit. The OCA Low boast a unique cap toe design and a fully-stitched lightweight outsole for a durable, long-lasting shoe.
Finishing our OCA Low sneakers with debossed metal aglets...it’s all in the details!
Available Colors: Off-White/Mystic Gray/Rose Red/Shadow Blue
Available Sizes: EU/US/UK"),
    ("casual", "women", "Thousand Fell Women’s Lace-Up in Blue", 4999.0, "casual_shoes/women/casual_shoe_18.png", "Thousand Fell Women’s Lace-Up in Blue
Your new day-in, day-out, ride-or-die sneakers. Designed with life in mind, they’re comfortable, breathable, stain and odor resistant too. Live your life in them, wear them through—and do it all guilt free. When they’re done, just send them back to us for recycling. Tie tightly for your next adventure. 

• Durable and breathable recycled upper
• Stain proof and water resistant coating
• Aloe vera coated soft touch mesh liner
• Cushioned recycled rubber insole
• Structural details made from coconut, sugarcane, and palm
• Recycled PET tonal flat laces
• Rubber back heel with embossed detail
• 21mm outsole height
• Made in Brazil

Available Colors: Blue/White/Black/Starstruck (Yellow)
Available Sizes: EU/US/UK"),
    ("casual", "women", "New Balance Classics WL574v2", 3699.0, "casual_shoes/women/casual_shoe_19.png", "New Balance Classics WL574v2
Nothing looks cleaner than a pair of 574 sneakers from New Balance Classics! Kick it in a timeless look with the New Balance Classics 574v2-USA sneakers. Suede and mesh or textile uppers in a sporty silhouette. Casual shoes with suede and mesh or textile uppers in a sporty silhouette. Foam-padded collar and tongue. Soft linings and a removable foam insole provide all-day comfort. Traditional lace-up closure. TPU heel insert for extra support. ENCAP midsole for cushioning. Durable rubber outsole.
Available Colors: Wheat Field (Yellow)
Available Sizes: EU/US/UK"),
    ("casual", "women", "Adidas Stan Smith Sneaker", 4899.0, "casual_shoes/women/casual_shoe_20.png", "Adidas Stan Smith Sneaker
Roll with the classic. Back in the day, Stan Smith won big on the tennis court. Slide into the adidas shoe worthy of his name and you'll win big on the streets. Top to bottom, these shoes capture the essential style of the 1971 original, with a minimalist leather build and clean trim.
Available Colors: Cloud White/Core White/Green
Available Sizes: UK");
    
CREATE TABLE cart(
	item_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
	quantity INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    FOREIGN KEY (user_id) REFERENCES accounts(user_id)
);

CREATE TABLE favorites(
	fav_id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	product_id INT NOT NULL,
	FOREIGN KEY (product_id) REFERENCES products(product_id),
	FOREIGN KEY (user_id) REFERENCES accounts(user_id) 
);

CREATE TABLE inbox(
	message_id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	phone_number VARCHAR(255),
	email VARCHAR(255),
	message TEXT NOT NULL,
    date_received DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    is_read BOOLEAN NOT NULL DEFAULT false
);

CREATE TABLE transactions(
	transaction_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    address VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    order_datetime DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment_method VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES accounts(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
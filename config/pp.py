from reportlab.lib.pagesizes import letter
from reportlab.pdfgen import canvas
from reportlab.lib.units import inch

# Create a new PDF
pdf_filename = "AI_Storyboard_Template.pdf"
c = canvas.Canvas(pdf_filename, pagesize=letter)

# Title
c.setFont("Helvetica-Bold", 16)
c.drawString(1 * inch, 10.5 * inch, "Storyboard Template: What Is AI? (In 2 Minutes)")

# Instructions
c.setFont("Helvetica", 10)
c.drawString(1 * inch, 10.2 * inch, "Use this template to sketch out your visuals or notes for each panel.")
c.drawString(1 * inch, 10 * inch, "Each panel includes a description of visuals, narration, and on-screen text.")

# Panel height and spacing
panel_height = 1.6 * inch
panel_spacing = 0.3 * inch
start_y = 9.4 * inch

# Panel content
panels = [
    {
        "title": "Panel 1 – Hook/Intro",
        "desc": "Visual: Host on camera, upbeat tone. Camera: Medium shot. Text: 'What is AI? (In 2 Minutes)'",
        "dialogue": "Narration: 'Ever wonder how your phone knows what you want before you even ask? That’s AI!'"
    },
    {
        "title": "Panel 2 – What is AI?",
        "desc": "Visual: Animated robot or thinking machine. Camera: Graphic overlay. Text: 'Artificial Intelligence = Machines that learn'",
        "dialogue": "Narration: 'AI means machines doing things that normally need human smarts.'"
    },
    {
        "title": "Panel 3 – Real-World Examples",
        "desc": "Visual: Split screen of voice assistants, Netflix, Google Maps. Camera: Stock/recorded footage. Text: 'AI in Real Life'",
        "dialogue": "Narration: 'You’ve already used AI today—like when you asked Siri or got Netflix picks.'"
    },
    {
        "title": "Panel 4 – The Future & Risks",
        "desc": "Visual: Futuristic city, warning signs. Camera: Infographic or animation. Text: 'Powerful... but needs care'",
        "dialogue": "Narration: 'AI is powerful—but bias, privacy, and control are concerns.'"
    },
    {
        "title": "Panel 5 – Call to Action",
        "desc": "Visual: Host back on screen, CTA buttons. Camera: Medium close-up. Text: 'Like | Comment | Subscribe'",
        "dialogue": "Narration: 'What do you think about AI? Drop a comment and hit subscribe!'"
    }
]

# Draw panels
for i, panel in enumerate(panels):
    y_position = start_y - i * (panel_height + panel_spacing)

    # Draw placeholder box for sketch
    c.rect(1 * inch, y_position, 2.5 * inch, panel_height)

    # Draw text next to box
    text_x = 3.7 * inch
    c.setFont("Helvetica-Bold", 12)
    c.drawString(text_x, y_position + panel_height - 0.2 * inch, panel["title"])

    c.setFont("Helvetica", 9)
    c.drawString(text_x, y_position + panel_height - 0.5 * inch, panel["desc"])
    c.drawString(text_x, y_position + panel_height - 0.8 * inch, panel["dialogue"])

# Save PDF
c.save()
print(f"Storyboard saved as {pdf_filename}")

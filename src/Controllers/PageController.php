<?php
// src/Controllers/PageController.php

class PageController {

    public function events() {
        $db = Database::getInstance()->getConnection();
        // Mock data if table empty
        $events = [
            [
                'title' => 'Annual Medical Conference 2024',
                'description' => 'Join over 500 professionals discussing the future of AI in healthcare.',
                'date' => '2024-11-15 09:00:00',
                'location' => 'Nairobi Serena Hotel',
                'image' => 'https://images.unsplash.com/photo-1544531696-9342ee586184?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'title' => 'Cardiology Workshop',
                'description' => 'Hands-on workshop on modern cardiac surgery techniques.',
                'date' => '2024-12-05 10:00:00',
                'location' => 'Virtual (Zoom)',
                'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'title' => 'Mental Health Symposium',
                'description' => 'Addressing the rising challenges in mental health post-pandemic.',
                'date' => '2025-01-20 09:30:00',
                'location' => 'KICC, Nairobi',
                'image' => 'https://images.unsplash.com/photo-1527613426441-4da17471b66d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            ]
        ];

        $title = "Events - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/pages/events.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function research() {
        // Mock Data
        $papers = [
            [
                'title' => 'AI in Diagnostic Imaging: A Review',
                'author' => 'Dr. Jane Doe',
                'abstract' => 'This paper explores the efficacy of machine learning algorithms in early detection of tumors...',
                'link' => '#'
            ],
            [
                'title' => 'Telemedicine Adoption in Rural Kenya',
                'author' => 'John Smith, MPH',
                'abstract' => 'An analysis of mobile-based health interventions in remote areas over the last 5 years.',
                'link' => '#'
            ]
        ];

        $title = "Research Hub - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/pages/research.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function ai() {
        $title = "AI Assistant - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/pages/ai.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function aiChat() {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $message = $input['message'] ?? '';

        if (empty($message)) {
            echo json_encode(['reply' => 'Please ask a question.']);
            exit;
        }

        // Here we would integrate OpenAI
        // For now, a mock response logic to ensure it works "out of the box"

        $replies = [
            'hello' => 'Hello! I am the MUMBSO AI Assistant. How can I help you with medical inquiries today?',
            'help' => 'I can assist with research summaries, event details, or general medical definitions.',
            'default' => 'That is an interesting topic. As an AI, I suggest consulting the "Research" section for peer-reviewed papers on "' . htmlspecialchars($message) . '".'
        ];

        $key = strtolower(explode(' ', trim($message))[0]);
        $reply = $replies[$key] ?? $replies['default'];

        // Simulate network delay for realism
        sleep(1);

        echo json_encode(['reply' => $reply]);
    }
}

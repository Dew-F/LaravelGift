<?php

namespace App\Livewire;

use Livewire\Component;

class QuestionnaireForm extends Component
{
    public $showModal = false;
    public $formData = [];
    public $isCompleted = false;
    public $answers = [];
    
    public function mount()
    {
        $this->formData = session('questionnaire_data', []);
        $this->answers = session('questionnaire_answers', []);
        $this->isCompleted = !empty($this->answers);
    }

    public function updatedAnswers()
    {
        session(['questionnaire_answers' => $this->answers]);
    }

    public function saveForm()
    {
        $this->validate([
            'formData.customer_name' => 'required|string|max:255',
            'formData.customer_phone' => 'required|phone|max:20',
            'formData.recipient_type' => 'required|string',
            'formData.design_preference' => 'required|string',
            'formData.color_preference' => 'required|string',
            'formData.greeting_type' => 'required|string',
            'formData.recipient_name' => 'required|string|max:255',
            'formData.recipient_age' => 'required|integer',
            'formData.recipient_hobby' => 'nullable|string|max:255',
            'formData.delivery_date' => 'required|date',
            'formData.delivery_address' => 'required|string|max:255',
            'formData.delivery_time' => 'required|string|max:5',
            'formData.recipient_contact_name' => 'required|string|max:255',
            'formData.recipient_contact_phone' => 'required|phone|max:20',
            'formData.customer_email' => 'required|email|max:255',
            'formData.social_media_link' => 'nullable|string|max:255',
        ]);

        session(['questionnaire_data' => $this->formData]);
        session(['questionnaire_completed' => true]);
        $this->isCompleted = true;
        $this->showModal = false;
    }

    public function saveAnswer($questionId, $answer)
    {
        $this->answers[$questionId] = $answer;
        session(['questionnaire_answers' => $this->answers]);
    }

    public function render()
    {
        return view('livewire.questionnaire-form');
    }
} 
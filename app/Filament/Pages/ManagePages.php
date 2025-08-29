<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class ManagePages extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = null;
    
    protected string $view = 'filament.pages.manage-pages';
    
    protected static ?string $title = 'Manage Static Pages';
    
    protected static ?string $navigationLabel = 'Static Pages';
    
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->data = $this->getPageData();
        $this->form->fill($this->data);
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('About Us')
                    ->schema([
                        TextInput::make('about_title_en')
                            ->label('Title (English)')
                            ->required(),
                        TextInput::make('about_title_ar')
                            ->label('Title (Arabic)')
                            ->required(),
                        RichEditor::make('about_content_en')
                            ->label('Content (English)')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('about_content_ar')
                            ->label('Content (Arabic)')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                    
                Section::make('Vision & Mission')
                    ->schema([
                        TextInput::make('vision_title_en')
                            ->label('Vision Title (English)')
                            ->required(),
                        TextInput::make('vision_title_ar')
                            ->label('Vision Title (Arabic)')
                            ->required(),
                        RichEditor::make('vision_content_en')
                            ->label('Vision Content (English)')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('vision_content_ar')
                            ->label('Vision Content (Arabic)')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('mission_title_en')
                            ->label('Mission Title (English)')
                            ->required(),
                        TextInput::make('mission_title_ar')
                            ->label('Mission Title (Arabic)')
                            ->required(),
                        RichEditor::make('mission_content_en')
                            ->label('Mission Content (English)')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('mission_content_ar')
                            ->label('Mission Content (Arabic)')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }
    
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('save'),
        ];
    }
    
    public function save(): void
    {
        try {
            $data = $this->form->getState();
            
            Storage::disk('local')->put('static-pages.json', json_encode($data, JSON_PRETTY_PRINT));
            
            Notification::make()
                ->title('Static pages updated successfully!')
                ->success()
                ->send();
        } catch (Halt $exception) {
            return;
        }
    }
    
    protected function getPageData(): array
    {
        if (Storage::disk('local')->exists('static-pages.json')) {
            return json_decode(Storage::disk('local')->get('static-pages.json'), true) ?? [];
        }
        
        return [
            'about_title_en' => 'About Us',
            'about_title_ar' => 'من نحن',
            'about_content_en' => '<p>Welcome to our company...</p>',
            'about_content_ar' => '<p>مرحباً بكم في شركتنا...</p>',
            'vision_title_en' => 'Our Vision',
            'vision_title_ar' => 'رؤيتنا',
            'vision_content_en' => '<p>Our vision is...</p>',
            'vision_content_ar' => '<p>رؤيتنا هي...</p>',
            'mission_title_en' => 'Our Mission',
            'mission_title_ar' => 'مهمتنا',
            'mission_content_en' => '<p>Our mission is...</p>',
            'mission_content_ar' => '<p>مهمتنا هي...</p>',
        ];
    }
}
